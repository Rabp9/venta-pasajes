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
                "PersonaDestinatario"
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
                "PersonaDestinatario"
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
    
    public function view() {
        require_once(ROOT .DS. 'vendor' . DS . 'rabp9' . DS . 'PDF.php');

        $this->viewBuilder()->layout('pdf'); //this will use the pdf.ctp layout

        $this->set("pdf", new PDF("P", "mm", "A4"));
        
        $this->response->type("application/pdf");
    }
}
