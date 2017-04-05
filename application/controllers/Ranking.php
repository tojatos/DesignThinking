<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Ranking extends MY_Controller
{
public function index($id_kurs = 0)
    {
        $view['mainNav'] = $this->loadMainNav();
        $view['content'] = $this->loadContent('Ranking/index');
        $this->showMainView($view);
    }

}