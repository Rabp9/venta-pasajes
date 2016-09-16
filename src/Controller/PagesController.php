<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class PagesController extends AppController
{
    public function home() {
        $this->viewBuilder()->layout('main');
    }
    
    public function home2() {
        $this->viewBuilder()->layout(false);
    }
    
    public function importar() {
        $this->viewBuilder()->layout(false);
    }
}
