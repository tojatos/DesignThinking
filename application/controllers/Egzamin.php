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

            $username = $this->session->user_name;
            $user_id = $this->User_model->get_user_id($username);

            if (!$this->session->is_logged) {
                throw new Exception('Aby mieć dostęp do egzaminu musisz się <a href="'.site_url('Login').'">zalogować</a>!');
            }
            $view['mainNav'] = $this->loadMainNav();

            if ($id_egzamin == 0) {
                $exam_results = $this->get_exam_results($user_id);
                $view['content'] = $this->loadContent('Egzamin/index', ['exam_results' => $exam_results]);
            } else {
                $has_finished_kurs = $this->Kurs_model->has_finihed_kurs(['id_kurs' => $id_egzamin, 'id_user' => $user_id]);
                if (!$has_finished_kurs) {
                    throw new Exception('Aby mieć dostęp do tego egzaminu musisz ukończyć odpowiadający mu kurs! <br><br><a class="btn btn-success btn-lg" href="'.site_url('Kurs/'.$id_egzamin).'">Przejdź do kursu</a>');
                }
                $has_user_finished_exam = $this->Egzamin_model->has_user_finished_exam(['id_kurs' => $id_egzamin, 'id_user' => $user_id]);
                if ($has_user_finished_exam) {
                    $view['content'] = $this->loadContent('Egzamin/finished', ['id_egzamin' => $id_egzamin]);
                } else {
                    $exam_content = $this->Egzamin_model->get_exam_content($id_egzamin);
                    $view['content'] = $this->loadContent('Egzamin/egzamin_form', ['exam_content' => $exam_content]);
                }
            }
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
    public function ajax_finish_exam()
    {
        try {
            if (!$this->session->is_logged) {
                throw new Exception("Musisz się <a href='http://mlodziratownicy.pl/Login'>zalogować</a> aby ukończyć egzamin!");
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
                if ($post_answer == $correct_answer_letter) {
                    ++$wynik;
                }
            }
            $srednia = ($wynik / $number_of_questions * 100);
            $id_user = $this->User_model->get_user_id($username);
            $user_kurs_data = [
              'id_kurs' => $id_kurs,
              'id_user' => $id_user,
              'wynik' => $srednia,
            ];
            $try = $this->Egzamin_model->finish_exam($user_kurs_data);
            if ($try !== null) {
                throw new Exception($try);
            }

            echo '[EXAM_FINISHED]';
        } catch (Exception $e) {
            echo '<h2>Potwierdzenie ukończenia egzaminu nie powiodło się:</h2><br>';
            echo $e->getMessage();
        }
    }
    public function ajax_restart_exam()
    {
        try {
            $this->load->model('Egzamin_model');
            $this->load->model('User_model');

            if (!$this->session->is_logged) {
                throw new Exception('Musisz się zalogować aby zrestartować egzamin!');
            }
            $exam_id = $this->input->post('exam_id');
            $username = $this->session->user_name;
            $user_id = $this->User_model->get_user_id($username);
            $user_exam_data = [
              'user_id' => $user_id,
              'exam_id' => $exam_id
            ];
            $try = $this->Egzamin_model->delete_user_exam_data($user_exam_data);

            if ($try !== null) {
                throw new Exception($try);
            }

            echo '<h2>Pomyślnie zresetowano egzamin.</h2><br>';
        } catch (Exception $e) {
            echo '<h2>Zresetowanie egzaminu nie powiodło się:</h2><br>';
            echo $e->getMessage();
        }
    }
}
