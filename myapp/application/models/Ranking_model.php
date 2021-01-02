<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Ranking_model extends MY_Model
{
    public function create_ranking()
    {
        //SELECT user_has_kurs.exam_result, user.login, user.city FROM user_has_kurs JOIN user ON user_has_kurs.fk_user = user.id_user WHERE user_has_kurs.exam_result > 80
        $general_data = $this->gather_general_data();
        foreach ($general_data as $name) {
            $exam_data[$name->name] = $this->gather_exam_data($name->name);
        }
        $this->sort_by_exam_points($general_data);
        $data = [
          'general_data' => $general_data,
          'exam_data' => $exam_data,
        ];

        return $data;
    }
    private function sort_by_exam_points(&$general_data)
    {
      usort($general_data, function($a, $b) { return $b->exam_result_sum - $a->exam_result_sum; });
    }
    private function gather_general_data()
    {
        $this->db->select('SUM('.USER_KURS_TABLE.'.exam_result) AS exam_result_sum');
        $this->db->select(USER_TABLE.'.login AS name');
        $this->db->select(USER_TABLE.'.city AS place');
        $this->db->from(USER_KURS_TABLE);
        $this->db->join(USER_TABLE, USER_KURS_TABLE.'.fk_user = user.id_user');
        //$this->db->where(USER_TABLE.'_has_kurs.exam_result > 80');
        $this->db->group_by('name');
        $this->db->group_by('city');
        $query = $this->db->get();

        return $query->result();
    }
    private function gather_exam_data($name)
    {
        $this->db->select(USER_KURS_TABLE.'.exam_result AS exam_result');
        $this->db->from(USER_KURS_TABLE);
        $this->db->join(USER_TABLE.'', USER_KURS_TABLE.'.fk_user = user.id_user');
        $this->db->where(USER_TABLE.'.login', $name);
        $query = $this->db->get();

        return $query->result();
    }
}
