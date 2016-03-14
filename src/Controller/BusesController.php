<?php
namespace App\Controller;

use App\Controller\AppController;

class BusesController extends AppController
{
    public function index() {
        $this->viewBuilder()->layout(false);
        
        $buses = $this->Buses->find("all");

        $this->set(compact('buses'));
        $this->set('_serialize', ['buses']);
    }

    public function view($id = null) {
        $this->viewBuilder()->layout(false);
        
        $bus = $this->Buses->get($id, [
            'contain' => ['Estados']
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
                    'text' => __('Saved'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('Error'),
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
                    'text' => __('Saved'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('Error'),
                    'type' => 'error'
                );
            }
        }
        $estados = $this->Buses->Estados->find('list');
        $this->set(compact('bus', 'estados'));
        $this->set("_serialize", ["message"]);
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $bus = $this->Buses->get($id);
        if ($this->Buses->delete($bus)) {
            $this->Flash->success(__('The bus has been deleted.'));
        } else {
            $this->Flash->error(__('The bus could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}