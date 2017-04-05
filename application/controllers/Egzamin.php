<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Egzamin extends MY_Controller
{
    public function index($id_egzamin = 0)
    {
        try {
            if (!$this->session->is_logged) {
                throw new Exception('Aby mieć dostęp do egzaminu musisz się <a href="'.site_url("Login").'">zalogować</a>!');
            }
            $username = $this->session->user_name;
            $view['mainNav'] = $this->loadMainNav();
            if ($id_egzamin == 0) {
                $view['content'] = $this->loadContent('Egzamin/index');
            } else {
                $this->load->model("Kurs_model");
                $this->load->model("User_model");
                $user_id = $this->User_model->get_user_id($username);
                $has_finished_kurs = $this->Kurs_model->has_finihed_kurs(['id_kurs' => $id_egzamin, 'id_user' => $user_id]);
                if(!$has_finished_kurs)
                {
                  throw new Exception('Aby mieć dostęp do tego egzaminu musisz ukończyć odpowiadający mu kurs!');
                }
                $view['content'] = $this->loadContent('Egzamin/egzamin'.$id_egzamin);
            }
            $this->showMainView($view);
        } catch (Exception $e) {
          $this->showMessage($e->getMessage());
        }
    }
}
