<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rutas Controller
 *
 * @property \App\Model\Table\RutasTable $Rutas
 */
class RutasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->viewBuilder()->layout(false);
        
        $this->viewBuilder()->layout(false);
        $rutas = $this->Rutas->find("all")->contain(["Estados"]);
        
        $this->set(compact('rutas'));
        $this->set('_serialize', ['rutas']);
    }


    /**
     * View method
     *
     * @param string|null $id Ruta id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ruta = $this->Rutas->get($id, [
            'contain' => ['Estados']
        ]);

        $this->set('ruta', $ruta);
        $this->set('_serialize', ['ruta']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ruta = $this->Rutas->newEntity();
        if ($this->request->is('post')) {
            $ruta = $this->Rutas->patchEntity($ruta, $this->request->data);
            if ($this->Rutas->save($ruta)) {
                $this->Flash->success(__('The ruta has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ruta could not be saved. Please, try again.'));
            }
        }
        $estados = $this->Rutas->Estados->find('list', ['limit' => 200]);
        $this->set(compact('ruta', 'estados'));
        $this->set('_serialize', ['ruta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ruta id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ruta = $this->Rutas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ruta = $this->Rutas->patchEntity($ruta, $this->request->data);
            if ($this->Rutas->save($ruta)) {
                $this->Flash->success(__('The ruta has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ruta could not be saved. Please, try again.'));
            }
        }
        $estados = $this->Rutas->Estados->find('list', ['limit' => 200]);
        $this->set(compact('ruta', 'estados'));
        $this->set('_serialize', ['ruta']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ruta id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ruta = $this->Rutas->get($id);
        if ($this->Rutas->delete($ruta)) {
            $this->Flash->success(__('The ruta has been deleted.'));
        } else {
            $this->Flash->error(__('The ruta could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
