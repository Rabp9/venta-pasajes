<?php
namespace App\Controller;

use App\Controller\AppController;

class PasajesController extends AppController
{
    public function index() {
        $this->viewBuilder()->layout(false);
    }

    /**
     * View method
     *
     * @param string|null $id Pasaje id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pasaje = $this->Pasajes->get($id, [
            'contain' => ['Personas', 'BusAsientos', 'Programaciones']
        ]);

        $this->set('pasaje', $pasaje);
        $this->set('_serialize', ['pasaje']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->viewBuilder()->layout(false);
        
        $pasaje = $this->Pasajes->newEntity();
        if ($this->request->is('post')) {
            $pasaje = $this->Pasajes->patchEntity($pasaje, $this->request->data);
            if ($this->Pasajes->save($pasaje)) {
                $message = array(
                    'text' => __('Pasaje registrado correctamente'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('No fue posible registrar el pasaje'),
                    'type' => 'error'
                );
            }
        }
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pasaje id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pasaje = $this->Pasajes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pasaje = $this->Pasajes->patchEntity($pasaje, $this->request->data);
            if ($this->Pasajes->save($pasaje)) {
                $this->Flash->success(__('The pasaje has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pasaje could not be saved. Please, try again.'));
            }
        }
        $personas = $this->Pasajes->Personas->find('list', ['limit' => 200]);
        $busAsientos = $this->Pasajes->BusAsientos->find('list', ['limit' => 200]);
        $programaciones = $this->Pasajes->Programaciones->find('list', ['limit' => 200]);
        $this->set(compact('pasaje', 'personas', 'busAsientos', 'programaciones'));
        $this->set('_serialize', ['pasaje']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pasaje id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pasaje = $this->Pasajes->get($id);
        if ($this->Pasajes->delete($pasaje)) {
            $this->Flash->success(__('The pasaje has been deleted.'));
        } else {
            $this->Flash->error(__('The pasaje could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
