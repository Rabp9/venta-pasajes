<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Restricciones Controller
 *
 * @property \App\Model\Table\RestriccionesTable $Restricciones
 */
class RestriccionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $restricciones = $this->paginate($this->Restricciones);

        $this->set(compact('restricciones'));
        $this->set('_serialize', ['restricciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Restriccione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $restriccione = $this->Restricciones->get($id, [
            'contain' => []
        ]);

        $this->set('restriccione', $restriccione);
        $this->set('_serialize', ['restriccione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $restriccione = $this->Restricciones->newEntity();
        if ($this->request->is('post')) {
            $restriccione = $this->Restricciones->patchEntity($restriccione, $this->request->data);
            if ($this->Restricciones->save($restriccione)) {
                $this->Flash->success(__('The restriccione has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The restriccione could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('restriccione'));
        $this->set('_serialize', ['restriccione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Restriccione id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $restriccione = $this->Restricciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $restriccione = $this->Restricciones->patchEntity($restriccione, $this->request->data);
            if ($this->Restricciones->save($restriccione)) {
                $this->Flash->success(__('The restriccione has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The restriccione could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('restriccione'));
        $this->set('_serialize', ['restriccione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Restriccione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $restriccione = $this->Restricciones->get($id);
        if ($this->Restricciones->delete($restriccione)) {
            $this->Flash->success(__('The restriccione has been deleted.'));
        } else {
            $this->Flash->error(__('The restriccione could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
