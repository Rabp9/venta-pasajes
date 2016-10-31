<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;

class ImportarController extends AppController
{
    public function preLoad() {
        $this->viewBuilder()->layout(false);
        
        if ($this->request->is("post")) {
            $file = $this->request->data["file"];

            $file = file_get_contents($file['tmp_name']);
            $backup = json_decode($file);
            
            $message = $backup;
            
            $this->set(compact("message"));
            $this->set("_serialize", ["message"]);
        }
    }
    
    public function import() {
        $this->viewBuilder()->layout(false);
        
        $clientesTable = TableRegistry::get('Clientes');
        $pasajesTable = TableRegistry::get('Pasajes');
        $girosTable = TableRegistry::get('Giros');
        $encomiendasTable = TableRegistry::get('Encomiendas');
        
        $file = $this->request->data["file"];
        $file = file_get_contents($file['tmp_name']);
        $backup = json_decode($file);
        
        $conn = ConnectionManager::get($clientesTable->defaultConnectionName());
        $r = true;
        if (!empty($backup->clientes)) {
            $clientesTable->connection()->transactional(function () use ($clientesTable, $backup) {
                foreach ($backup->clientes as $cliente) {
                    $cliente = $clientesTable->newEntity((array)$cliente);
                    $clientesTable->save($cliente, ['atomic' => false]);
                }
            });
        }
        
        if (!empty($backup->pasajes)) {
             $pasajesTable->connection()->transactional(function () use ($pasajesTable, $backup) {
                foreach ($backup->pasajes as $pasaje) {
                    $fechahora = $pasaje->fechahora;
                    unset($pasaje->fechahora);
                    $pasaje = $pasajesTable->newEntity((array)$pasaje);
                    $pasaje->fechahora = $fechahora;
                    $pasajesTable->save($pasaje, ['atomic' => false]);
                }
            });
        }
        
        if (!empty($backup->giros)) {
             $girosTable->connection()->transactional(function () use ($girosTable, $backup) {
                foreach ($backup->giros as $giro) {
                    $fecha = $giro->fecha;
                    $fecha_envio = $giro->fecha_envio;
                    $fecha_recepcion = $giro->fecha_recepcion;
                    unset($giro->fecha);
                    unset($giro->fecha_envio);
                    unset($giro->fecha_recepcion);
                    $giro = $girosTable->newEntity((array)$giro);
                    $giro->fecha = $fecha;
                    $giro->fecha_envio = $fecha_envio;
                    $giro->fecha_recepcion = $fecha_recepcion;
                    $girosTable->save($giro, ['atomic' => false]);
                }
            });
        }
        
        if (!empty($backup->encomiendas)) {
            $encomiendasTable->connection()->transactional(function () use ($encomiendasTable, $clientesTable, $backup) {
                foreach ($backup->encomiendas as $encomienda) {
                    $ruc = $encomienda->cliente->ruc;
                    $encomiendas_tipos = $encomienda->encomiendas_tipos;
                    
                    $cliente = $clientesTable->find()->where(['ruc' => $ruc])->first();
                    $fechahora = $encomienda->fechahora;
                    $fecha_envio = $encomienda->fecha_envio;
                    $fecha_recepcion = $encomienda->fecha_recepcion;
                    unset($encomienda->fechahora);
                    unset($encomienda->fecha_envio);
                    unset($encomienda->fecha_recepcion);
                    $encomienda = $encomiendasTable->newEntity((array)$encomienda);
                    $encomienda->cliente_id = $cliente->id;
                    $encomienda->fechahora = $fechahora;
                    $encomienda->fecha_envio = $fecha_envio;
                    $encomienda->fecha_recepcion = $fecha_recepcion;
                    if ($encomiendasTable->save($encomienda, ['atomic' => false])) {
                        foreach ($encomiendas_tipos as $encomiendas_tipo) {
                            $encomiendas_tipo = $encomiendasTable->EncomiendasTipos->newEntity((array)$encomiendas_tipo);
                            $encomiendas_tipo->encomienda_id = $encomienda->id;
                            $encomiendasTable->EncomiendasTipos->save($encomiendas_tipo);
                        }
                    }
                }
            });
        }
        
        $algo = $conn->commit();
        $message = [
            "type" => "success",
            "text" => "El Backup fue restaurado exitosamente"
        ];
        
        $this->set(compact("message"));
        $this->set("_serialize", ["message"]);
    }
    
    public function getExportCountClientes() {
        $this->viewBuilder()->layout(false);
        $clientesTable = TableRegistry::get('Clientes');
        
        $nro_clientes = $clientesTable->find()
            ->where(['flag_export' => 0])
            ->count();
        
        $this->set(compact('nro_clientes'));
        $this->set('_serialize', ['nro_clientes']);
    }
    
    public function getExportCountPasajes() {
        $this->viewBuilder()->layout(false);
        $pasajesTable = TableRegistry::get('Pasajes');
        
        $nro_pasajes = $pasajesTable->find()
            ->where(['flag_export' => 0])
            ->count();
        
        $this->set(compact('nro_pasajes'));
        $this->set('_serialize', ['nro_pasajes']);
    }
    
    public function getExportCountGiros() {
        $this->viewBuilder()->layout(false);
        $girosTable = TableRegistry::get('Giros');
        
        $nro_giros = $girosTable->find()
            ->where(['flag_export' => 0])
            ->count();
        
        $this->set(compact('nro_giros'));
        $this->set('_serialize', ['nro_giros']);        
    }
    
    public function getExportCountEncomiendas() {
        $this->viewBuilder()->layout(false);
        $encomiendasTable = TableRegistry::get('Encomiendas');
        
        $nro_encomiendas = $encomiendasTable->find()
            ->where(['flag_export' => 0])
            ->count();
        
        $this->set(compact('nro_encomiendas'));
        $this->set('_serialize', ['nro_encomiendas']);
    }
    
    public function export() {
        $this->viewBuilder()->layout(false);
        $clientesTable = TableRegistry::get('Clientes');
        $pasajesTable = TableRegistry::get('Pasajes');
        $girosTable = TableRegistry::get('Giros');
        $encomiendasTable = TableRegistry::get('Encomiendas');
        
        $ch_clientes = @$this->request->data['clientes'];
        $ch_pasajes = @$this->request->data['pasajes'];
        $ch_giros = @$this->request->data['giros'];
        $ch_encomiendas = @$this->request->data['encomiendas'];
        
        if ($ch_clientes) {
            $clientes = $clientesTable->find()
                ->select(['ruc', 'razonsocial', 'direccion', 'telefono', 'estado_id', 'flag_export'])
                ->where(['flag_export' => false])
                ->toArray();
            $clientesTable->updateAll(
                ['flag_export' => true], 
                ['flag_export' => false]);
        }
        
        if ($ch_pasajes) {
            $pasajes = $pasajesTable->find()
                ->select(['Clientes.ruc', 'persona_id', 'bus_asiento_id', 'programacion_id', 'detalle_desplazamiento_id', 'agencia_id', 'valor', 'fechahora', 'nro_doc', 'Pasajes.flag_export'])
                ->where(['Pasajes.flag_export' => false])
                ->contain(['Clientes'])
                ->toArray();
            $pasajesTable->updateAll(
                ['flag_export' => true], 
                ['flag_export' => false]);
        }
        
        if ($ch_giros) {
            $giros = $girosTable->find()
                ->select(['programacion_id', 'desplazamiento_id', 'remitente', 'destinatario', 'fecha', 'detalle', 'valor_total', 'observaciones', 'fecha_envio', 'fecha_recepcion', 'nro_doc', 'condicion', 'entrega', 'estado_id', 'flag_export'])
                ->where(['flag_export' => false])
                ->toArray();
            $girosTable->updateAll(
                ['flag_export' => true], 
                ['flag_export' => false]);
        }
        
        if ($ch_encomiendas) {
            $encomiendas = $encomiendasTable->find()
                ->where(['Encomiendas.flag_export' => false])
                ->contain(['Clientes' => function($q) {
                    return $q
                        ->select(['ruc']);
                }, 'EncomiendasTipos' => ['TipoProductos']])
                ->toArray();
            $encomiendas_final = array();
            foreach ($encomiendas as $encomienda) {
                unset($encomienda['id']);
                unset($encomienda['cliente_id']);
                $encomiendas_tipos_final = array();
                foreach ($encomienda['encomiendas_tipos'] as $encomiendas_tipo) {
                    unset($encomiendas_tipo['id']);
                    unset($encomiendas_tipo['encomienda_id']);
                    $encomiendas_tipos_final[] = $encomiendas_tipo;
                }
                $encomienda['encomiendas_tipos'] = $encomiendas_tipos_final;
                $encomiendas_final[] = $encomienda;
            }
            $encomiendas = $encomiendas_final;
            $encomiendasTable->updateAll(
                ['flag_export' => true], 
                ['flag_export' => false]);
        }
        
        $this->set(compact('clientes', 'pasajes', 'giros', 'encomiendas'));
        $this->set('_serialize', ['clientes', 'pasajes', 'giros', 'encomiendas']);
    }
}