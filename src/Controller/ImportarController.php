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
            if (!$clientesTable->save($backup->clientes)) {
                $r = false;
            }
        }
        
        if (!empty($backup->pasajes)) {
            if (!$pasajesTable->save($backup->pasajes)) {
                $r = false;
            }
            
        }
        
        if (!empty($backup->giros)) {
            foreach ($backup->giros as $giro) {
                $giro_aux = $girosTable->newEntity((array)$giro);
                if ($giro->fecha) {
                    $giro_aux->fecha = Time::createFromFormat("Y-m-d", $giro->fecha);
                }
                if ($giro->fecha_envio) {
                    $giro_aux->fecha_envio = Time::createFromFormat("Y-m-d", $giro->fecha_envio);
                }
                if ($giro->fecha_recepcion) {
                    $giro_aux->fecha_recepcion = Time::createFromFormat("Y-m-d", $giro->fecha_recepcion);
                }
                if (!$girosTable->save($giro_aux)) {
                    $r = false;
                    break;
                }
            }
        }
        
        if (!empty($backup->encomiendas)) {
            if (!$encomiendasTable->save($backup->encomiendas)) {
                $r = false;
            }
        }
        
        if ($r) {
            $conn->commit();
            $message = [
                "type" => "success",
                "text" => "El Backup fue restaurado exitosamente"
            ];
        } else {
            $conn->rollback();
            $message = [
                "type" => "error",
                "text" => "El Backup no fue restaurado exitosamente"
            ];
        }
        
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
                ->where(['flag_export' => false])
                ->toArray();
            $clientesTable->updateAll(
                ['flag_export' => true], 
                ['flag_export' => false]);
        }
        
        if ($ch_pasajes) {
            $pasajes = $pasajesTable->find()
                ->where(['flag_export' => false]);
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
                ->where(['flag_export' => false])
                ->toArray();
            $encomiendasTable->updateAll(
                ['flag_export' => true], 
                ['flag_export' => false]);
        }
        
        $this->set(compact('clientes', 'pasajes', 'giros', 'encomiendas'));
        $this->set('_serialize', ['clientes', 'pasajes', 'giros', 'encomiendas']);
    }
}