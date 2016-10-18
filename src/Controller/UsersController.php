<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;

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
        
        $hasher = new DefaultPasswordHasher();
        
        $user = $this->Users->find()
            ->where(['username' => $user->username])
            ->first();
        
        if (!empty($user)) {
            if (!$hasher->check($this->request->data['password'], $user->password)) {
                $user = null;
            }
        }
        $this->set(compact('user', 'pass'));
        $this->set('_serialize', ['user', 'pass']);
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
    
    public function view($id = null) {
        $this->viewBuilder()->layout(false);
        
        $user = $this->Users->get($id, [
            'contain' => ['UserDetalles' => ['Groups'], 'Estados']
        ]);
        
        if ($user->user_detalle->agencia_id) {
            $user = $this->Users->get($id, [
                'contain' => ['UserDetalles' => ['Groups', 'Agencias' => ['Ubigeos']], 'Estados']
            ]);
        }

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }
    
    public function add() {
        $this->viewBuilder()->layout(false);
        
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data, [
                'associated' => ['UserDetalles']
            ]);
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
        $this->set(compact('user', 'message'));
        $this->set('_serialize', ['user', 'message']);
    }
  
    public function edit($id = null) {
        $this->viewBuilder()->layout(false);
        
        $user = $this->Users->get($id, [
            'contain' => ['UserDetalles' => ['Groups'], 'Estados']
        ]);
        
        if ($user->user_detalle->agencia_id) {
            $user = $this->Users->get($id, [
                'contain' => ['UserDetalles' => ['Groups', 'Agencias' => ['Ubigeos']], 'Estados']
            ]);
        }

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
        $this->set(compact('user', 'message'));
        $this->set("_serialize", ['user', 'message']);
    }
}