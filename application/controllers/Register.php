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
            $email = $this->input->post('email');
            $login = $this->input->post('login');
            $password = $this->input->post('password');
            $password_repeat = $this->input->post('password_repeat');

            $this->validate_ajax_register($email, $login, $password, $password_repeat);

            $this->load->model('User_model');
            $try = $this->User_model->createUser($login, $password, $email);
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
    private function validate_ajax_register($email, $login, $password, $password_repeat)
    {
        validateForm([
        'e-mail' => [$email, 50],
        'login' => [$login, 50],
        'hasło' => [$password, 50],
        'potwierdzenie hasła' => [$password_repeat, 50],
    ]);

        if (!valid_email($email)) {
            throw new Exception('Wprowadzony e-mail jest nieprawidłowy!');
        }

        if ($password != $password_repeat) {
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
