<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Register extends MY_Controller
{
    public function index()
    {
        $this->showView('Register/register');
    }
    public function ajax_register()
    {
        try {
            $post_data = [
              'email' => $this->input->post('email'),
              'login' => $this->input->post('login'),
              'password' => $this->input->post('password'),
              'password_repeat' => $this->input->post('password_repeat'),
              'city' => $this->input->post('city'),
            ];
            $this->validate_ajax_register($post_data);

            $this->load->model('User_model');
            $user_data = [
              'login' => $post_data['login'],
              'password' => $post_data['password'],
              'email' => $post_data['email'],
              'city' => $post_data['city'],
            ];
            $try = $this->User_model->create_user($user_data);

            if ($try != null) {
                throw new Exception($try);
            }

            //$this->sendVerifyEmail($email);

            echo '<h2>Pomyślnie zarejestrowano.</h2><br>';
            echo 'Po potwierdzeniu wiadomości wysłanej na e-mail będzie można się <a href="'.site_url('Login').'">zalogować</a>.';
        } catch (Exception $e) {
            echo '<h2>Rejestracja nie powiodła się:</h2><br>';
            echo $e->getMessage();
        }
    }
    private function validate_ajax_register($d)
    {
        validateForm([
        'e-mail' => [$d['email'], 50],
        'login' => [$d['login'], 50],
        'hasło' => [$d['password'], 50],
        'potwierdzenie hasła' => [$d['password_repeat'], 50],
        'miejscowość' => [$d['city'], 50],
        ]);

        if (!valid_email($d['email'])) {
            throw new Exception('Wprowadzony e-mail jest nieprawidłowy!');
        }

        if ($d['password'] != $d['password_repeat']) {
            throw new Exception('Hasło różni się od hasła powtórzonego!');
        }
    }
    public function sendVerifyEmail($email)
    {
        $this->load->library('email');
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from('noreply@designthinking', 'Verifier');
        $this->email->to($email);
        $this->email->subject('Design thinking - Weryfikacja');
        $this->email->message('
      <h1>Witamy nowego użytkownika!</h1>
      Możesz potwierdzić swoją rejestrację klikając w <a href="'.site_url('Verify/').sha1($email.HASH_KEY).'">ten link</a>.<br><br>
      Jeżeli nie rejestrowałeś się na '.base_url().' zignoruj tę wiadomość.
      ');
        $this->email->send();
    }
    // public function test()
    // {
    //   $this->sendVerifyEmail('tojatos@gmail.com');
    // }
}
