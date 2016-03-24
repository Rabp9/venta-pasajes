<?php
namespace App\Controller;

use App\Controller\AppController;

class ProgramacionesController extends AppController
{
    public function index() {
        $this->viewBuilder()->layout(false);
        
        $programaciones = $this->Programaciones->find("all");

        $this->set(compact('programaciones'));
        $this->set('_serialize', ['programaciones']);
    }

    public function view($id = null) {
        $programacione = $this->Programaciones->get($id, [
            'contain' => ['Buses']
        ]);

        $this->set('programacione', $programacione);
        $this->set('_serialize', ['programacione']);
    }

    public function add() {
        $this->viewBuilder()->layout(false);
        
        $programacione = $this->Programaciones->newEntity();
        if ($this->request->is('post')) {
            $programacione = $this->Programaciones->patchEntity($programacione, $this->request->data);
            if ($this->Programaciones->save($programacione)) {
                $this->Flash->success(__('The programacione has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The programacione could not be saved. Please, try again.'));
            }
        }
        $buses = $this->Programaciones->Buses->find('list', ['limit' => 200]);
        $this->set(compact('programacione', 'buses'));
        $this->set('_serialize', ['programacione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Programacione id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $programacione = $this->Programaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $programacione = $this->Programaciones->patchEntity($programacione, $this->request->data);
            if ($this->Programaciones->save($programacione)) {
                $this->Flash->success(__('The programacione has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The programacione could not be saved. Please, try again.'));
            }
        }
        $buses = $this->Programaciones->Buses->find('list', ['limit' => 200]);
        $this->set(compact('programacione', 'buses'));
        $this->set('_serialize', ['programacione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Programacione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $programacione = $this->Programaciones->get($id);
        if ($this->Programaciones->delete($programacione)) {
            $this->Flash->success(__('The programacione has been deleted.'));
        } else {
            $this->Flash->error(__('The programacione could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
