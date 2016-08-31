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
            $count = $this->DetalleDesplazamientos->find()
                    ->where($this->request->data)
                    ->count();
            if ($count) {
                $message = array(
                    'text' => __('No se pudo registrar. Ya existe un desplazamiento registrado.'),
                    'type' => 'error'
                );
            } else {
                if ($this->DetalleDesplazamientos->save($detalleDesplazamiento)) {
                    $message = array(
                        'text' => __('Desplazamiento agregado correctamente.'),
                        'type' => 'success'
                    );
                } else {
                    $message = array(
                        'text' => __('No se pudo agregar correctamente el desplazamiento.'),
                        'type' => 'error'
                    );
                }
            }
        }
        
        $this->set(compact("message"));
        $this->set('_serialize', ["message"]);
    }

    public function edit($id = null) {
        $this->viewBuilder()->layout(false);
    }

    public function delete($id = null) {
        /*
         $this->request->allowMethod(['post', 'delete']);
         
        $detalleDesplazamiento = $this->DetalleDesplazamientos->get($id);
        if ($this->DetalleDesplazamientos->delete($detalleDesplazamiento)) {
            $this->Flash->success(__('The detalle desplazamiento has been deleted.'));
        } else {
            $this->Flash->error(__('The detalle desplazamiento could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);*/
        $message = "dsadadasda";
        $this->set(compact("message"));
        $this->set('_serialize', ["message"]);
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
