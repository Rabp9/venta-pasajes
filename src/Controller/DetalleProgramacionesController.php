<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DetalleProgramaciones Controller
 *
 * @property \App\Model\Table\DetalleProgramacionesTable $DetalleProgramaciones
 */
class DetalleProgramacionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Rutas', 'Programaciones', 'Servicios']
        ];
        $detalleProgramaciones = $this->paginate($this->DetalleProgramaciones);

        $this->set(compact('detalleProgramaciones'));
        $this->set('_serialize', ['detalleProgramaciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Detalle Programacione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detalleProgramacione = $this->DetalleProgramaciones->get($id, [
            'contain' => ['Rutas', 'Programaciones', 'Servicios']
        ]);

        $this->set('detalleProgramacione', $detalleProgramacione);
        $this->set('_serialize', ['detalleProgramacione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detalleProgramacione = $this->DetalleProgramaciones->newEntity();
        if ($this->request->is('post')) {
            $detalleProgramacione = $this->DetalleProgramaciones->patchEntity($detalleProgramacione, $this->request->data);
            if ($this->DetalleProgramaciones->save($detalleProgramacione)) {
                $this->Flash->success(__('The detalle programacione has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The detalle programacione could not be saved. Please, try again.'));
            }
        }
        $rutas = $this->DetalleProgramaciones->Rutas->find('list', ['limit' => 200]);
        $programaciones = $this->DetalleProgramaciones->Programaciones->find('list', ['limit' => 200]);
        $servicios = $this->DetalleProgramaciones->Servicios->find('list', ['limit' => 200]);
        $this->set(compact('detalleProgramacione', 'rutas', 'programaciones', 'servicios'));
        $this->set('_serialize', ['detalleProgramacione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Detalle Programacione id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detalleProgramacione = $this->DetalleProgramaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detalleProgramacione = $this->DetalleProgramaciones->patchEntity($detalleProgramacione, $this->request->data);
            if ($this->DetalleProgramaciones->save($detalleProgramacione)) {
                $this->Flash->success(__('The detalle programacione has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The detalle programacione could not be saved. Please, try again.'));
            }
        }
        $rutas = $this->DetalleProgramaciones->Rutas->find('list', ['limit' => 200]);
        $programaciones = $this->DetalleProgramaciones->Programaciones->find('list', ['limit' => 200]);
        $servicios = $this->DetalleProgramaciones->Servicios->find('list', ['limit' => 200]);
        $this->set(compact('detalleProgramacione', 'rutas', 'programaciones', 'servicios'));
        $this->set('_serialize', ['detalleProgramacione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Detalle Programacione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detalleProgramacione = $this->DetalleProgramaciones->get($id);
        if ($this->DetalleProgramaciones->delete($detalleProgramacione)) {
            $this->Flash->success(__('The detalle programacione has been deleted.'));
        } else {
            $this->Flash->error(__('The detalle programacione could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
