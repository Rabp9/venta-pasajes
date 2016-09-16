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
            ->contain(['UserDetalles' => ['Groups', 'Agencias']])
            ->first();
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
    public function manage() {
        $this->viewBuilder()->layout(false);
    }
}