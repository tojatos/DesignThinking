<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Questions_model extends MY_Model
{
  public function get_question_ids($exam_id)
  {
    $questions = $this->db->get_where(QUESTION_TABLE, ['fk_kurs'=>$exam_id])->result();
    $id_pytan = [];
    foreach ($questions as $question) {
      array_push($id_pytan, $question->id_question);
    }
    return $id_pytan;
  }
  public function get_correct_answer_letter($id_question)
  {
     return $this->db->get_where(QUESTION_TABLE, ['id_question'=>$id_question], 1)->result()[0]->correct_answer_letter;
  }
}
