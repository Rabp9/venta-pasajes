<?php
namespace App\Controller;

use App\Controller\AppController;

class ClientesController extends AppController
{
    public function index() {
        $this->viewBuilder()->layout(false);
        
        $clientes = $this->Clientes->find("all")
            ->contain(["Estados"]);

        $this->set(compact('clientes'));
        $this->set('_serialize', ['clientes']);
    }

    public function view($id = null) {
        $this->viewBuilder()->layout(false);
        
        $cliente = $this->Clientes->get($id, [
            'contain' => [
                'Estados'
            ]
        ]);

        $this->set(compact('cliente'));
        $this->set('_serialize', ['cliente']);
    }
    
    public function add() {
        $this->viewBuilder()->layout(false);

        $cliente = $this->Clientes->newEntity();
        if ($this->request->is('post')) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->data);
            if ($this->Clientes->save($cliente)) {
                $message = array(
                    'text' => __('Cliente registrado correctamente'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('No fue posible registrar el cliente'),
                    'type' => 'error'
                );
            }
        }
        $estados = $this->Clientes->Estados->find('list');
        $this->set(compact('cliente', 'estados', 'message'));
        $this->set('_serialize', ['message']);
    }

    public function edit($id = null) {
        $this->viewBuilder()->layout(false);
        
        $cliente = $this->Clientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->data);
            if ($this->Clientes->save($cliente)) {
                $message = array(
                    'text' => __('Cliente modificado correctamente'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('No fue posible modificar el Cliente'),
                    'type' => 'error'
                );
            }
        }
        $estados = $this->Clientes->Estados->find('list');
        $this->set(compact('cliente', 'estados', 'message'));
        $this->set("_serialize", ["message"]);
    } 
    
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $agencia = $this->Agencias->get($id);
        if ($this->Agencias->delete($agencia)) {
            $this->Flash->success(__('The agencia has been deleted.'));
        } else {
            $this->Flash->error(__('The agencia could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    public function findByRuc($ruc = null) {
        $this->viewBuilder()->layout(false);
        
        $ruc = $this->request->param("ruc");
        $cliente = $this->Clientes->findByRuc($ruc)->first();
        
        $this->set(compact('cliente'));
        $this->set('_serialize', ['cliente']);
    }
}
