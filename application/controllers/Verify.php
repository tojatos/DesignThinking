<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Verify extends MY_Controller
{
    public function index($code)
    {
        try {
            $this->load->model('Verify_model');
            $notVerifiedEmails = $this->Verify_model->getNotVerifiedEmails();
            if ($notVerifiedEmails == null) {
                throw new Exception('Wszyscy użytkownicy są już zweryfikowani!');
            }
            $email = $this->Verify_model->getEmailToVerify($notVerifiedEmails, $code);
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
