<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Main extends MY_Controller
{
    public function index()
    {
        $this->load->model('Egzamin_model');
        $this->load->model('User_model');

        if ($this->session->is_logged) {
            $user_name = $this->session->user_name;
            $user_id = $this->User_model->get_user_id($user_name);
            $finished_exams_number = $this->Egzamin_model->get_finished_exams_number($user_id);

            $view['content'] = $this->loadContent('main', ['finished_exams_number' => $finished_exams_number]);
        } else {
            $view['content'] = $this->loadContent('main');
        }

        $view['mainNav'] = $this->loadMainNav();
        $this->showMainView($view);
    }
    public function error404()
    {
        $this->showView('404');
    }
}
