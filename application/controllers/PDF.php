<?php

defined('BASEPATH') or exit('No direct script access allowed');
class PDF extends MY_Controller
{
    public function ajax_get_PDF_data()
    {
        try {
            if (!$this->session->is_logged) {
                throw new Exception('Aby mieć dostęp do dokumentów użytkowników musisz się <a href="'.site_url('Login').'">zalogować</a>!');
            }
            $user_name = $this->session->user_name;

            $this->load->model('User_model');
            $this->load->model('Egzamin_model');
            $this->load->model('PDF_model');

            $user_id = $this->User_model->get_user_id($user_name);
            $this->Egzamin_model->verify_exams($user_id);
            $recent_exam_date = $this->Egzamin_model->get_recent_exam_finish_date($user_id);
            $image1 = $this->PDF_model->get_image1();
            $image2 = $this->PDF_model->get_image2();
            $PDF_data = [
              'recent_exam_date' => $recent_exam_date,
              'user_name' => $user_name,
              'image1' => $image1,
              'image2' => $image2,
            ];
            echo json_encode($PDF_data);
        } catch (Exception $e) {
            echo '[ERROR]'.$e->getMessage();
        }
    }
}
