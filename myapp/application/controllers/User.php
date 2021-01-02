<?php

defined('BASEPATH') or exit('No direct script access allowed');
class User extends MY_Controller
{
    public function index($user_id = null)
    {
        try {
            $this->load->model('Egzamin_model');
            $this->load->model('Kurs_model');
            $this->load->model('User_model');
            if (!$this->session->is_logged) {
                throw new Exception('Aby mieć dostęp do profilów użytkowników musisz się <a href="'.site_url('Login').'">zalogować</a>!');
            }
            if ($user_id == null) {
                $user_id = $this->User_model->get_user_id($this->session->user_name);
            }
            $user_exists = $this->User_model->user_exists($user_id);
            if (!$user_exists) {
                throw new Exception('Nie ma takiego użytkownika!');
            }
            $exam_results = $this->get_exam_results($user_id);
            $kurs_finish_states = $this->get_kurs_finish_states($user_id);
            $user_content = [
                              'exam_results' => $exam_results,
                              'kurs_finish_states' => $kurs_finish_states,
                            ];
            $view['mainNav'] = $this->loadMainNav();
            $view['content'] = $this->loadContent('User/user', ['user' => $user_content]);
            $this->showMainView($view);
        } catch (Exception $e) {
            $this->showMessage($e->getMessage());
        }
    }
    private function get_exam_results($user_id)
    {
        $number_of_kurs = $this->Kurs_model->get_number_of_kurs();
        $exam_results = [];
        for ($i = 1; $i <= $number_of_kurs; ++$i) {
            $user_kurs_data = [
              'id_kurs' => $i,
              'id_user' => $user_id,
            ];
            $exam_result = $this->Egzamin_model->get_exam_result($user_kurs_data);
            $exam_results[$i] = $exam_result;
        }

        return $exam_results;
    }
    private function get_kurs_finish_states($user_id)
    {
        $number_of_kurs = $this->Kurs_model->get_number_of_kurs();
        $kurs_finish_states = [];
        for ($i = 1; $i <= $number_of_kurs; ++$i) {
            $user_kurs_data = [
              'id_kurs' => $i,
              'id_user' => $user_id,
            ];
            $kurs_finish_state = $this->Egzamin_model->get_kurs_finish_state($user_kurs_data);
            $kurs_finish_states[$i] = $kurs_finish_state;
        }

        return $kurs_finish_states;
    }
}
