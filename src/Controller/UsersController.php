<?php
namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{
    public function index() {
        $this->viewBuilder()->layout(false);
        
        $users_1 = $this->Users->find("all")
            ->contain(['UserDetalles' => [
                "Groups", 'Agencias' => [
                    "Ubigeos"
                ]
            ], 'Estados'])
            ->toArray();
        
        $users_2 = $this->Users->find("all")
            ->contain(["UserDetalles" => ["Groups"], "Estados"])
            ->where(["UserDetalles.group_id" => 1])
            ->toArray();
        
        $users = array_merge($users_1, $users_2);
        
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

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
    
    public function add() {
        $this->viewBuilder()->layout(false);
        
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $message = array(
                    'text' => __('Usuario registrado correctamente'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('No fue posible registrar el Usuario'),
                    'type' => 'error'
                );
            }
        }
        $estados = $this->Users->Estados->find('list');
        $this->set(compact('user'));
        $this->set('_serialize', ['message']);
    }
  
    public function edit($id = null) {
        $this->viewBuilder()->layout(false);
        
        $user = $this->Users->get($id, [
            'user' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $message = array(
                    'text' => __('Usuario modificado correctamente'),
                    'type' => 'success'
                );
            } else {
                $message = array(
                    'text' => __('No fue posible modificar el Usuario'),
                    'type' => 'error'
                );
            }
        }
        $estados = $this->Users->Estados->find('list');
        $this->set(compact('estados', 'message'));
        $this->set("_serialize", ["message"]);
    } 
}