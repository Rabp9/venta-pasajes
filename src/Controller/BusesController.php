<?php

namespace App\Controller;

class BusesController extends AppController
{
    public function index() {
        $this->viewBuilder()->layout("main");
    }
}
