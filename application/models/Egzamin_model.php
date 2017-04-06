<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Egzamin_model extends MY_Model
{
    public function finish_exam($user_kurs_data)
    {
        try {
            // $this->validate_user_kurs_data($user_kurs_data);
          $update_data = [
            'data_zdania_egzamin' => date('Y-m-d H:i:s'),
            'egzamin_wynik' => $user_kurs_data['wynik']

          ];
            $this->db
          ->where([
            'user_id_user' => $user_kurs_data['id_user'],
            'kurs_id_kurs' => $user_kurs_data['id_kurs'],
          ])
          ->update(USER_KURS_TABLE, $update_data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    private function validate_user_kurs_data($d)
    {
        // $kurs_exists = $this->db->get_where(KURS_TABLE, ['id_kurs' => $d['id_kurs']], 1);
      // if ($kurs_exists->result() == null) {
      //     throw new Exception('Nie ma takiego kursu! Skontaktuj się z administratorem.<br>');
      // }
      // $user_exists = $this->db->get_where(USER_TABLE, ['id_user' => $d['id_user']], 1);
      // if ($user_exists->result() == null) {
      //     throw new Exception('Nie ma takiego użytkownika! Skontaktuj się z administratorem.<br>');
      // }
      // $user_kurs_exists = $this->db->get_where(USER_KURS_TABLE, ['user_id_user' => $d['id_user'], 'kurs_id_kurs' => $d['id_kurs']], 1);
      // if ($user_kurs_exists->result() != null) {
      //     throw new Exception('Już ukończyłeś ten kurs! :)<br>');
      // }
    }
    public function getExamContent($exam_id)
    {
        $query = $this->db->get_where(PYTANIE_TABLE, ['kurs_id_kurs' => $exam_id]);
        if ($query->result() == null) {
            throw new Exception('Egzamin '.$exam_id.' nie ma pytań! Skontaktuj się z administratorem.');
        }
        $pytania = $query->result();
        foreach ($pytania as $key => $pytanie) {
            $id_pytanie = $pytanie->id_pytanie;
            $query = $this->db->get_where(ODPOWIEDZ_TABLE, ['pytanie_id_pytanie' => $id_pytanie]);
            if ($query->result() == null) {
                throw new Exception('Pytanie '.$id_pytanie.' nie ma odpowiedzi! Skontaktuj się z administratorem.');
            }
            $odpowiedzi = $query->result();
            foreach ($odpowiedzi as $odpowiedz) {
                $litera = $odpowiedz->litera;
                $pytanie->odpowiedzi[$litera] = $odpowiedz->tresc;
            }
        }

        return [
        'pytania' => $pytania,
        'id_egzamin' => $exam_id,
      ];
    }
}
