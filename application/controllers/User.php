<?php

defined('BASEPATH') or exit('No direct script access allowed');
class User extends MY_Controller
{
    public function index($id_user = null)
    {
        try {
            $this->load->model('Egzamin_model');
            $this->load->model('Kurs_model');
            $this->load->model('User_model');

            if (!$this->session->is_logged) {
                throw new Exception('Aby mieć dostęp do profilów użytkowników musisz się <a href="'.site_url('Login').'">zalogować</a>!');
            }


            $view['mainNav'] = $this->loadMainNav();

            if ($id_user == null) {
								$id_user = $this->User_model->get_user_id($this->session->user_name);
            }
            $user_exists = $this->User_model->user_exists($id_user);
            if (!$user_exists) {
                throw new Exception('Nie ma takiego użytkownika!');
            }
						$numberOfKurs = $this->Kurs_model->get_number_of_kurs();
						$exam_results = [];
						for ($i=1; $i <= $numberOfKurs; $i++) {
							$user_kurs_data = [
								'id_kurs' => $i,
	              'id_user' => $id_user,
							];
	            $exam_result = $this->Egzamin_model->get_exam_result($user_kurs_data);
							$exam_results[$i] = $exam_result;
						}

						$user_content = [
							'exam_results' => $exam_results
						];
            $view['content'] = $this->loadContent('User/user', ['user' => $user_content]);
            $this->showMainView($view);
        } catch (Exception $e) {
            $this->showMessage($e->getMessage());
        }
    }
}
