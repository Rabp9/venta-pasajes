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
                
        $pasaje = $this->Pasajes->find()
            ->where(['Pasajes.id' => $id])
            ->first();
        if ($pasaje->cliente_id) {
            $pasaje = $this->Pasajes->find()
                ->where(['Pasajes.id' => $id])
                ->contain(['Clientes', 'Personas', 'BusAsientos',
                    'Programaciones', 'Estados',
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
                    'Programaciones', 'Estados',
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
    
    public function add() {
        $this->viewBuilder()->layout(false);
        
        $pasaje = $this->Pasajes->newEntity();
        if ($this->request->is('post')) {
            $pasaje = $this->Pasajes->patchEntity($pasaje, $this->request->data);
            $pasaje->fechahora = date("Y-m-d H:i:s");
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
                'Buses' => ['BusPisos'],
                "Rutas" => [
                    "DetalleDesplazamientos" => [
                        "Desplazamientos" => [
                            "AgenciaOrigen" => ["Ubigeos"],
                            "AgenciaDestino" => ["Ubigeos"]
                        ]
                    ]
                ], 
                'Pasajes' => [
                    'BusAsientos' => ['BusPisos'], 
                    'Personas',
                    'DetalleDesplazamientos' => [
                        'Desplazamientos' => [
                            'AgenciaOrigen' => ['Ubigeos' => ['ParentUbigeos1' => ['ParentUbigeos2']]],
                            'AgenciaDestino' => ['Ubigeos' => ['ParentUbigeos1' => ['ParentUbigeos2']]]
                        ]
                    ]
                ],
                'DetalleConductores' => ['Conductores' => ['Personas']]
            ])
            ->where(['Programaciones.id' => $id])
            ->first();
        
        $this->set("pdf", new PDF("P", "mm", "A4"));
        $this->set(compact('programacion'));
        $this->response->type("application/pdf");
       
        $this->render('lista_pasajeros');
    }
      
    public function getManifiesto($id) {
        require_once(ROOT .DS. 'vendor' . DS . 'rabp9' . DS . 'PDF.php');
        $this->viewBuilder()->layout('pdf'); //this will use the pdf.ctp layout
        
        $programacion = $this->Pasajes->Programaciones->find()
            ->contain([
                'Buses' => ['BusPisos'],
                "Rutas" => [
                    "DetalleDesplazamientos" => [
                        "Desplazamientos" => [
                            "AgenciaOrigen" => ["Ubigeos"],
                            "AgenciaDestino" => ["Ubigeos"]
                        ]
                    ]
                ], 
                'Pasajes' => [
                    'BusAsientos' => ['BusPisos'], 
                    'Personas',
                    'DetalleDesplazamientos' => [
                        'Desplazamientos' => [
                            'AgenciaOrigen' => ['Ubigeos' => ['ParentUbigeos1' => ['ParentUbigeos2']]],
                            'AgenciaDestino' => ['Ubigeos' => ['ParentUbigeos1' => ['ParentUbigeos2']]]
                        ]
                    ]
                ],
                'DetalleConductores' => ['Conductores' => ['Personas']]
            ])
            ->where(['Programaciones.id' => $id])
            ->first();
        
        $this->set("pdf", new PDF("P", "mm", "A4"));
        $this->set(compact('programacion'));
        $this->response->type("application/pdf");
       
        $this->render('manifiesto_pasajeros');
    }
    
    public function cancel() {
        $programacion_id = $this->request->data['programacion_id'];
        $detalle_desplazamiento_id = $this->request->data['detalle_desplazamiento_id'];
        $bus_asiento_id = $this->request->data['bus_asiento_id'];
      
        $pasaje = $this->Pasajes->find()
            ->where([
                'programacion_id' => $programacion_id,
                'detalle_desplazamiento_id' => $detalle_desplazamiento_id,
                'bus_asiento_id' => $bus_asiento_id
            ])->first();
        
        if ($this->Pasajes->delete($pasaje)) {
            $message = array(
                'text' => __('Pasaje cancelado correctamente'),
                'type' => 'success'
            );
        } else {
            $message = array(
                'text' => __('No fue posible cancelar el pasaje'),
                'type' => 'error'
            );
        }
        
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
    
    public function getData() {
        $this->viewBuilder()->layout(false);
        
        $this->loadModel('Restricciones');
        
        $bus_asiento_id = $this->request->param("bus_asiento_id");
        $programacion_id = $this->request->param("programacion_id");
        $detalle_desplazamiento_id = $this->request->param("detalle_desplazamiento_id");
        
        $pasaje = $this->Pasajes->find()
            ->where([
                "bus_asiento_id" => $bus_asiento_id, 
                "programacion_id" => $programacion_id,
                "detalle_desplazamiento_id" => $detalle_desplazamiento_id
            ])
            ->contain(['Personas', 'Programaciones', 'Estados'])
            ->first();
        
        $this->set(compact('pasaje'));
        $this->set('_serialize', ['pasaje']);
    }
    
    public function detalle($id) {
        $this->viewBuilder()->layout(false);
        
        $pasaje = $this->Pasajes->find()
            ->where(["Pasajes.id" => $id])
            ->contain(['Personas', 'Programaciones', 'Estados'])
            ->first();
        
        $this->set(compact('pasaje'));
        $this->set('_serialize', ['pasaje']);
    }
    
    public function confirmarCompra() {
        $this->viewBuilder()->layout(false);
        
        $programacion_id = $this->request->data['programacion_id'];
        $detalle_desplazamiento_id = $this->request->data['detalle_desplazamiento_id'];
        $bus_asiento_id = $this->request->data['bus_asiento_id'];
      
        $pasaje = $this->Pasajes->find()
            ->where([
                'programacion_id' => $programacion_id,
                'detalle_desplazamiento_id' => $detalle_desplazamiento_id,
                'bus_asiento_id' => $bus_asiento_id
            ])->first();
        
        $pasaje->estado_id = 5;
        if ($this->Pasajes->save($pasaje)) {
            $message = array(
                'text' => __('Compra confirmada correctamente'),
                'type' => 'success'
            );
        } else {
            $message = array(
                'text' => __('No fue posible confirmar la compra'),
                'type' => 'error'
            );
        }
        
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
}
