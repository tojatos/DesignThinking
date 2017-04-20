<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Egzamin_model extends MY_Model
{
    public function finish_exam($user_kurs_data)
    {
        try {
            $this->validate_user_kurs_data($user_kurs_data);
            $update_data = [
            'date_finish_exam' => date('Y-m-d H:i:s'),
            'exam_result' => $user_kurs_data['wynik'],

          ];
            $this->db
              ->where([
                'fk_user' => $user_kurs_data['id_user'],
                'fk_kurs' => $user_kurs_data['id_kurs'],
              ])
              ->update(USER_KURS_TABLE, $update_data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    private function validate_user_kurs_data($d)
    {
        $kurs_exists = $this->db->get_where(KURS_TABLE, ['id_kurs' => $d['id_kurs']], 1);
        if ($kurs_exists->result() == null) {
            throw new Exception('Nie ma takiego egzaminu! Skontaktuj się z administratorem.<br>');
        }
        $user_exists = $this->db->get_where(USER_TABLE, ['id_user' => $d['id_user']], 1);
        if ($user_exists->result() == null) {
            throw new Exception('Nie ma takiego użytkownika! Skontaktuj się z administratorem.<br>');
        }
        $exam_result = $this->get_exam_result($d);
        if ($exam_result != null) {
            throw new Exception('Już ukończyłeś ten egzamin!');
        }


    }
    public function get_exam_result($d)
    {
      $query = $this->db
        ->select('exam_result')
        ->from(USER_KURS_TABLE)
        ->where([
          'fk_user' => $d['id_user'],
          'fk_kurs' => $d['id_kurs'],
        ])
        ->get();
        if($query->result() == null)
        {
          return null;
        }
        else {
          $exam_result = $query->result()[0]->exam_result;
        }
        return $exam_result;
    }
    public function get_kurs_finish_state($d)
    {
      $query = $this->db
        ->select('exam_result')
        ->from(USER_KURS_TABLE)
        ->where([
          'fk_user' => $d['id_user'],
          'fk_kurs' => $d['id_kurs'],
        ])
        ->get();
        if($query->result() == null)
        {
          return false;
        }
        else {
          return true;
        }
    }
    public function get_exam_content($exam_id)
    {
        $query = $this->db->get_where(QUESTION_TABLE, ['fk_kurs' => $exam_id]);
        if ($query->result() == null) {
            throw new Exception('Egzamin '.$exam_id.' nie ma pytań! Skontaktuj się z administratorem.');
        }
        $questions = $query->result();
        foreach ($questions as $key => $question) {
            $id_question = $question->id_question;
            $query = $this->db->get_where(ANSWER_TABLE, ['fk_question' => $id_question]);
            if ($query->result() == null) {
                throw new Exception('Pytanie '.$id_question.' nie ma odpowiedzi! Skontaktuj się z administratorem.');
            }
            $answers = $query->result();
            foreach ($answers as $answer) {
                $letter = $answer->letter;
                $question->answers[$letter] = $answer->content;
            }
        }

        return [
        'questions' => $questions,
        'exam_id' => $exam_id,
      ];
    }
    public function verify_exams($user_id)
    {
        $query = $this->db->get_where(USER_KURS_TABLE, ['fk_user' => $user_id]);
        $exams = $query->result();
        if (count($exams) < 5) {
            throw new Exception('Musisz ukończyć wszystkie egzaminy!');
        }
        foreach ($exams as $exam) {
          if ($exam->exam_result < TRESHOLD) {
              throw new Exception('Musisz zdać wszystkie egzaminy!');
          }
        }
    }
    public function get_recent_exam_finish_date($user_id)
    {
      $query = $this->db->get_where(USER_KURS_TABLE, ['fk_user' => $user_id]);
      $user_kurs_data = $query->result();
      $dates = [];
      foreach ($user_kurs_data as $user_kurs_datum) {
        array_push($dates, $user_kurs_datum->date_finish_exam);
      }
      $max_seconds = 0;
      foreach ($dates as $date) {
          $cur_date = strtotime($date);
          if ($cur_date > $max_seconds) {
              $max_seconds = $cur_date;
          }
      }
      $recent_date = date('d/m/Y', $max_seconds);
      return $recent_date;
    }
}
