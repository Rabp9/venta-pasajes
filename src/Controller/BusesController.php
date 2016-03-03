<?php
namespace App\Controller;

use App\Controller\AppController;

class BusesController extends AppController
{
    public function index() {
        $this->viewBuilder()->layout("main");
        
        $this->paginate = [
            'contain' => ['Estados']
        ];
        $buses = $this->paginate($this->Buses);

        $this->set(compact('buses'));
        $this->set('_serialize', ['buses']);
    }

    public function view($id = null) {
        $this->viewBuilder()->layout("main");
        
        $bus = $this->Buses->get($id, [
            'contain' => ['Estados']
        ]);

        $this->set('bus', $bus);
        $this->set('_serialize', ['bus']);
    }

    public function add() {
        $this->viewBuilder()->layout("main");
        
        $bus = $this->Buses->newEntity();
        if ($this->request->is('post')) {
            $bus = $this->Buses->patchEntity($bus, $this->request->data);
            debug($bus);
            if ($this->Buses->save($bus)) {
                $this->Flash->success(__('The bus has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bus could not be saved. Please, try again.'));
            }
        }
        $estados = $this->Buses->Estados->find('list', ['limit' => 200]);
        $this->set(compact('bus', 'estados'));
        $this->set('_serialize', ['bus']);
    }

    public function edit($id = null) {
        $bus = $this->Buses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bus = $this->Buses->patchEntity($bus, $this->request->data);
            if ($this->Buses->save($bus)) {
                $this->Flash->success(__('The bus has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bus could not be saved. Please, try again.'));
            }
        }
        $estados = $this->Buses->Estados->find('list', ['limit' => 200]);
        $this->set(compact('bus', 'estados'));
        $this->set('_serialize', ['bus']);
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