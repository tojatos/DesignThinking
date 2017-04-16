<?php

defined('BASEPATH') or exit('No direct script access allowed');
class PDF_model extends MY_Model
{
    public function create_cheat_sheet($user_name)
    {
        try
        {
            $user_id = $this->get_id($user_name);
            $this->verify_exams($user_id);
            $personal_data = $this->gather_data($user_id, $user_name);
            return json_encode($personal_data);
        }
        catch (Exception $e) 
        {
            return $e->getMessage();
        }
    }
    private function verify_exams($id)
    {
        $query = $this->db->get_where(USER_KURS_TABLE, ['fk_user' => $id]);
        $exams = $query->result();
        if(count($exams) != 4)
        {
            throw new Exception('Musisz ukończyć wszystkie egzaminy!');
        };
        for($i = 0; $i < 4; $i++)
        {
            $exam = $exams[$i];
            if($exam->exam_result < 80)
            {
                throw new Exception('Musisz zdać wszystkie egzaminy!');
            }
        }
    }
    private function gather_data($id, $name)
    {
        $date_query = $this->db->get_where(USER_KURS_TABLE, ['fk_user' => $id]);
        $dates = $date_query->result();
        $recent_date = 0;
        foreach($dates as $date){
        $cur_date = strtotime($date->date_finish_exam);
        if ($cur_date > $recent_date) {
            $recent_date = $cur_date;
        }
        }
        $recent_date = date("d/m/Y",$recent_date);
        $data = ['date' => $recent_date, 'name' => $name];
        return $data;
    }
    private function get_id($name)
    {
        $query = $this->db->get_where(USER_TABLE, ['login' => $name], 1);
        $user = $query->result();
        return $user[0]->id_user;
    }
}
