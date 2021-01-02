<?php

defined('BASEPATH') or exit('No direct script access allowed');
class UserPassword extends MY_Controller
{
    public function showForgottenPasswordForm()
    {
        $this->showView('UserPassword/forgottenPasswordForm');
    }
    public function showChangePasswordForm($code)
    {
        $this->load->model('UserPassword_model');
        $isValid = $this->UserPassword_model->validateCode($code);
        if (!$isValid) {
            $this->showMessage('Ten kod jest nieprawidłowy!');
        } else{
          $this->showView('UserPassword/changePasswordForm', ['code' => $code]);
        }
    }
  public function ajax_forgottenPassword()
  {
      try {
          $email = $this->input->post('email');

          validateForm([
            'e-mail' => [$email, 50],
          ]);
          if (!valid_email($email)) {
              throw new Exception('Wprowadzony e-mail jest nieprawidłowy!');
          }
          $code = substr(str_shuffle(md5(microtime())), 0, 25);
          $this->load->model('UserPassword_model');
          $try = $this->UserPassword_model->addPasswordChangeRequest($email, $code);
          if ($try != null) {
              throw new Exception($try);
          }

          $this->sendForgottenPasswordMail($email, $code);

          echo '<h2>Pomyślnie wysłano mail.<br></h2>';
      } catch (Exception $e) {
          echo '<h2>Wysłanie maila nie powiodło się:</h2><br>';
          echo $e->getMessage();
      }
  }
  private function sendForgottenPasswordMail($email, $code)
  {
      $this->load->library('email');
      $config['mailtype'] = 'html';
      $this->email->initialize($config);
      $this->email->from('noreply@mlodyratownik', 'Password changer');
      $this->email->to($email);
      $this->email->subject('Młody ratownik - Prośba o zmianę hasła');
      $this->email->message('
      <h1>Zmiana hasła</h1>
      Możesz zmienić swoje hasło klikając w <a href="'.site_url('ChangePassword/').$code.'">ten link</a>.<br><br>
      Jeżeli nie chciałeś zmienić hasła na '.base_url().' zignoruj tę wiadomość.
      ');
      $this->email->send();
  }
  public function ajax_changePassword()
  {
      try {
          $code = $this->input->post('code');
          $password = $this->input->post('password');

          validateForm(['hasło' => [$password, 255]]);

          $this->load->model('UserPassword_model');
          $isValid = $this->UserPassword_model->validateCode($code);
          if (!$isValid) {
              throw new Exception('Ten kod jest nieprawidłowy!');
          }
          $this->UserPassword_model->changePassword($code, $password);
          $this->UserPassword_model->removeRequest($code);
          echo "Pomyślnie zmieniono hasło.
          <p><a class='btn btn-primary btn-lg' href='/Login'>zaloguj</a></p>";
      } catch (Exception $e) {
          echo 'Zmiana hasła nie powiodła się:<br>';
          echo $e->getMessage();
      }
  }
}
