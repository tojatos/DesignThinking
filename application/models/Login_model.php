<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Login_model extends CI_model
{
    public function login($login, $password)
    {
        try {
            $query = $this->db->get_where('users', ['login' => $login], 1);
            $users = $query->result();
            if ($users == null) {
                throw new Exception('Nieprawidłowe dane logowania.<br>');
            }
            $user = $users[0];
            if ($user->verified == false) {
                throw new Exception('Musisz zweryfikować swoje konto przed zalogowaniem!<br>');
            }
            if(!password_verify($password, $user->password)){
                throw new Exception('Nieprawidłowe dane logowania.<br>');
            }
            $this->session->isLogged = true;
            $this->session->user_name = $user->login;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function logout()
    {
        session_unset();
        echo '<h2>Pomyślnie wylogowano.</h2><br>';
        echo '<a href="'.base_url().'">Powrót do strony głównej</a><br>';
    }
}
