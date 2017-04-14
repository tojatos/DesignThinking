<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Login extends MY_Controller
{
    public function index()
    {
        $view['mainNav'] = $this->loadMainNav();
        $view['content'] = $this->loadContent('Login/index');
        $this->showMainView($view);
    }
    public function ajax_login()
    {
        try {
            $post_data = [
              'login' => $this->input->post('login'),
              'password' => $this->input->post('password'),
            ];

            $this->validate_ajax_login($post_data);

            $this->load->model('Login_model');
            $login_data = $post_data;
            $try = $this->Login_model->login($login_data);
            if ($try !== null) {
                throw new Exception($try);
            }

            echo '<h2>Pomyślnie zalogowano.</h2><br>';
        } catch (Exception $e) {
            echo '<h2>Logowanie nie powiodło się:</h2><br>';
            echo $e->getMessage();
        }
    }
    private function validate_ajax_login($d)
    {
        if ($this->session->is_logged) {
            throw new Exception('Już jesteś zalogowany!');
        }
        validateForm([
          'login' => [$d['login'], 50],
          'hasło' => [$d['password'], 50],
        ]);
    }
    public function ajax_logout()
    {
        $this->load->model('Login_model');
        $this->Login_model->logout();
    }
}
