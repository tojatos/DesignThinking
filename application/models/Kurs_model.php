<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Kurs_model extends MY_Model
{
    /**
     * Wkłada nowego użytkownika do bazy danych.
     *
     * @param [array] $user_data powinna zawierać klucze 'login', 'password', 'email', 'city'
     */
    public function create_user($user_data)
    {
        try {
            $this->validate_user_data($user_data);
            $insert_data = [
              'id_user' => $this->get_next_id(USER_TABLE),
              'login' => $user_data['login'],
              'password' => password_hash($user_data['password'], PASSWORD_DEFAULT),
              'email' => $user_data['email'],
              'verified' => false,
              'miejscowosc' => $user_data['city'],
            ];
            $this->db->insert(USER_TABLE, $insert_data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    private function validate_user_data($d)
    {
        $email_exists = $this->db->get_where(USER_TABLE, ['email' => $d['email']], 1);
        if ($email_exists->result() != null) {
            throw new Exception('Taki e-mail już istnieje! Wpisz inny.<br>');
        }
        $login_exists = $this->db->get_where(USER_TABLE, ['login' => $d['login']], 1);
        if ($login_exists->result() != null) {
            throw new Exception('Taki login już istnieje! Wpisz inny.<br>');
        }
    }
}
