<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Login extends MY_Controller
{
    public function index()
    {
        $this->showView('Login/login');
    }
    public function ajax_login()
    {
        try {
            if ($this->session->isLogged) {
                throw new Exception('Już jesteś zalogowany!');
            }
            $login = $this->input->post('login');
            $password = $this->input->post('password');

            $this->validate_ajax_login($login, $password);

            $this->load->model('Login_model');
            $try = $this->Login_model->login($login, $password);
            if ($try !== null) {
                throw new Exception($try);
            }

            echo '<h2>Pomyślnie zalogowano.</h2><br>';
        } catch (Exception $e) {
            echo '<h2>Logowanie nie powiodło się:</h2><br>';
            echo $e->getMessage();
        }
    }
    private function validate_ajax_login($login, $password)
    {
      validateForm([
      'login' => [$login, 50],
      'hasło' => [$password, 50],
      ]);
    }
    public function ajax_logout()
    {
        $this->load->model('Login_model');
        $this->Login_model->logout();
    }
}
