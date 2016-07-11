<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

class EncomiendasController extends AppController
{
    public function index() {
        $this->viewBuilder()->layout(false);
        
        $encomiendas = $this->Encomiendas->find("all")
            ->contain([
                "Estados", 
                "Desplazamientos" => [
                    "AgenciaOrigen",
                    "AgenciaDestino"
                ], 
                "Remitente", 
                "Destinatario"
            ]);

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
                    'type' => 'success'
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
}
