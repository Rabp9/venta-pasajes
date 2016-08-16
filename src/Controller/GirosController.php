<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

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
            ])->where(["Encomiendas.estado_id IN" => [3, 4]]);

        $this->set(compact('encomiendas'));
        $this->set('_serialize', ['encomiendas']);
    }

    public function getNextNroDoc() {
        $nro_doc = $this->Giros->getNextNroDoc();
    
        $this->set(compact('nro_doc'));
        $this->set('_serialize', ['nro_doc']);
    }
}
