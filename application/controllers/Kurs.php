<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Kurs extends MY_Controller
{
    public function index($id_kurs = 0)
    {
        if ($id_kurs == 0) {
            $this->showView('Kurs/index');
        } else {
            $this->showView('Kurs/kurs'.$id_kurs);
        }
    }
}
