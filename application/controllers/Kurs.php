<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Kurs extends MY_Controller
{
    public function index()
    {
        $this->showView('Kurs/kurs');
    }
}