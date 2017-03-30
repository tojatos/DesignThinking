<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Ranking extends MY_Controller
{
    public function index()
    {
        $this->showView('Ranking/ranking');
    }
}
