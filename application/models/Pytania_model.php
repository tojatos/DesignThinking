<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Pytania_model extends MY_Model
{
  public function get_id_pytan($exam_id)
  {
    $pytania = $this->db->get_where(PYTANIE_TABLE, ['kurs_id_kurs'=>$exam_id])->result();
    $id_pytan = [];
    foreach ($pytania as $pytanie) {
      array_push($id_pytan, $pytanie->id_pytanie);
    }
    return $id_pytan;
  }
  public function get_prawidlowa_odpowiedz($id_pytanie)
  {
     return $this->db->get_where(PYTANIE_TABLE, ['id_pytanie'=>$id_pytanie], 1)->result()[0]->prawidlowa_odpowiedz;
  }
}
