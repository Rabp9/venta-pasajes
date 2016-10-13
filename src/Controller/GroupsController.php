<?php
namespace App\Controller;

use App\Controller\AppController;

class GroupsController extends AppController
{
    public function index() {
        $this->viewBuilder()->layout(false);
        
        $groups = $this->Groups->find("all")
            ->contain(["Estados"]);

        $this->set(compact('groups'));
        $this->set('_serialize', ['groups']);
    }

    public function view($id = null) {
        $this->viewBuilder()->layout(false);
        
        $tipoProducto = $this->TipoProductos->get($id, [
            'contain' => ['Estados']
        ]);

        $this->set('tipoProducto', $tipoProducto);
        $this->set('_serialize', ['tipoProducto']);
    }

    public function add() {
        $this->viewBuilder()->layout(false);
        
        $tipoProducto = $this->TipoProductos->newEntity();
        if ($this->request->is('post')) {
            $tipoProducto = $this->TipoProductos->patchEntity($tipoProducto, $this->request->data);
            if ($this->TipoProductos->save($tipoProducto)) {
                $message = array(
                    'text' => __('Tipo de Producto registrado correctamente'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('No fue posible registrar el Tipo de Producto'),
                    'type' => 'error'
                );
            }
        }
        $estados = $this->TipoProductos->Estados->find('list');
        $this->set(compact('tipoProducto', 'estados', 'message'));
        $this->set('_serialize', ['message']);
    }

    public function edit($id = null) {
        $this->viewBuilder()->layout(false);
        
        $tipoProducto = $this->TipoProductos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoProducto = $this->TipoProductos->patchEntity($tipoProducto, $this->request->data);
            if ($this->TipoProductos->save($tipoProducto)) {
                $message = array(
                    'text' => __('Tipo de Producto modificado correctamente'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('No fue posible modificar el Tipo de Producto'),
                    'type' => 'error'
                );
            }
        }
        $estados = $this->TipoProductos->Estados->find('list');
        $this->set(compact('tipoProducto', 'estados', 'message'));
        $this->set('_serialize', ['message']);
    }
}
