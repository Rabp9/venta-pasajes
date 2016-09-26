<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use rabp9\PDF;

class PasajesController extends AppController
{
    public function index() {
        $this->viewBuilder()->layout(false);
    }
    
    public function view($id) {
        require_once(ROOT . DS . 'vendor' . DS . 'rabp9' . DS . 'PDF.php');
        $this->viewBuilder()->layout('pdf'); //this will use the pdf.ctp layout
                
        $pasaje = $this->Pasajes->find()
            ->where(['Pasajes.id' => $id])
            ->first();
        if ($pasaje->cliente_id) {
            $pasaje = $this->Pasajes->find()
                ->where(['Pasajes.id' => $id])
                ->contain(['Clientes', 'Personas', 'BusAsientos', 
                    'Programaciones',
                    'DetalleDesplazamientos' => [
                        'Desplazamientos' => [
                            'AgenciaOrigen' => ['Ubigeos'],
                            'AgenciaDestino' => ['Ubigeos']
                        ]
                    ]])
                ->first();
        } else {
            $pasaje = $this->Pasajes->find()
                ->where(['Pasajes.id' => $id])
                ->contain(['Personas', 'BusAsientos', 
                    'Programaciones',
                    'DetalleDesplazamientos' => [
                        'Desplazamientos' => [
                            'AgenciaOrigen' => ['Ubigeos'],
                            'AgenciaDestino' => ['Ubigeos']
                        ]
                    ]])
                ->first();
        }
        $this->set("pdf", new PDF("L", "mm", "A5"));
        $this->set(compact('pasaje'));
        
        $this->response->type("application/pdf");
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
    
    public function getNextNroDoc() {
        $nro_doc = $this->Pasajes->getNextNroDoc();
    
        $this->set(compact('nro_doc'));
        $this->set('_serialize', ['nro_doc']);
    }
    
    public function getForPrint() {
        $programacion_id = $this->request->param('programacion_id');
        $detalle_desplazamiento_id = $this->request->param('detalle_desplazamiento_id');
        $bus_asiento_id = $this->request->param('bus_asiento_id');
        
        $pasaje = $this->Pasajes->find()
            ->where([
                'programacion_id' => $programacion_id,
                'detalle_desplazamiento_id' => $detalle_desplazamiento_id,
                'bus_asiento_id' => $bus_asiento_id
            ])->first();
        
        $this->set(compact('pasaje'));
        $this->set('_serialize', ['pasaje']);
    }
    
    public function getByProgramacion($id) {
        require_once(ROOT .DS. 'vendor' . DS . 'rabp9' . DS . 'PDF.php');
        $this->viewBuilder()->layout('pdf'); //this will use the pdf.ctp layout
        
        $programacion = $this->Pasajes->Programaciones->find()
            ->contain([
                "Rutas" => [
                    "DetalleDesplazamientos" => [
                        "Desplazamientos" => [
                            "AgenciaOrigen" => ["Ubigeos"],
                            "AgenciaDestino" => ["Ubigeos"]
                        ]
                    ]
                ], 'Buses', 'DetalleConductores' => ['Conductores' => ['Personas']]
            ])
            ->where(['Programaciones.id' => $id])
            ->first();
        
        $this->set("pdf", new PDF("P", "mm", "A4"));
        $this->set(compact('programacion'));
        $this->response->type("application/pdf");
        
        $this->render('lista_pasajeros');
    }
}
