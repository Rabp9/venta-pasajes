<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DetalleDesplazamientos Controller
 *
 * @property \App\Model\Table\DetalleDesplazamientosTable $DetalleDesplazamientos
 */
class DetalleDesplazamientosController extends AppController
{
    public function index() {
        $this->viewBuilder()->layout(false);
        
        $detalleDesplazamientos = $this->DetalleDesplazamientos->find("all")
            ->contain(["Rutas", "Desplazamientos"]);

        $this->set(compact('detalleDesplazamientos'));
        $this->set('_serialize', ['detalleDesplazamientos']);
    }

    /**
     * View method
     *
     * @param string|null $id Detalle Desplazamiento id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detalleDesplazamiento = $this->DetalleDesplazamientos->get($id, [
            'contain' => ['Rutas', 'ProgramacionViajes', 'Agencias']
        ]);

        $this->set('detalleDesplazamiento', $detalleDesplazamiento);
        $this->set('_serialize', ['detalleDesplazamiento']);
    }
    
    public function add() {
        $this->viewBuilder()->layout(false);
        
        $detalleDesplazamiento = $this->DetalleDesplazamientos->newEntity();
        if ($this->request->is('post')) {
            $detalleDesplazamiento = $this->DetalleDesplazamientos->patchEntity($detalleDesplazamiento, $this->request->data);
            if ($this->DetalleDesplazamientos->save($detalleDesplazamiento)) {
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
        $rutas = $this->DetalleDesplazamientos->Rutas->find("list");
        $desplazamientos = $this->DetalleDesplazamientos->Desplazamientos->find("list");
        $this->set(compact("detalleDesplazamiento", "rutas", "desplazamientos"));
        $this->set('_serialize', ["message"]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Detalle Desplazamiento id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detalleDesplazamiento = $this->DetalleDesplazamientos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detalleDesplazamiento = $this->DetalleDesplazamientos->patchEntity($detalleDesplazamiento, $this->request->data);
            if ($this->DetalleDesplazamientos->save($detalleDesplazamiento)) {
                $this->Flash->success(__('The detalle desplazamiento has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The detalle desplazamiento could not be saved. Please, try again.'));
            }
        }
        $rutas = $this->DetalleDesplazamientos->Rutas->find('list', ['limit' => 200]);
        $programacionViajes = $this->DetalleDesplazamientos->ProgramacionViajes->find('list', ['limit' => 200]);
        $agencias = $this->DetalleDesplazamientos->Agencias->find('list', ['limit' => 200]);
        $this->set(compact('detalleDesplazamiento', 'rutas', 'programacionViajes', 'agencias'));
        $this->set('_serialize', ['detalleDesplazamiento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Detalle Desplazamiento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detalleDesplazamiento = $this->DetalleDesplazamientos->get($id);
        if ($this->DetalleDesplazamientos->delete($detalleDesplazamiento)) {
            $this->Flash->success(__('The detalle desplazamiento has been deleted.'));
        } else {
            $this->Flash->error(__('The detalle desplazamiento could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    public function setRestricciones($id = null) {
        $this->viewBuilder()->layout(false);
    }
    
    public function getByRutaAndDesplazamiento() {
        $this->viewBuilder()->layout(false);
        
        $ruta_id = $this->request->param("ruta_id");
        $desplazamiento_id = $this->request->param("desplazamiento_id");
        
        $detalleDesplazamiento = $this->DetalleDesplazamientos->find()
            ->where(["ruta_id" => $ruta_id, "desplazamiento_id" => $desplazamiento_id])->first();
        
        $this->set(compact('detalleDesplazamiento'));
        $this->set('_serialize', ['detalleDesplazamiento']);
    }
}
