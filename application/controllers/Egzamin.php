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
                $exam_content = $this->Egzamin_model->get_exam_content($id_egzamin);
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
            $this->load->model('Questions_model');

            $question_ids = $this->Questions_model->get_question_ids($id_kurs);
            $number_of_questions = count($question_ids);

            $wynik = 0;
            foreach ($question_ids as $id_question) {
                $post_answer = $this->input->post('question_'.$id_question);
                $correct_answer_letter = $this->Questions_model->get_correct_answer_letter($id_question);
                if($post_answer == $correct_answer_letter)
                {
                  $wynik++;
                }
            }
            $srednia = ($wynik/$number_of_questions*100);
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
