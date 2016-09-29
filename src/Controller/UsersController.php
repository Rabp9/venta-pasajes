<?php
namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{
    public function login() {
        $this->viewBuilder()->layout(false);
        $user = $this->Users->newEntity($this->request->data);
        
        $user = $this->Users->find()
            ->where(['username' => $user->username, 'password' => $user->password])
            ->contain(['UserDetalles' => ['Groups']])
            ->first();
        
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
    public function manage() {
        $this->viewBuilder()->layout(false);
        
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data["user"]);
            $user->id = $this->request->data["user"]["id"];
            $user->user_detalle->id = $this->request->data["user"]["user_detalle"]["id"];
            
            if ($this->Users->save($user)) {
                $message = array(
                    'text' => __('Usuario registrado correctamente'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('No fue posible registrar el usuario'),
                    'type' => 'error'
                );
            }
        }
        
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }
}