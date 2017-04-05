<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Kurs_model extends MY_Model
{

    public function finish_kurs($user_kurs_data)
    {
        try {
            $this->validate_user_kurs_data($user_kurs_data);
            $insert_data = [
              'id_uzytkownik_kurs' => $this->get_next_id(USER_KURS_TABLE),
              'data_obejrzenia_kurs' => date('Y-m-d H:i:s'),
              'user_id_user' => $user_kurs_data['id_user'],
              'kurs_id_kurs' => $user_kurs_data['id_kurs'],
            ];
            $this->db->insert(USER_KURS_TABLE, $insert_data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    private function validate_user_kurs_data($d)
    {
        $kurs_exists = $this->db->get_where(KURS_TABLE, ['id_kurs' => $d['id_kurs']], 1);
        if ($kurs_exists->result() == null) {
            throw new Exception('Nie ma takiego kursu! Skontaktuj się z administratorem.<br>');
        }
        $user_exists = $this->db->get_where(USER_TABLE, ['id_user' => $d['id_user']], 1);
        if ($user_exists->result() == null) {
            throw new Exception('Nie ma takiego użytkownika! Skontaktuj się z administratorem.<br>');
        }
        $user_kurs_exists = $this->db->get_where(USER_KURS_TABLE, ['user_id_user' => $d['id_user'], 'kurs_id_kurs' => $d['id_kurs']], 1);
        if ($user_kurs_exists->result() != null) {
            throw new Exception('Już ukończyłeś ten kurs! :)<br>');
        }
    }
    public function has_finihed_kurs($d)
    {
      $user_kurs_exists = $this->db->get_where(USER_KURS_TABLE, ['user_id_user' => $d['id_user'], 'kurs_id_kurs' => $d['id_kurs']], 1);
      if ($user_kurs_exists->result() != null) {
          return true;
      }
      return false;
    }
}
