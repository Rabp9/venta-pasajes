<?php
namespace App\Controller;

use App\Controller\AppController;

class AgenciasController extends AppController
{
    public function index() {
        $this->viewBuilder()->layout(false);
        
        $agencias = $this->Agencias->find("all")
            ->contain(["Estados", "Ubigeos" => ["ParentUbigeos1"]]);

        $this->set(compact('agencias'));
        $this->set('_serialize', ['agencias']);
    }

    public function view($id = null) {
        $this->viewBuilder()->layout(false);
        
        $agencia = $this->Agencias->get($id, [
            'contain' => [
                'Ubigeos' => [
                    'ParentUbigeos' => ["ParentUbigeos"]
                ], 
                'Estados'
            ]
        ]);

        $this->set('agencia', $agencia);
        $this->set('_serialize', ['agencia']);
    }
    
    public function add() {
        $this->viewBuilder()->layout(false);

        $agencia = $this->Agencias->newEntity();
        if ($this->request->is('post')) {
            $agencia = $this->Agencias->patchEntity($agencia, $this->request->data);
            if ($this->Agencias->save($agencia)) {
                $message = array(
                    'text' => __('Agencia registrada correctamente'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('No fue posible registrar la agencia'),
                    'type' => 'error'
                );
            }
        }
        $ubigeos = $this->Agencias->Ubigeos->find('treelist');
        $estados = $this->Agencias->Estados->find('list');
        $this->set(compact('agencia', 'ubigeos', 'estados', 'message'));
        $this->set('_serialize', ['message']);
    }

    public function edit($id = null) {
        $this->viewBuilder()->layout(false);
        
        $agencia = $this->Agencias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $agencia = $this->Agencias->patchEntity($agencia, $this->request->data);
            if ($this->Agencias->save($agencia)) {
                $message = array(
                    'text' => __('Agencia modificada correctamente'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('No fue posible modificar la Agencia'),
                    'type' => 'error'
                );
            }
        }
        $ubigeos = $this->Agencias->Ubigeos->find('list');
        $estados = $this->Agencias->Estados->find('list');
        $this->set(compact('agencia','ubigeos', 'estados', 'message'));
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
}
