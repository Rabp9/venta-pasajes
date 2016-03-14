<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Agencias Controller
 *
 * @property \App\Model\Table\AgenciasTable $Agencias
 */
class AgenciasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->viewBuilder()->layout(false);
        $this->paginate = [
            'contain' => ['Ubigeos']
        ];
        $agencias = $this->paginate($this->Agencias);

        $this->set(compact('agencias'));
        $this->set('_serialize', ['agencias']);
    }

    /**
     * View method
     *
     * @param string|null $id Agencia id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */ 
    public function view($id = null) {
        $this->viewBuilder()->layout(false);
        
        $agencia = $this->Agencias->get($id, [
            'contain' => ['Ubigeos','Estados']
            
        ]);

        $this->set('agencia', $agencia);
        $this->set('_serialize', ['agencia']);
    }
    /**
     * 
     * public function view($id = null)
    {
        $detalleDesplazamiento = $this->DetalleDesplazamientos->get($id, [
            'contain' => ['Rutas', 'ProgramacionViajes', 'Agencias']
        ]);

        $this->set('detalleDesplazamiento', $detalleDesplazamiento);
        $this->set('_serialize', ['detalleDesplazamiento']);
    }
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $agencia = $this->Agencias->newEntity();
        if ($this->request->is('post')) {
            $agencia = $this->Agencias->patchEntity($agencia, $this->request->data);
            if ($this->Agencias->save($agencia)) {
                $this->Flash->success(__('The agencia has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The agencia could not be saved. Please, try again.'));
            }
        }
        $ubigeos = $this->Agencias->Ubigeos->find('list', ['limit' => 200]);
        $estados = $this->Agencias->Estados->find('list', ['limit' => 200]);
        $this->set(compact('agencia', 'ubigeos', 'estados'));
        $this->set('_serialize', ['agencia']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Agencia id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */  
   public function edit($id = null) {
        $this->viewBuilder()->layout(false);
        
        $agencia = $this->Agencias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $agencia = $this->Agencias->patchEntity($agencia, $this->request->data);
            if ($this->Agencias->save($agencia)) {
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
        $ubigeos = $this->Agencias->Ubigeos->find('list', ['limit' => 200]);
        $estados = $this->Agencias->Estados->find('list', ['limit' => 200]);
        $this->set(compact('agencia','ubigeos', 'estados'));
        $this->set("_serialize", ["agencia"]);
    } 
    /**
     * Delete method
     *
     * @param string|null $id Agencia id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $agencia = $this->Agencias->get($id);
        if ($this->Agencias->delete($agencia)) {
            $this->Flash->success(__('The agencia has been deleted.'));
        } else {
            $this->Flash->error(__('The agencia could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
