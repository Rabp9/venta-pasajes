<?php
namespace App\Controller;

use App\Controller\AppController;

class ConductoresController extends AppController
{

    public function index() {
        $this->viewBuilder()->layout(false);
        
        $conductores = $this->Conductores->find("all")
            ->contain(["Estados","Personas"]);
        
        $this->set(compact('conductores'));
        $this->set('_serialize', ['conductores']);
    }

    public function view($id = null) {
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
    public function add() {
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

    public function edit($id = null) {
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
    
    public function findByDni($dni = null) { 
        $this->viewBuilder()->layout(false);
        
        $dni = $this->request->param("dni");
       
        $conductor = $this->Conductores->find()
            ->contain(["Personas" =>  function($q) use ($dni) {
                    return $q->where(["personas.dni" => $dni]);
                }])
            ->toArray();

        $this->set('conductor', $conductor);
        $this->set('_serialize', ['conductor']);
        
    }
    
    public function getMany() {
        $this->viewBuilder()->layout(false);
        
        if ($this->request->is("post")) {
            $conductores = $this->Conductores->find("all")
                ->contain(["Estados","Personas"])
                ->where(["Conductores.id IN" => $this->request->data]);
        }
        $this->set(compact('conductores'));
        $this->set('_serialize', ['conductores']);
    }
}
