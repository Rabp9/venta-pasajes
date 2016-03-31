<?php
namespace App\Controller;

use App\Controller\AppController;

class BusesController extends AppController
{
    public function index() {
        $this->viewBuilder()->layout(false);
        
        $buses = $this->Buses->find("all")
            ->contain(["Estados"]);

        $this->set(compact('buses'));
        $this->set('_serialize', ['buses']);
    }

    public function view($id = null) {
        $this->viewBuilder()->layout(false);
        
        $bus = $this->Buses->get($id, [
            'contain' => ['Estados', "BusPisos"]
        ]);

        $this->set('bus', $bus);
        $this->set('_serialize', ['bus']);
    }

    public function add() {
        $this->viewBuilder()->layout(false);
        
        $bus = $this->Buses->newEntity();
        if ($this->request->is('post')) {
            $bus = $this->Buses->patchEntity($bus, $this->request->data);
            if ($this->Buses->save($bus)) {
                $message = array(
                    'text' => __('Bus registrado correctamente'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('No fue posible registrar el bus'),
                    'type' => 'error'
                );
            }
        }
        $estados = $this->Buses->Estados->find('list');
        $this->set(compact("bus", "estados", "message"));
        $this->set("_serialize", ["message"]);
    }

    public function edit($id = null) {
        $this->viewBuilder()->layout(false);
        
        $bus = $this->Buses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bus = $this->Buses->patchEntity($bus, $this->request->data);
            if ($this->Buses->save($bus)) {
                $message = array(
                    'text' => __('Bus modificado correctamente'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('No fue posible modificar el bus'),
                    'type' => 'error'
                );
            }
        }
        $estados = $this->Buses->Estados->find('list');
        $this->set(compact('bus', 'estados', 'message'));
        $this->set("_serialize", ["message"]);
    }
    
    public function administrar() {
        $this->viewBuilder()->layout(false);
    }
    
    public function subir() {
        $this->viewBuilder()->layout(false);
        if ($this->request->is("post")) {
            $imagen = $this->request->data["file"];

            if (move_uploaded_file($imagen["tmp_name"], 
                WWW_ROOT . "img" . DS . "cache" . DS . $imagen["name"])) {
                $message = [
                    "type" => "success",
                    "text" => "Imagen subida con éxito",
                    "fileUrl" => "cache/" . $imagen["name"]
                ];
            } else {
                $message = [
                    "type" => "error",
                    "text" => "La imagen no fue subida con éxito",
                ];
            }
            
            $this->set(compact("message"));
            $this->set("_serialize", ["message"]);
        }
    }
}