<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;
use rabp9\PDF;

class EncomiendasController extends AppController
{
    public function index() {
        $this->viewBuilder()->layout(false);
        
        $encomiendas = $this->Encomiendas->find("all")
            ->contain([
                "Estados", 
                "Desplazamientos" => [
                    "AgenciaOrigen" => ["Ubigeos"],
                    "AgenciaDestino" => ["Ubigeos"]
                ], 
                "PersonaRemitente", 
                "PersonaDestinatario",
                "EncomiendasTipos" => ["TipoProductos"]
            ]);

        $this->set(compact('encomiendas'));
        $this->set('_serialize', ['encomiendas']);
    }
    
    public function getPendientes() {
        $this->viewBuilder()->layout(false);
        
        $encomiendas = $this->Encomiendas->find("all")
            ->contain([
                "Estados",
                "Desplazamientos" => [
                    "AgenciaOrigen" => ["Ubigeos"],
                    "AgenciaDestino" => ["Ubigeos"]
                ], 
                "PersonaRemitente", 
                "PersonaDestinatario",
                "EncomiendasTipos" => ["TipoProductos"]
            ])->where(["Encomiendas.programacion_id IS" => null]);

        $this->set(compact('encomiendas'));
        $this->set('_serialize', ['encomiendas']);
    }
    
    public function getSinEntregar() {
        $this->viewBuilder()->layout(false);
        
        $encomiendas = $this->Encomiendas->find("all")
            ->contain([
                "Estados", 
                "Programaciones" => ["Buses"],
                "Desplazamientos" => [
                    "AgenciaOrigen" => ["Ubigeos"],
                    "AgenciaDestino" => ["Ubigeos"]
                ], 
                "PersonaRemitente", 
                "PersonaDestinatario",
                "EncomiendasTipos" => ["TipoProductos"]
            ])->where(["Encomiendas.estado_id IN" => [3, 4]]);

        $this->set(compact('encomiendas'));
        $this->set('_serialize', ['encomiendas']);
    }

    public function add() {
        $this->viewBuilder()->layout(false);

        $encomienda = $this->Encomiendas->newEntity();
        if ($this->request->is('post')) {
            $this->request->data["fechahora"] = Time::createFromFormat("Y-m-d H:i:s", $this->request->data["fechahora"]);
            $encomienda = $this->Encomiendas->patchEntity($encomienda, $this->request->data);  
            if ($this->Encomiendas->save($encomienda)) {
                $message = array(
                    'text' => __('Encomienda registrada correctamente'),
                    'type' => 'success',
                    "id" => $encomienda->id
                );
            } else {
                $message = array(
                    'text' => __('No fue posible registrar la encomienda'),
                    'type' => 'error'
                );
            }
        }
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
    
    public function asignar() {
        $encomiendas = $this->request->data["encomiendas"];
        $programacion_id = $this->request->data["programacion_id"];
        $programacion = $this->Encomiendas->Programaciones->get($programacion_id);
        
        $asignados = true;
        foreach ($encomiendas as $encomienda) {
            $encomienda_asignada = $this->Encomiendas->newEntity();
            $encomienda_asignada->id = $encomienda;
            $encomienda_asignada->programacion_id = $programacion_id;
            $encomienda_asignada->fecha_envio = $programacion->fechahora_prog;
            $encomienda_asignada->estado_id = 3;

            if (!$this->Encomiendas->save($encomienda_asignada)) {
                $asignados = false;
                break;
            }
        }
        if ($asignados) {
            $message = array(
                'text' => __('Encomiendas asignadas correctamente'),
                'type' => 'success'
            );
        } else {
            $message = array(
                'text' => __('No fue posible asignar las encomiendas'),
                'type' => 'error'
            );
        }
        
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
    
    public function view($id) {
        require_once(ROOT . DS . 'vendor' . DS . 'rabp9' . DS . 'PDF.php');
        $this->viewBuilder()->layout('pdf'); //this will use the pdf.ctp layout
        
        $contain = [
            'PersonaRemitente', 
            'PersonaDestinatario',
            'EncomiendasTipos' => ['TipoProductos'],
            'Desplazamientos' => [
                'AgenciaOrigen' => ['Ubigeos' => ['ParentUbigeos1' => ['ParentUbigeos2']]],
                'AgenciaDestino' => ['Ubigeos' => ['ParentUbigeos1' => ['ParentUbigeos2']]]
            ]
        ];
        
        $encomienda = $this->Encomiendas->get($id);
        
        if($encomienda->tipodoc == 'factura') {
            $contain[] = 'Clientes';
        }
        
        $encomienda = $this->Encomiendas->get($id, [
            'contain' => $contain
        ]);
        
        $this->set("pdf", new PDF("L", "mm", "A5"));
        $this->set(compact('encomienda'));
        
        $this->response->type("application/pdf");
        
        $this->render('view_' . $encomienda->tipodoc);
    }
    
    public function getByProgramacion($id) {
        require_once(ROOT .DS. 'vendor' . DS . 'rabp9' . DS . 'PDF.php');
        $this->viewBuilder()->layout('pdf'); //this will use the pdf.ctp layout
        
        $programacion = $this->Encomiendas->Programaciones->get($id, [    
            'contain' => [
                'Buses',
                'Encomiendas' => [
                    'PersonaRemitente',
                    'EncomiendasTipos' => ['TipoProductos'],
                    'Desplazamientos' => [
                        'AgenciaDestino' => ['Ubigeos' => ['ParentUbigeos1' => ['ParentUbigeos2']]]
                    ]
                ],
                'Giros' => [
                    'PersonaRemitente',
                    'Desplazamientos' => [
                        'AgenciaDestino' => ['Ubigeos' => ['ParentUbigeos1' => ['ParentUbigeos2']]]
                    ]
                ],
                'Rutas' => [
                    "DetalleDesplazamientos" => [
                        "Desplazamientos" => [
                            "AgenciaOrigen" => ["Ubigeos"], 
                            "AgenciaDestino" => ["Ubigeos"]
                        ]
                    ]
                ]
            ]
        ]);
        $this->set("pdf", new PDF("P", "mm", "A4"));
        $this->set(compact('programacion'));
        $this->response->type("application/pdf");
        
        $this->render('lista_encomiendas');
    }
    
    public function cancelarAsignacion() {
        $id = $this->request->data["id"];
        
        $encomienda = $this->Encomiendas->get($id);
        $encomienda->programacion_id = null;
        $encomienda->fecha_recepcion = null;
        $encomienda->estado_id = 1;
        
        if ($this->Encomiendas->save($encomienda)) {
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
        
        $conn = ConnectionManager::get($this->Encomiendas->defaultConnectionName());
        $r = true;
        foreach ($ids as $id) {
            $encomienda = $this->Encomiendas->get($id);
            $encomienda->programacion_id = null;
            $encomienda->fecha_recepcion = null;
            $encomienda->estado_id = 1;
            
            if (!$this->Encomiendas->save($encomienda)) {
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
        
        $encomienda = $this->Encomiendas->get($id);
        $encomienda->estado_id = 4;
        $encomienda->condicion = 'cancelado';
        $encomienda->fecha_recepcion = date('Y-m-d');
        
        if ($this->Encomiendas->save($encomienda)) {
            $message = array(
                'text' => __('Encomienda entregada correctamente'),
                'type' => 'success'
            );
        } else {
            $message = array(
                'text' => __('No fue posible registrar la entrega de la encomienda'),
                'type' => 'error'
            );
        }
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
    
    public function registrarEntregaMany() {
        $ids = $this->request->data["ids"];
        
        $conn = ConnectionManager::get($this->Encomiendas->defaultConnectionName());
        $r = true;
        foreach ($ids as $id) {
            $encomienda = $this->Encomiendas->get($id);
            $encomienda->estado_id = 4;
            $encomienda->condicion = 'cancelado';
            $encomienda->fecha_recepcion = date('Y-m-d');

            if (!$this->Encomiendas->save($encomienda)) {
                $r = false;
                break;
            }
        }
        
        if ($r) {
            $conn->commit();
            $message = array(
                'text' => __('Encomiendas entregadas correctamente'),
                'type' => 'success'
            );
        } else {
            $conn->rollback();
            $message = array(
                'text' => __('No fue posible registrar la entrega de las encomiendas'),
                'type' => 'error'
            );
        }
        
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
    
    public function getNextNroDoc($tipodoc = null) {
        $tipodoc = $this->request->param('tipodoc');

        $nro_doc = $this->Encomiendas->getNextNroDoc($tipodoc);
    
        $this->set(compact('nro_doc'));
        $this->set('_serialize', ['nro_doc']);
    }
}
