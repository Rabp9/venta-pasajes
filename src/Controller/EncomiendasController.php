<?php
namespace App\Controller;

use App\Controller\AppController;

class EncomiendasController extends AppController
{
    public function index() {
        $this->viewBuilder()->layout(false);
    }
}
