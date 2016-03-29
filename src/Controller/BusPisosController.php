<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

class BusPisosController extends AppController
{

    public function index() {
        $this->paginate = [
            'contain' => ['Buses']
        ];
        $busPisos = $this->paginate($this->BusPisos);

        $this->set(compact('busPisos'));
        $this->set('_serialize', ['busPisos']);
    }

    public function view($id = null) {
        $busPiso = $this->BusPisos->get($id, [
            'contain' => ['Buses']
        ]);

        $this->set('busPiso', $busPiso);
        $this->set('_serialize', ['busPiso']);
    }

    public function add() {
        $this->viewBuilder()->layout(false);
        if ($this->request->is("post")) {
            $conn = ConnectionManager::get($this->BusPisos->defaultConnectionName());
            $bus_pisos = $this->BusPisos->newEntities($this->request->data);
            foreach ($bus_pisos as $k_bus_piso => $bus_piso) {
                $r = $this->BusPisos->save($bus_piso);
                if(!$r) {
                    $conn->rollback();
                    $message = [
                        "type" => "error",
                        "text" => "No se pudo guardar la información del bus"
                    ];
                    break;
                }
            }
            if($r) {
                $conn->commit();
                $message = [
                    "type" => "success",
                    "text" => "La información del Bus fue guardada exitosamente"
                ];
            }
        }
        $this->set(compact("message"));
        $this->set("_serialize", ["message"]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bus Piso id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $busPiso = $this->BusPisos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $busPiso = $this->BusPisos->patchEntity($busPiso, $this->request->data);
            if ($this->BusPisos->save($busPiso)) {
                $this->Flash->success(__('The bus piso has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bus piso could not be saved. Please, try again.'));
            }
        }
        $buses = $this->BusPisos->Buses->find('list', ['limit' => 200]);
        $this->set(compact('busPiso', 'buses'));
        $this->set('_serialize', ['busPiso']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bus Piso id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $busPiso = $this->BusPisos->get($id);
        if ($this->BusPisos->delete($busPiso)) {
            $this->Flash->success(__('The bus piso has been deleted.'));
        } else {
            $this->Flash->error(__('The bus piso could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
