<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Kurs extends MY_Controller
{
    public function index($id_kurs = 0)
    {
        $view['mainNav'] = $this->loadMainNav();
        if ($id_kurs == 0) {
            $view['content'] = $this->loadContent('Kurs/index');
        } else {
            if($this->session->is_logged)
            {
              $this->load->model('Kurs_model');
              $this->load->model('User_model');
              $username = $this->session->user_name;
              $id_user = $this->User_model->get_user_id($username);
              $has_finished_kurs = $this->Kurs_model->has_finihed_kurs([
                'id_user' => $id_user,
                'id_kurs' => $id_kurs
              ]);
              if($has_finished_kurs)
              {
                $view['content'] = $this->loadContent('Kurs/kurs'.$id_kurs, ['has_finished_kurs' => true]);
              }
              else {
                $view['content'] = $this->loadContent('Kurs/kurs'.$id_kurs, ['has_finished_kurs' => false]);
              }
            }
            else{
              $view['content'] = $this->loadContent('Kurs/kurs'.$id_kurs, ['has_finished_kurs' => false]);
            }
        }
        $this->showMainView($view);
    }
    public function ajax_finish_kurs()
    {
        try {
            if(!$this->session->is_logged)
            throw new Exception("Aby ukończyć kurs musisz się zalogować!");
            $id_kurs = $this->input->post('kurs_id');
            $username = $this->session->user_name;

            $this->load->model('Kurs_model');
            $this->load->model('User_model');
            $id_user = $this->User_model->get_user_id($username);
            $user_kurs_data = [
              'id_kurs' => $id_kurs,
              'id_user' => $id_user
            ];
            $try = $this->Kurs_model->finish_kurs($user_kurs_data);
            if ($try !== null) {
                throw new Exception($try);
            }

            echo '<h2>Potwierdzono ukończenie kursu.</h2><br>';
        } catch (Exception $e) {
            echo '<h2>Potwierdzenie ukończenia kursu nie powiodło się:</h2><br>';
            echo $e->getMessage();
        }
    }
}
