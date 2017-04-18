<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Ranking extends MY_Controller
{
public function index($id_kurs = 0)
    {
        $this->load->model('Ranking_model');
        $data = $this->Ranking_model->create_ranking();
        $view['mainNav'] = $this->loadMainNav();
        $view['content'] = $this->loadContent('Ranking/ranking', ['data' => $data]);
        $this->showMainView($view);
    }

}