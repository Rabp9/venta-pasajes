<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Conductores Controller
 *
 * @property \App\Model\Table\ConductoresTable $Conductores
 */
class ConductoresController extends AppController
{

    public function index()
    {
        
        
        $this->viewBuilder()->layout(false);        
        $conductores = $this->Conductores->find("all")
            ->contain(["Estados","Personas"])
        ->toArray();
        $this->set(compact('conductores'));
        $this->set('_serialize', ['conductores']);
    }

    /**
     * View method
     *
     * @param string|null $id Conductore id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        
        $this->viewBuilder()->layout(false);
        $conductor = $this->Conductores->get($id, [            
            'contain' => ['Estados','Personas']
        ]);
        $this->set('conductor', $conductor);
        $this->set('_serialize', ['conductor']);  
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout(false);        
        $conductor = $this->Conductores->newEntity();
        if ($this->request->is('post')) {
            $conductor = $this->Conductores->patchEntity($conductor, $this->request->data);
            if ($this->Conductores->save($conductor)) {
                $message = array(
                    'text' => __('Conductor registrado correctamente'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('No fue posible registrar el Conductor'),
                    'type' => 'error'
                );
            }
        }
        $estados = $this->Conductores->Estados->find('list');
        $this->set(compact("conductor", "estados", "message"));
        $this->set("_serialize", ["message"]);      
    }

    /**
     * Edit method
     *
     * @param string|null $id Conductore id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout(false);
        
        $conductor = $this->Conductores->get($id, [
            'contain' => ['Estados','Personas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $conductor = $this->Conductores->patchEntity($conductor, $this->request->data);
            if ($this->Conductores->save($conductor)) {
                $message = array(
                    'text' => __('Conductor modificado correctamente'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('No fue posible modificar el Conductor'),
                    'type' => 'error'
                );
            }
        }
        $estados = $this->Conductores->Estados->find('list');
        $this->set(compact('conductor', 'estados'));
        $this->set("_serialize", ["message"]);    
    }

    /**
     * Delete method
     *
     * @param string|null $id Conductore id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
       $this->request->allowMethod(['post', 'delete']);
        $conductor = $this->Conductores->get($id);
        if ($this->Conductores->delete($conductor)) {
            $this->Flash->success(__('The conductor has been deleted.'));
        } else {
            $this->Flash->error(__('The conductor could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
