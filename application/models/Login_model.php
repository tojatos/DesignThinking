<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Login_model extends MY_Model
{
    /**
     * @param [array] $login_data powinna zawierać klucze 'login', 'password'
     */
    public function login($login_data)
    {
        try {
            $this->validate_login_data($login_data);
            $this->session->isLogged = true;
            $this->session->user_name = $login_data['login'];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    private function validate_login_data($d)
    {
      $query = $this->db->get_where('user', ['login' => $d['login']], 1);
      $users = $query->result();
      if ($users == null) {
          throw new Exception('Nieprawidłowe dane logowania.<br>');
      }
      $user = $users[0];
      if ($user->verified == false) {
          throw new Exception('Musisz zweryfikować swoje konto przed zalogowaniem!<br>');
      }
      if(!password_verify($d['password'], $user->password)){
          throw new Exception('Nieprawidłowe dane logowania.<br>');
      }
    }
    public function logout()
    {
        session_unset();
        echo '<h2>Pomyślnie wylogowano.</h2><br>';
        echo '<a href="'.base_url().'">Powrót do strony głównej</a><br>';
    }
}
