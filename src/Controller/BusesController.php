<?php

namespace App\Controller;

class BusesController extends AppController
{
    public function index() {
        $this->viewBuilder()->layout("main");
    }
    
    public function add() {
        $this->viewBuilder()->layout("main");
    }
}
