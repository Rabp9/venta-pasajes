<?php
namespace App\Controller;

use App\Controller\AppController;
use rabp9\PDF;

class PasajesController extends AppController
{
    public function index() {
        $this->viewBuilder()->layout(false);
    }

    public function view($id) {
        require_once(ROOT . DS . 'vendor' . DS . 'rabp9' . DS . 'PDF.php');
        $this->viewBuilder()->layout('pdf'); //this will use the pdf.ctp layout
                
        /*$giro = $this->Giros->find()
            ->contain([
                'PersonaRemitente', 
                'PersonaDestinatario',
                'Desplazamientos' => [
                    'AgenciaOrigen' => ['Ubigeos' => ['ParentUbigeos1' => ['ParentUbigeos2']]],
                    'AgenciaDestino' => ['Ubigeos' => ['ParentUbigeos1' => ['ParentUbigeos2']]]
                ]
            ])
            ->where(['Giros.id' => $id])
            ->first();
        */
        $this->set("pdf", new PDF("L", "mm", "A5"));
        // $this->set(compact('giro'));
        
        $this->response->type("application/pdf");
    }
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->viewBuilder()->layout(false);
        
        $pasaje = $this->Pasajes->newEntity();
        if ($this->request->is('post')) {
            $pasaje = $this->Pasajes->patchEntity($pasaje, $this->request->data);
            if ($this->Pasajes->save($pasaje)) {
                $message = array(
                    'text' => __('Pasaje registrado correctamente'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('No fue posible registrar el pasaje'),
                    'type' => 'error'
                );
            }
        }
        $this->set(compact('message', 'pasaje'));
        $this->set('_serialize', ['message', 'pasaje']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pasaje id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pasaje = $this->Pasajes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pasaje = $this->Pasajes->patchEntity($pasaje, $this->request->data);
            if ($this->Pasajes->save($pasaje)) {
                $this->Flash->success(__('The pasaje has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pasaje could not be saved. Please, try again.'));
            }
        }
        $personas = $this->Pasajes->Personas->find('list', ['limit' => 200]);
        $busAsientos = $this->Pasajes->BusAsientos->find('list', ['limit' => 200]);
        $programaciones = $this->Pasajes->Programaciones->find('list', ['limit' => 200]);
        $this->set(compact('pasaje', 'personas', 'busAsientos', 'programaciones'));
        $this->set('_serialize', ['pasaje']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pasaje id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pasaje = $this->Pasajes->get($id);
        if ($this->Pasajes->delete($pasaje)) {
            $this->Flash->success(__('The pasaje has been deleted.'));
        } else {
            $this->Flash->error(__('The pasaje could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    public function getEstado() {
        $this->viewBuilder()->layout(false);
        
        $this->loadModel('Restricciones');
        
        $bus_asiento_id = $this->request->param("bus_asiento_id");
        $programacion_id = $this->request->param("programacion_id");
        $detalle_desplazamiento_id = $this->request->param("detalle_desplazamiento_id");
        $estado = 1;
        
        $pasajes = $this->Pasajes->find()
            ->where(["bus_asiento_id" => $bus_asiento_id, "programacion_id" => $programacion_id])
            ->toArray();
        
        if (!empty($pasajes)) {
            $estado = "disponible";
            foreach ($pasajes as $pasaje) {
                $restriccion = $this->Restricciones->find()
                    ->where(["desplazamiento_x" => $pasaje->detalle_desplazamiento_id, "desplazamiento_y" => $detalle_desplazamiento_id])
                    ->first();
                if ($restriccion->valor == 1) {
                    $estado = "restringido";
                    break;
                }
            }
        } else {
            $estado = "disponible";
        }
        
        $this->set(compact('estado'));
        $this->set('_serialize', ['estado']);
    }
}
