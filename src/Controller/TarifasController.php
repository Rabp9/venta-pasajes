<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tarifas Controller
 *
 * @property \App\Model\Table\TarifasTable $Tarifas
 */
class TarifasController extends AppController
{
    public function index($origen = 0, $destino = 0) {
        $this->viewBuilder()->layout(false);
        
        $tarifas = $this->Tarifas->find("all")->contain([
            "AgenciaOrigen" => [
                "Ubigeos"
            ], "AgenciaDestino" => [
                "Ubigeos"
            ]
        ]);
        
        $origen = $this->request->param("origen");
        $destino = $this->request->param("destino");
        
        if($origen != 0) {
            $tarifas->where(["Tarifas.origen" => $origen]);
        }
        if($destino != 0) {
            $tarifas->where(["Tarifas.destino" => $destino]);
        }
        $this->set(compact('tarifas'));
        $this->set('_serialize', ['tarifas']);
    }

    public function view($id = null)
    {
        $tarifa = $this->Tarifas->get($id, [
            'contain' => []
        ]);

        $this->set('tarifa', $tarifa);
        $this->set('_serialize', ['tarifa']);
    }

    public function add() {
        $this->viewBuilder()->layout(false);
        
        $tarifa = $this->Tarifas->newEntity();
        if ($this->request->is('post')) {
            $tarifa = $this->Tarifas->patchEntity($tarifa, $this->request->data);
            if ($this->Tarifas->save($tarifa)) {
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
        $this->set(compact('tarifa'));
        $this->set('_serialize', ['tarifa']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tarifa id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tarifa = $this->Tarifas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tarifa = $this->Tarifas->patchEntity($tarifa, $this->request->data);
            if ($this->Tarifas->save($tarifa)) {
                $this->Flash->success(__('The tarifa has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tarifa could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tarifa'));
        $this->set('_serialize', ['tarifa']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tarifa id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tarifa = $this->Tarifas->get($id);
        if ($this->Tarifas->delete($tarifa)) {
            $this->Flash->success(__('The tarifa has been deleted.'));
        } else {
            $this->Flash->error(__('The tarifa could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
