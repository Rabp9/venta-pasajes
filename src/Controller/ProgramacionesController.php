<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

class ProgramacionesController extends AppController
{
    public function index() {
        $this->viewBuilder()->layout(false);
        
        $programaciones = $this->Programaciones->find("all")
            ->contain([
                "Rutas" => [
                    "DetalleDesplazamientos" => [
                        "Desplazamientos" => [
                            "AgenciaOrigen" => ["Ubigeos"],
                            "AgenciaDestino" => ["Ubigeos"]
                        ]
                    ]
                ], 
                "Servicios", 
                "Buses"
            ]);

        $this->set(compact('programaciones'));
        $this->set('_serialize', ['programaciones']);
    }
    
    public function getDisponibles() {
        $this->viewBuilder()->layout(false);
        
        $programaciones = $this->Programaciones->find("all")
            ->contain([
                "Rutas" => [
                    "DetalleDesplazamientos" => [
                        "Desplazamientos" => [
                            "AgenciaOrigen" => ["Ubigeos"],
                            "AgenciaDestino" => ["Ubigeos"]
                        ]
                    ]
                ], 
                "Servicios", 
                "Buses"
            ])
            ->where(["fechahora_prog >=" => date('Y-m-d')]);
        $this->set(compact('programaciones'));
        $this->set('_serialize', ['programaciones']);
    }

    public function getAnteriores() {
        $this->viewBuilder()->layout(false);
        
        $programaciones = $this->Programaciones->find("all")
            ->contain([
                "Rutas" => [
                    "DetalleDesplazamientos" => [
                        "Desplazamientos" => [
                            "AgenciaOrigen" => ["Ubigeos"],
                            "AgenciaDestino" => ["Ubigeos"]
                        ]
                    ]
                ], 
                "Servicios", 
                "Buses"
            ])
            ->where(["fechahora_prog <" =>  date('Y-m-d')]);
        $this->set(compact('programaciones'));
        $this->set('_serialize', ['programaciones']);
    }

    public function view($id = null) {
        $programacion = $this->Programaciones->get($id, [
            "contain" => ["Rutas", "Servicios", "Buses.BusPisos.BusAsientos"]
        ]);
        $this->set(compact("programacion"));
        $this->set('_serialize', ['programacion']);
    }

    public function add() {
        $this->viewBuilder()->layout(false);
        
        $programacion = $this->Programaciones->newEntity();
        if ($this->request->is('post')) {
            $this->request->data["fechahora_prog"] = Time::createFromFormat("Y-m-d H:i:s", $this->request->data["fechahora_prog"]);
            $programacion = $this->Programaciones->patchEntity($programacion, $this->request->data);
            if ($this->Programaciones->save($programacion)) {
                $message = array(
                    'text' => __('Programación registrada correctamente'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('No fue posible registrar la Programación'),
                    'type' => 'error' 
                );
            }
        }
        $this->set(compact('programacion', 'message'));
        $this->set('_serialize', ['message']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Programacione id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $programacione = $this->Programaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $programacione = $this->Programaciones->patchEntity($programacione, $this->request->data);
            if ($this->Programaciones->save($programacione)) {
                $this->Flash->success(__('The programacione has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The programacione could not be saved. Please, try again.'));
            }
        }
        $buses = $this->Programaciones->Buses->find('list', ['limit' => 200]);
        $this->set(compact('programacione', 'buses'));
        $this->set('_serialize', ['programacione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Programacione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $programacione = $this->Programaciones->get($id);
        if ($this->Programaciones->delete($programacione)) {
            $this->Flash->success(__('The programacione has been deleted.'));
        } else {
            $this->Flash->error(__('The programacione could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    public function getByFechaByOrigenByDestino() {
        $fecha = $this->request->data["fecha"];
        $origen = $this->request->data["origen"];
        $destino = $this->request->data["destino"];
        
        if ($fecha == null) {
            $programaciones = $this->Programaciones->find()
                ->contain(["Rutas", "Servicios", "Buses"])
                ->matching("Rutas.DetalleDesplazamientos.Desplazamientos", function($q) use($origen, $destino) {
                    return $q->where(["Desplazamientos.origen" => $origen, "Desplazamientos.destino" => $destino]);
            });
        } else {
            $programaciones = $this->Programaciones->find()
                ->where(["DATE(fechahora_prog)" => $fecha])
                ->contain(["Rutas", "Servicios", "Buses"])
                ->matching("Rutas.DetalleDesplazamientos.Desplazamientos", function($q) use($origen, $destino) {
                    return $q->where(["Desplazamientos.origen" => $origen, "Desplazamientos.destino" => $destino]);
            });
        }
        
        $this->set(compact('programaciones'));
        $this->set('_serialize', ['programaciones']);
    }
    
    public function registrarSalida() {
        $this->viewBuilder()->layout(false);
    }
}