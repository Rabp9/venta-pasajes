<?php
namespace App\Controller;

use App\Controller\AppController;

class ServiciosController extends AppController
{
    public function index() {
        $this->viewBuilder()->layout(false);
        
        $servicios = $this->Servicios->find("all")
            ->contain(["Estados"]);

        $this->set(compact('servicios'));
        $this->set('_serialize', ['servicios']);
    }

    public function view($id = null) {
        $this->viewBuilder()->layout(false);
        
        $servicio = $this->Servicios->get($id, [
            'contain' => ['Estados']
        ]);

        $this->set('servicio', $servicio);
        $this->set('_serialize', ['servicio']);
    }

    public function add() {
        $this->viewBuilder()->layout(false);
        
        $servicio = $this->Servicios->newEntity();
        if ($this->request->is('post')) {
            $servicio = $this->Servicios->patchEntity($servicio, $this->request->data);
            if ($this->Servicios->save($servicio)) {
                $message = array(
                    'text' => __('Servicio registrado correctamente'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('No fue posible registrar el Servicio'),
                    'type' => 'error'
                );
            }
        }
        $estados = $this->Servicios->Estados->find('list');
        $this->set(compact('servicio', 'estados', 'message'));
        $this->set('_serialize', ['message']);
    }

    public function edit($id = null) {
        $this->viewBuilder()->layout(false);
        
        $servicio = $this->Servicios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $servicio = $this->Servicios->patchEntity($servicio, $this->request->data);
            if ($this->Servicios->save($servicio)) {
                $message = array(
                    'text' => __('Servicio modificado correctamente'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('No fue posible modificar el Servicio'),
                    'type' => 'error'
                );
            }
        }
        $estados = $this->Servicios->Estados->find('list');
        $this->set(compact('servicio', 'estados', 'message'));
        $this->set('_serialize', ['message']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Servicio id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $servicio = $this->Servicios->get($id);
        if ($this->Servicios->delete($servicio)) {
            $this->Flash->success(__('The servicio has been deleted.'));
        } else {
            $this->Flash->error(__('The servicio could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    public function findServiciosAvailablesByRuta() {
        $this->viewBuilder()->layout(false);
        
        $ruta_id = $this->request->params["ruta_id"];
        
        $servicios = $this->Servicios->getServiciosAvailablesByRuta($ruta_id);
        
        $this->set(compact("servicios"));
        $this->set('_serialize', ['servicios']);
    }
}
