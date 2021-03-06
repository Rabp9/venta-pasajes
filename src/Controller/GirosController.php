<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;
use rabp9\PDF;

class GirosController extends AppController
{
    public function index() {
        $this->viewBuilder()->layout(false);

    }
     
    public function add() {
        $this->viewBuilder()->layout(false);

        $giro = $this->Giros->newEntity();
        if ($this->request->is('post')) {
            $this->request->data["fecha"] = Time::createFromFormat("Y-m-d H:i:s", $this->request->data["fecha"]);
            $giro = $this->Giros->patchEntity($giro, $this->request->data);  
            if ($this->Giros->save($giro)) {
                $message = array(
                    'text' => __('Giro registrado correctamente'),
                    'type' => 'success',
                    "id" => $giro->id
                );
            } else {
                $message = array(
                    'text' => __('No fue posible registrar el giro'),
                    'type' => 'error'
                );
            }
        }
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
    
    public function view($id) {
        require_once(ROOT . DS . 'vendor' . DS . 'rabp9' . DS . 'PDF.php');
        $this->viewBuilder()->layout('pdf'); //this will use the pdf.ctp layout
                
        $giro = $this->Giros->find()
            ->contain([
                'PersonaRemitente', 
                'PersonaDestinatario',
                'Desplazamientos' => [
                    'AgenciaOrigen' => ['Ubigeos' => ['ParentUbigeos1' => ['ParentUbigeos2']]],
                    'AgenciaDestino' => ['Ubigeos' => ['ParentUbigeos1' => ['ParentUbigeos2']]]
                ]
            ])
            ->where(['Giros.id' => $id])
            ->first();
        
        $this->set("pdf", new PDF("L", "mm", "A5"));
        $this->set(compact('giro'));
        
        $this->response->type("application/pdf");
        
        $this->render('view_boleta');
    }
    
    public function getPendientes() {
        $this->viewBuilder()->layout(false);
        
        $giros = $this->Giros->find("all")
            ->contain([
                "Estados", 
                "Desplazamientos" => [
                    "AgenciaOrigen" => ["Ubigeos"],
                    "AgenciaDestino" => ["Ubigeos"]
                ], 
                "PersonaRemitente", 
                "PersonaDestinatario"
            ])->where(["Giros.estado_id" => 1]);

        $this->set(compact('giros'));
        $this->set('_serialize', ['giros']);
    }
    
    public function getSinEntregar() {
        $this->viewBuilder()->layout(false);
        
        $giros = $this->Giros->find("all")
            ->contain([
                "Estados", 
                "Desplazamientos" => [
                    "AgenciaOrigen" => ["Ubigeos"],
                    "AgenciaDestino" => ["Ubigeos"]
                ], 
                "PersonaRemitente", 
                "PersonaDestinatario",
                "Programaciones" => ["Buses" => ['joinType' => 'LEFT']],
            ])->where(["Giros.estado_id IN" => [3, 4]]);

        $this->set(compact('giros'));
        $this->set('_serialize', ['giros']);
    }
    
    public function getOrigenDestino() {
        $this->viewBuilder()->layout(false);
        
        $giros_id = $this->request->data['ids'];
        
        $origenes_id = array();
        $destinos_id = array();
        foreach ($giros_id as $giro_id) {
            $giro = $this->Giros->find()
                ->where(['Giros.id' => $giro_id])
                ->contain(['Desplazamientos' => ['AgenciaOrigen', 'AgenciaDestino']])
                ->first();
            $origenes_id[] = $giro->desplazamiento->AgenciaOrigen->id;
            $destinos_id[] = $giro->desplazamiento->AgenciaDestino->id;
        }
        
        $origenes_id = array_unique($origenes_id);
        $destinos_id = array_unique($destinos_id);
        
        $origen_id = null;
        $destino_id = null;
        
        if (sizeof($origenes_id) == 1 && sizeof($destinos_id) == 1) {
            $origen_id = $origenes_id[0];
            $destino_id = $destinos_id[0];
        } 
        $this->set(compact('origen_id', 'destino_id'));
        $this->set('_serialize', ['origen_id', 'destino_id']);
    }
    
    public function getNextNroDoc() {
        $nro_doc = $this->Giros->getNextNroDoc();
    
        $this->set(compact('nro_doc'));
        $this->set('_serialize', ['nro_doc']);
    }
    
    public function asignar() {
        $giros = $this->request->data["giros"];
        $programacion_id = $this->request->data["programacion_id"];
        $programacion = $this->Giros->Programaciones->get($programacion_id);
        
        $asignados = true;
        foreach ($giros as $giro) {
            $giro_asignada = $this->Giros->newEntity();
            $giro_asignada->id = $giro;
            $giro_asignada->entrega = '';
            $giro_asignada->programacion_id = $programacion_id;
            $giro_asignada->fecha_envio = $programacion->fechahora_prog;
            $giro_asignada->estado_id = 3;

            if (!$this->Giros->save($giro_asignada)) {
                $asignados = false;
                break;
            }
        }
        if ($asignados) {
            $message = array(
                'text' => __('Giros asignados correctamente'),
                'type' => 'success'
            );
        } else {
            $message = array(
                'text' => __('No fue posible asignar los giros'),
                'type' => 'error'
            );
        }
        
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
       
    public function llamar() {
        $giros = $this->request->data["giros"];
        $entrega = $this->request->data["entrega"];
        
        $asignados = true;
        foreach ($giros as $giro) {
            $giro_asignada = $this->Giros->newEntity();
            $giro_asignada->id = $giro;
            $giro_asignada->programacion_id = null;
            $giro_asignada->entrega = $entrega;
            $giro_asignada->fecha_envio = date('Y-m-d');
            $giro_asignada->estado_id = 3;

            if (!$this->Giros->save($giro_asignada)) {
                $asignados = false;
                break;
            }
        }
        if ($asignados) {
            $message = array(
                'text' => __('Giros asignados correctamente'),
                'type' => 'success'
            );
        } else {
            $message = array(
                'text' => __('No fue posible asignar los giros'),
                'type' => 'error'
            );
        }
        
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
    
    public function cancelarAsignacion() {
        $id = $this->request->data["id"];
        
        $giro = $this->Giros->get($id);
        $giro->programacion_id = null;
        $giro->entrega = null;
        $giro->fecha_recepcion = null;
        $giro->estado_id = 1;
        
        if ($this->Giros->save($giro)) {
            $message = array(
                'text' => __('Asignación cancelada correctamente'),
                'type' => 'success'
            );
        } else {
            $message = array(
                'text' => __('No fue posible cancelar la asignación'),
                'type' => 'error'
            );
        }
        
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
    
    public function cancelarAsignacionMany() {
        $ids = $this->request->data["ids"];
        
        $conn = ConnectionManager::get($this->Giros->defaultConnectionName());
        $r = true;
        foreach ($ids as $id) {
            $giro = $this->Giros->get($id);
            $giro->programacion_id = null;
            $giro->entrega = null;
            $giro->fecha_recepcion = null;
            $giro->estado_id = 1;

            if (!$this->Giros->save($giro)) {
                $r = false;
                break;
            }
        }
        
        if ($r) {
            $conn->commit();
            $message = array(
                'text' => __('Asignaciones canceladas correctamente'),
                'type' => 'success'
            );
        } else {
            $conn->rollback();
            $message = array(
                'text' => __('No fue posible cancelar las asignaciones'),
                'type' => 'error'
            );
        }
        
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
    
    public function registrarEntrega() {
        $id = $this->request->data["id"];
        
        $giro = $this->Giros->get($id);
        $giro->estado_id = 4;
        $giro->condicion = 'cancelado';
        $giro->fecha_recepcion = date('Y-m-d');
        
        if ($this->Giros->save($giro)) {
            $message = array(
                'text' => __('Giro entregado correctamente'),
                'type' => 'success'
            );
        } else {
            $message = array(
                'text' => __('No fue posible registrar la entrega del giro'),
                'type' => 'error'
            );
        }
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
    
    public function registrarEntregaMany() {
        $ids = $this->request->data["ids"];
        
        $conn = ConnectionManager::get($this->Giros->defaultConnectionName());
        $r = true;
        foreach ($ids as $id) {
            $giro = $this->Giros->get($id);
            $giro->estado_id = 4;
            $giro->condicion = 'cancelado';
            $giro->fecha_recepcion = date('Y-m-d');

            if (!$this->Giros->save($giro)) {
                $r = false;
                break;
            }
        }
        
        if ($r) {
            $conn->commit();
            $message = array(
                'text' => __('Girso entregados correctamente'),
                'type' => 'success'
            );
        } else {
            $conn->rollback();
            $message = array(
                'text' => __('No fue posible registrar la entrega de los giros'),
                'type' => 'error'
            );
        }

        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
}