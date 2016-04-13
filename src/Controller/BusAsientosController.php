<?php
namespace App\Controller;

use App\Controller\AppController;

class BusAsientosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['BusPisos', 'Estados']
        ];
        $busAsientos = $this->paginate($this->BusAsientos);

        $this->set(compact('busAsientos'));
        $this->set('_serialize', ['busAsientos']);
    }

    public function view($id = null) {
        $busAsiento = $this->BusAsientos->get($id, [
            'contain' => ['BusPisos', 'Estados']
        ]);

        $this->set(compact('busAsiento'));
        $this->set('_serialize', ['busAsiento']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $busAsiento = $this->BusAsientos->newEntity();
        if ($this->request->is('post')) {
            $busAsiento = $this->BusAsientos->patchEntity($busAsiento, $this->request->data);
            if ($this->BusAsientos->save($busAsiento)) {
                $this->Flash->success(__('The bus asiento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bus asiento could not be saved. Please, try again.'));
            }
        }
        $busPisos = $this->BusAsientos->BusPisos->find('list', ['limit' => 200]);
        $estados = $this->BusAsientos->Estados->find('list', ['limit' => 200]);
        $this->set(compact('busAsiento', 'busPisos', 'estados'));
        $this->set('_serialize', ['busAsiento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bus Asiento id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $busAsiento = $this->BusAsientos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $busAsiento = $this->BusAsientos->patchEntity($busAsiento, $this->request->data);
            if ($this->BusAsientos->save($busAsiento)) {
                $this->Flash->success(__('The bus asiento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bus asiento could not be saved. Please, try again.'));
            }
        }
        $busPisos = $this->BusAsientos->BusPisos->find('list', ['limit' => 200]);
        $estados = $this->BusAsientos->Estados->find('list', ['limit' => 200]);
        $this->set(compact('busAsiento', 'busPisos', 'estados'));
        $this->set('_serialize', ['busAsiento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bus Asiento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $busAsiento = $this->BusAsientos->get($id);
        if ($this->BusAsientos->delete($busAsiento)) {
            $this->Flash->success(__('The bus asiento has been deleted.'));
        } else {
            $this->Flash->error(__('The bus asiento could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
