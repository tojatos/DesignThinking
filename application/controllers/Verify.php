<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Verify extends MY_Controller
{
    public function index($code)
    {
        try {
            $this->load->model('Verify_model');
            $not_verified_emails = $this->Verify_model->get_not_verified_emails();
            if ($not_verified_emails == null) {
                throw new Exception('Wszyscy użytkownicy są już zweryfikowani!');
            }
            $email = $this->Verify_model->get_email_to_verify($not_verified_emails, $code);
            if ($email == null) {
                throw new Exception('Twój kod weryfikacyjny jest nieprawidłowy!');
            }
            $try = $this->Verify_model->verify($email);
            $this->showMessage('Pomyślnie zweryfikowano, możesz się już zalogować.');
        } catch (Exception $e) {
            $this->showMessage($e->getMessage());
        }
    }
}
