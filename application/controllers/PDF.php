<?php

defined('BASEPATH') or exit('No direct script access allowed');
class PDF extends MY_Controller
{
    public function generate_PDF()
    {
        try {
            $this->load->model('PDF_model');

            if (!$this->session->is_logged) {
                throw new Exception('Aby mieć dostęp do dokumentów użytkowników musisz się <a href="'.site_url('Login').'">zalogować</a>!');
            }
            $personal_data = $this->PDF_model->create_cheat_sheet($this->session->user_name);
            echo $personal_data;
        } catch (Exception $e) {
            echo "[ERROR]".$e->getMessage();
        }
    }
}
