<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

class PersonasController extends AppController
{
    
    public function index(){
        $this->viewBuilder()->layout(false);
        
        $personas = $this->Personas->find("all")
            ->limit(50);
        
        $this->set(compact('personas'));
        $this->set('_serialize', ['personas']);
      
    }

    public function view($id = null) { 
        $this->viewBuilder()->layout(false);
        
        $persona = $this->Personas->get($id, [
            'contain' => []
        ]);

        $this->set('persona', $persona);
        $this->set('_serialize', ['persona']);
    }

    public function findByDni($dni = null) { 
        $this->viewBuilder()->layout(false);
        
        $dni = $this->request->param("dni");
        
        $persona = $this->Personas->find()
            ->where(["dni" => $dni])
            ->first();

        $this->set(compact('persona'));
        $this->set('_serialize', ['persona']);
    }
    
    public function findByNombre($nombre = null) { 
        $this->viewBuilder()->layout(false);
        
        $nombre = $this->request->param("nombre");
        
        $personas = $this->Personas->find()
            ->where([
                'OR' => [
                    'apellidos LIKE' => '%' . $nombre . '%',
                    "nombres LIKE" => '%' . $nombre . '%' 
                ]
            ]);

        $this->set(compact('personas'));
        $this->set('_serialize', ['personas']);
    }

    public function add() {
        $this->viewBuilder()->layout(false);
        
        $persona = $this->Personas->newEntity();
        if ($this->request->is('post')) {
            $this->request->data["fecha_nac"] = Time::createFromFormat("Y-m-d", $this->request->data["fecha_nac"]);
            $persona = $this->Personas->patchEntity($persona, $this->request->data);
            if ($this->Personas->save($persona)) {
                $message = array(
                    'text' => __('Persona registrada correctamente'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('No fue posible registrar la persona'),
                    'type' => 'error'
                );
            }
        }
        $this->set(compact('persona', 'message'));
        $this->set('_serialize', ['message']);  
    }

    /**
     * Edit method
     *
     * @param string|null $id Persona id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout(false);
        
        $persona = $this->Personas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data["fecha_nac"] = Time::createFromFormat("Y-m-d", $this->request->data["fecha_nac"]);
            $persona = $this->Personas->patchEntity($persona, $this->request->data);
            if ($this->Personas->save($persona)) {
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
        /*$estados = $this->Buses->Estados->find('list');*/
        $this->set(compact('persona'));
        $this->set("_serialize", ["message"]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Persona id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $persona = $this->Personas->get($id);
        if ($this->Personas->delete($persona)) {
            $this->Flash->success(__('The persona has been deleted.'));
        } else {
            $this->Flash->error(__('The persona could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
