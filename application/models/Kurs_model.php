<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Kurs_model extends MY_Model
{

    // public function finish_kurs($user_kurs_data)
    // {
    //     try {
    //         $this->validate_user_data($user_kurs_data);
    //         $insert_data = [
    //           'id_uzytkownik_kurs' => $this->get_next_id(USER_KURS_TABLE),
    //         ];
    //         $this->db->insert(USER_KURS_TABLE, $insert_data);
    //     } catch (Exception $e) {
    //         return $e->getMessage();
    //     }
    // }
    // private function validate_user_data($d)
    // {
    //     $email_exists = $this->db->get_where(USER_KURS_TABLE, ['email' => $d['email']], 1);
    //     if ($email_exists->result() != null) {
    //         throw new Exception('Taki e-mail już istnieje! Wpisz inny.<br>');
    //     }
    //     $login_exists = $this->db->get_where(USER_TABLE, ['login' => $d['login']], 1);
    //     if ($login_exists->result() != null) {
    //         throw new Exception('Taki login już istnieje! Wpisz inny.<br>');
    //     }
    // }
}
