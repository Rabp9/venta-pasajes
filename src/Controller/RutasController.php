<?php
namespace App\Controller;

use App\Controller\AppController;

class RutasController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    
    public function index() {
        $this->viewBuilder()->layout(false);
        
        $rutas = $this->Rutas->find("all")->contain(["Estados"]);
        
        $this->set(compact('rutas'));
        $this->set('_serialize', ['rutas']);
    }

    public function view($id = null) {
        $this->viewBuilder()->layout(false);
        
        $ruta = $this->Rutas->get($id, [
            'contain' => [
                'Estados', 
                "DetalleDesplazamientos" => [
                    "Desplazamientos" => [
                        "AgenciaOrigen" => ["Ubigeos"],
                        "AgenciaDestino" => ["Ubigeos"]
                    ]
                ]
            ]
        ]);
        $this->set('ruta', $ruta);
        $this->set('_serialize', ['ruta']);
    }

    public function add() {
        $this->viewBuilder()->layout(false);
        
        $ruta = $this->Rutas->newEntity();
        if ($this->request->is('post')) {
            $ruta = $this->Rutas->patchEntity($ruta, $this->request->data);
            if ($this->Rutas->save($ruta)) {
                $message = array(
                    'text' => __('La Ruta fue registrada correctamente'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('La Ruta no puso ser registrada correctamente'),
                    'type' => 'error'
                );
            }
        }
        $estados = $this->Rutas->Estados->find('list');
        $this->set(compact('ruta', 'estados', 'message'));
        $this->set('_serialize', ['message']);
    }

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
