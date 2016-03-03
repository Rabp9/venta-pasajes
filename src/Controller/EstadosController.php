<?php
namespace App\Controller;

use App\Controller\AppController;

class EstadosController extends AppController
{
    public function index() {
        $estados = $this->paginate($this->Estados);

        $this->set(compact('estados'));
        $this->set('_serialize', ['estados']);
    }

    public function view($id = null) {
        $estado = $this->Estados->get($id, [
            'contain' => ['Bus', 'BusAsientos', 'Buses']
        ]);

        $this->set('estado', $estado);
        $this->set('_serialize', ['estado']);
    }

    public function add() {
        $estado = $this->Estados->newEntity();
        if ($this->request->is('post')) {
            $estado = $this->Estados->patchEntity($estado, $this->request->data);
            if ($this->Estados->save($estado)) {
                $this->Flash->success(__('The estado has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The estado could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('estado'));
        $this->set('_serialize', ['estado']);
    }

    public function edit($id = null) {
        $estado = $this->Estados->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estado = $this->Estados->patchEntity($estado, $this->request->data);
            if ($this->Estados->save($estado)) {
                $this->Flash->success(__('The estado has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The estado could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('estado'));
        $this->set('_serialize', ['estado']);
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $estado = $this->Estados->get($id);
        if ($this->Estados->delete($estado)) {
            $this->Flash->success(__('The estado has been deleted.'));
        } else {
            $this->Flash->error(__('The estado could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
