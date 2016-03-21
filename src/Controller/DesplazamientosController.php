<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Desplazamientos Controller
 *
 * @property \App\Model\Table\DesplazamientosTable $Desplazamientos
 */
class DesplazamientosController extends AppController
{
    public function index($origen = 0, $destino = 0) {
        $this->viewBuilder()->layout(false);
        
        $desplazamientos = $this->Desplazamientos->find("all")->contain([
            "AgenciaOrigen" => ["Ubigeos"],
            "AgenciaDestino" => ["Ubigeos"]
        ]);
        
        $origen = $this->request->param("origen");
        $destino = $this->request->param("destino");
        
        if($origen != 0) {
            $desplazamientos->where(["Desplazamientos.origen" => $origen]);
        }
        if($destino != 0) {
            $desplazamientos->where(["Desplazamientos.destino" => $destino]);
        }
        
        $this->set(compact('desplazamientos'));
        $this->set('_serialize', ['desplazamientos']);
    }

    /**
     * View method
     *
     * @param string|null $id Desplazamiento id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $desplazamiento = $this->Desplazamientos->get($id, [
            'contain' => []
        ]);

        $this->set('desplazamiento', $desplazamiento);
        $this->set('_serialize', ['desplazamiento']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $desplazamiento = $this->Desplazamientos->newEntity();
        if ($this->request->is('post')) {
            $desplazamiento = $this->Desplazamientos->patchEntity($desplazamiento, $this->request->data);
            if ($this->Desplazamientos->save($desplazamiento)) {
                $this->Flash->success(__('The desplazamiento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The desplazamiento could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('desplazamiento'));
        $this->set('_serialize', ['desplazamiento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Desplazamiento id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $desplazamiento = $this->Desplazamientos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $desplazamiento = $this->Desplazamientos->patchEntity($desplazamiento, $this->request->data);
            if ($this->Desplazamientos->save($desplazamiento)) {
                $this->Flash->success(__('The desplazamiento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The desplazamiento could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('desplazamiento'));
        $this->set('_serialize', ['desplazamiento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Desplazamiento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $desplazamiento = $this->Desplazamientos->get($id);
        if ($this->Desplazamientos->delete($desplazamiento)) {
            $this->Flash->success(__('The desplazamiento has been deleted.'));
        } else {
            $this->Flash->error(__('The desplazamiento could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
