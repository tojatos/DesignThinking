<?php

defined('BASEPATH') or exit('No direct script access allowed');
class User_model extends CI_model
{

    public function createUser($login, $password, $email)
    {
        try {
            $isEmail = $this->db->get_where('users', array('email' => $email), 1);
            if ($isEmail->result() != null) {
                throw new Exception('Taki e-mail już istnieje! Wpisz inny.<br>');
            }
            $isLogin = $this->db->get_where('users', array('login' => $login), 1);
            if ($isLogin->result() != null) {
                throw new Exception('Taki login już istnieje! Wpisz inny.<br>');
            }
            $data = array(
              'login' => $login,
              'password' => password_hash($password, PASSWORD_DEFAULT),
              'email' => $email,
              'verified' => false,
        );
            $this->db->insert('users', $data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function getUser($login)
    {
      $userData = $this->db->get_where('users', array('login' => $login), 1);
      if ($userData->result() != null) {
        return $userData->result()[0];
      } else {
        return null;
      }
    }
}
