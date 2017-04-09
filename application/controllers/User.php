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
                throw new Exception('Aby mieć dostęp do swojego profilu musisz się <a href="'.site_url('Login').'">zalogować</a>!');
            }
            $view['mainNav'] = $this->loadMainNav();
            if ($id_user == null) {
                throw new Exception('Nie ma takiego użytkownika!');
            }
            $user_exists = $this->User_model->user_exists($id_user);
            if (!$user_exists) {
                throw new Exception('Nie ma takiego użytkownika!');
            }
						$numberOfKurs = $this->Kurs_model->getNumberOfKurs();
						$wyniki_egzaminow = [];
						for ($i=1; $i <= $numberOfKurs; $i++) {
							$user_kurs_data = [
								'id_kurs' => $i,
	              'id_user' => $id_user,
							];
	            $egzamin_wynik = $this->Egzamin_model->get_egzamin_wynik($user_kurs_data);
							$wyniki_egzaminow[$i] = $egzamin_wynik;
						}

						$user_content = [
							'wyniki_egzaminow' => $wyniki_egzaminow
						];
            $view['content'] = $this->loadContent('User/user', ['user' => $user_content]);
            $this->showMainView($view);
        } catch (Exception $e) {
            $this->showMessage($e->getMessage());
        }
    }
}
