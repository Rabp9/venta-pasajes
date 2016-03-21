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
    public function index($servicio_id = 0, $origen = 0, $destino = 0) {
        $this->viewBuilder()->layout(false);
        
        $tarifas = $this->Tarifas->find("all")->contain([
            "Servicios",
            "Desplazamientos" => [
                "AgenciaOrigen" => ["Ubigeos"],
                "AgenciaDestino" => ["Ubigeos"]
            ]
        ]);
        $servicio_id = $this->request->param("servicio_id");
        $origen = $this->request->param("origen");
        $destino = $this->request->param("destino");
        
        if($servicio_id != 0) {
            $tarifas->where(["Tarifas.servicio_id" => $servicio_id]);
        }
        if($origen != 0) {
            $tarifas->contain(["Desplazamientos" => function($q) use ($origen) {
                    return $q->where(["Desplazamientos.origen" => $origen]);
                }
            ]);
        }
        if($destino != 0) {
            $tarifas->contain(["Desplazamientos" => function($q) use ($destino) {
                    return $q->where(["Desplazamientos.destino" => $destino]);
                }
            ]);
        }
        
        $this->set(compact('tarifas'));
        $this->set('_serialize', ['tarifas']);
    }

    public function view($id = null) {
        $tarifa = $this->Tarifas->get($id, [
            'contain' => ["Servicios", "AgenciaOrigen", "AgenciaDestino"]
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

    public function edit($id = null) {
        $this->viewBuilder()->layout(false);
        
        $tarifa = $this->Tarifas->get($id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
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
        $this->set('_serialize', ['message']);
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
