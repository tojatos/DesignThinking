<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Egzamin extends MY_Controller
{
    public function index()
    {
        $this->showView('Egzamin/egzamin');
    }
}
