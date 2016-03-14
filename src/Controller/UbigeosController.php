<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ubigeos Controller
 *
 * @property \App\Model\Table\UbigeosTable $Ubigeos
 */
class UbigeosController extends AppController
{
    public function index() {
        $this->Ubigeos->recover();
        /*$this->paginate = [
            'contain' => ['ParentUbigeos']
        ];
        $ubigeos = $this->paginate($this->Ubigeos);

        $this->set(compact('ubigeos'));
        $this->set('_serialize', ['ubigeos']);*/
    }

    /**
     * View method
     *
     * @param string|null $id Ubigeo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ubigeo = $this->Ubigeos->get($id, [
            'contain' => ['ParentUbigeos', 'Agencias', 'ChildUbigeos']
        ]);

        $this->set('ubigeo', $ubigeo);
        $this->set('_serialize', ['ubigeo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ubigeo = $this->Ubigeos->newEntity();
        if ($this->request->is('post')) {
            $ubigeo = $this->Ubigeos->patchEntity($ubigeo, $this->request->data);
            if ($this->Ubigeos->save($ubigeo)) {
                $this->Flash->success(__('The ubigeo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ubigeo could not be saved. Please, try again.'));
            }
        }
        $parentUbigeos = $this->Ubigeos->find("treeList");
        $this->set(compact('ubigeo', 'parentUbigeos'));
        $this->set('_serialize', ['ubigeo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ubigeo id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ubigeo = $this->Ubigeos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ubigeo = $this->Ubigeos->patchEntity($ubigeo, $this->request->data);
            if ($this->Ubigeos->save($ubigeo)) {
                $this->Flash->success(__('The ubigeo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ubigeo could not be saved. Please, try again.'));
            }
        }
        $parentUbigeos = $this->Ubigeos->ParentUbigeos->find('list', ['limit' => 200]);
        $this->set(compact('ubigeo', 'parentUbigeos'));
        $this->set('_serialize', ['ubigeo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ubigeo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ubigeo = $this->Ubigeos->get($id);
        if ($this->Ubigeos->delete($ubigeo)) {
            $this->Flash->success(__('The ubigeo has been deleted.'));
        } else {
            $this->Flash->error(__('The ubigeo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
