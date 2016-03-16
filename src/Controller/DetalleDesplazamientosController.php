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

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Rutas', 'ProgramacionViajes', 'Agencias']
        ];
        $detalleDesplazamientos = $this->paginate($this->DetalleDesplazamientos);

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
        $tarifas = $this->DetalleDesplazamientos->Tarifas->find("list");
        $this->set(compact("detalleDesplazamiento", "rutas", "tarifas"));
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
}
