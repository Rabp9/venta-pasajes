<?php
namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{
    public function login() {
        $this->viewBuilder()->layout(false);
        $user = $this->request->data;
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
}
