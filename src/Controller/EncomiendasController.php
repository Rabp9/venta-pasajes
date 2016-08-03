<?php
namespace App\Controller;

use App\Controller\AppController;
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
                "Desplazamientos" => [
                    "AgenciaOrigen" => ["Ubigeos"],
                    "AgenciaDestino" => ["Ubigeos"]
                ], 
                "PersonaRemitente", 
                "PersonaDestinatario"
            ])->where(["Encomiendas.estado_id" => 3]);

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
        
        $asignados = true;
        foreach ($encomiendas as $encomienda) {
            $encomienda_asignada = $this->Encomiendas->newEntity();
            $encomienda_asignada->id = $encomienda;
            $encomienda_asignada->programacion_id = $programacion_id;
            // $encomienda_asignada->fecha_envio = $programacion_id;
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
        require_once(ROOT .DS. 'vendor' . DS . 'rabp9' . DS . 'PDF.php');
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
        
        $this->set("pdf", new PDF("P", "mm", "A4"));
        $this->set(compact('encomienda'));
        
        $this->response->type("application/pdf");
        
        $this->render('view_' . $encomienda->tipodoc);
    }
    
    public function getByProgramacion($id) {
        require_once(ROOT .DS. 'vendor' . DS . 'rabp9' . DS . 'PDF.php');
        $this->viewBuilder()->layout('pdf'); //this will use the pdf.ctp layout
        
        $programacion = $this->Encomiendas->Programaciones->get($id, [    
            'contain' => [
                'Encomiendas' => [
                    'PersonaRemitente',
                    'EncomiendasTipos' => ['TipoProductos'],
                    'Desplazamientos' => [
                        'AgenciaDestino' => ['Ubigeos' => ['ParentUbigeos1' => ['ParentUbigeos2']]]
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
    
    public function registrarEntrega() {
        $id = $this->request->data["id"];
        
        $encomienda = $this->Encomiendas->get($id);
        $encomienda->estado_id = 4;
        // $encomienda->fecha_recepcion = 4;
        
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
}
