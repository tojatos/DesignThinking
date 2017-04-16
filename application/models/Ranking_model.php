<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Ranking_model extends MY_Model
{
    public function create_ranking()
    {
        //SELECT user_has_kurs.exam_result, user.login, user.city FROM user_has_kurs JOIN user ON user_has_kurs.fk_user = user.id_user WHERE user_has_kurs.exam_result > 80
        $general_data = $this->gather_general_data();
        foreach($general_data as $name)
        {
            $exam_data[$name->name] = $this->gather_exam_data($name->name);
        }        
        $table = $this->generate_table($general_data,$exam_data);

        return $table;
    }
    private function gather_general_data()
    {
        $this->db->select('SUM(user_has_kurs.exam_result) AS exam_result_sum, user.login AS name, user.city AS place');
        $this->db->from('user_has_kurs');
        $this->db->join('user', 'user_has_kurs.fk_user = user.id_user');
        $this->db->where('user_has_kurs.exam_result > 80');
        $this->db->group_by('name');
        $query = $this->db->get();
        
        return $query->result();
    }
    private function gather_exam_data($name)
    {
        $this->db->select('user_has_kurs.exam_result AS exam_result');
        $this->db->from('user_has_kurs');
        $this->db->join('user', 'user_has_kurs.fk_user = user.id_user');
        $this->db->where('user.login', $name);
        $query = $this->db->get();
        return $query->result();
    }
    private function generate_table($general_data, $exam_data)
    {
        $template = "<table class='table table-hover'>
    <thead>
        <tr>
            <th>Miejsce</th>
            <th>Nick</th>
            <th>Punkty</th>
            <th>Egzamin</th>
        </tr>
    </thead>
    <tbody>
    ";

    foreach($general_data as $person)
    {
        $template .= "<tr>";
        $template .= "<td>";
        $template .= $person->place;
        $template .= "</td>";
        $template .= "<td>";
        $template .= $person->name;
        $template .= "</td>";
        $template .= "<td>";
        $template .= $person->exam_result_sum;
        $template .= "</td>";
        $template .= "<td>";
        foreach($exam_data[$person->name] as $exam_points)
        {
            $template .= "<span>";
            $template .= $exam_points->exam_result;
            $template .= "</span>";
        };
        $template .= "</td>";
        $template .= "</tr>";
    };

$template .= "</tbody> </table>";
return $template;
    }
}
