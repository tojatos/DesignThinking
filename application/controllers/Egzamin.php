<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Egzamin extends MY_Controller
{
    public function index($id_egzamin = 0)
    {
        try {
            $this->load->model('Egzamin_model');
            $this->load->model('Kurs_model');
            $this->load->model('User_model');

            if (!$this->session->is_logged) {
                throw new Exception('Aby mieć dostęp do egzaminu musisz się <a href="'.site_url('Login').'">zalogować</a>!');
            }
            $view['mainNav'] = $this->loadMainNav();
            if ($id_egzamin == 0) {
                $view['content'] = $this->loadContent('Egzamin/index');
            } else {
                $this->checkFinishState($id_egzamin);
                $exam_content = $this->Egzamin_model->getExamContent($id_egzamin);
                $view['content'] = $this->loadContent('Egzamin/egzamin_form', ['exam_content' => $exam_content]);
            }
            $this->showMainView($view);
        } catch (Exception $e) {
            $this->showMessage($e->getMessage());
        }
    }
    private function checkFinishState($id_egzamin)
    {
        $username = $this->session->user_name;
        $user_id = $this->User_model->get_user_id($username);
        $has_finished_kurs = $this->Kurs_model->has_finihed_kurs(['id_kurs' => $id_egzamin, 'id_user' => $user_id]);
        if (!$has_finished_kurs) {
            throw new Exception('Aby mieć dostęp do tego egzaminu musisz ukończyć odpowiadający mu kurs!');
        }
    }
    public function ajax_finish_exam()
    {
        try {
            if (!$this->session->is_logged) {
                throw new Exception('Musisz się zalogować aby ukończyć egzamin!');
            }
            $id_kurs = $this->input->post('kurs_id');
            $username = $this->session->user_name;

            $this->load->model('Egzamin_model');
            $this->load->model('User_model');
            $this->load->model('Pytania_model');

            $id_pytan = $this->Pytania_model->get_id_pytan($id_kurs);
            $ilosc_pytan = count($id_pytan);

            $wynik = 0;
            foreach ($id_pytan as $id_pytanie) {
                $post_odpowiedz = $this->input->post('pytanie_'.$id_pytanie);
                $prawidlowa_odpowiedz = $this->Pytania_model->get_prawidlowa_odpowiedz($id_pytanie);
                if($post_odpowiedz == $prawidlowa_odpowiedz)
                {
                  $wynik++;
                }
            }
            $srednia = ($wynik/$ilosc_pytan*100)."%";
            $id_user = $this->User_model->get_user_id($username);
            $user_kurs_data = [
              'id_kurs' => $id_kurs,
              'id_user' => $id_user,
              'wynik' => $srednia
            ];
            $try = $this->Egzamin_model->finish_exam($user_kurs_data);
            if ($try !== null) {
                throw new Exception($try);
            }

            echo '<h2>Potwierdzono ukończenie egzaminu.</h2><br>';
        } catch (Exception $e) {
            echo '<h2>Potwierdzenie ukończenia egzaminu nie powiodło się:</h2><br>';
            echo $e->getMessage();
        }
    }
}
