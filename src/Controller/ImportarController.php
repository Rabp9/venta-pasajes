<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

class ImportarController extends AppController
{
    public function preLoad() {
        $this->viewBuilder()->layout(false);
        
        if ($this->request->is("post")) {
            $file = $this->request->data["file"];

            $file = file_get_contents($file['tmp_name']);
            $backup = json_decode($file);
            
            $message = $backup;
            
            $this->set(compact("message"));
            $this->set("_serialize", ["message"]);
        }
    }
    
    public function import() {
        $this->viewBuilder()->layout(false);
        
        $clientesTable = TableRegistry::get('Clientes');
        $pasajesTable = TableRegistry::get('Pasajes');
        $girosTable = TableRegistry::get('Giros');
        $encomiendasTable = TableRegistry::get('Encomiendas');
        
        //$file = $this->request->data["file"];
        //$file = file_get_contents($file['tmp_name']);
        $file = "js/giros.json";
        $file = file_get_contents($file);
        $backup = json_decode($file);
        
        $conn = ConnectionManager::get($clientesTable->defaultConnectionName());
        $r = true;
        
        if (!empty($backup->clientes)) {
            if (!$clientesTable->save($backup->clientes)) {
                $r = false;
            }
        }
        
        if (!empty($backup->pasajes)) {
            if (!$pasajesTable->save($backup->pasajes)) {
                $r = false;
            }
        }
        
        if (!empty($backup->giros)) {
            foreach ($backup->giros as $giro) {
                $giro = $girosTable->newEntity((array)$giro);
                
                $giro->fecha = Time::createFromFormat("Y-m-d H:i:s", $this->request->data["fechahora"]);
                $giro->fecha_envio = Time::createFromFormat("Y-m-d H:i:s", $this->request->data["fechahora"]);
                $giro->fecha_recepcion = Time::createFromFormat("Y-m-d H:i:s", $this->request->data["fechahora"]);
                if (!$girosTable->save($giro)) {
                    $r = false;
                    break;
                }
            }
        }
        
        if (!empty($backup->encomiendas)) {
            if (!$encomiendasTable->save($backup->encomiendas)) {
                $r = false;
            }
        }
        
        if ($r) {
            $conn->commit();
            /*$message = [
                "type" => "success",
                "text" => "El Backup fue restaurado exitosamente"
            ];*/
        } else {
            $conn->rollback();
            $message = [
                "type" => "error",
                "text" => "El Backup no fue restaurado exitosamente"
            ];
        }
        die();
        $this->set(compact("message"));
        $this->set("_serialize", ["message"]);
    }
}