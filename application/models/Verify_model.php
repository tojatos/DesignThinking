<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Verify_model extends MY_Model
{
    public function getNotVerifiedEmails()
    {
        $query = $this->db->from('users')->where('verified', false)->get();
        $users = $query->result();
        if ($users != null) {
            $notVerifiedEmails = [];
            foreach ($users as $user) {
                $notVerifiedEmails[] = $user->email;
            }

            return $notVerifiedEmails;
        }

        return null;
    }
    public function getEmailToVerify($notVerifiedEmails, $code)
    {
        foreach ($notVerifiedEmails as $email) {
            if (sha1($email.HASH_KEY) == $code) {
                return $email;
            }
        }

        return null;
    }
    public function verify($email)
    {
        $this->db->where('email', $email)->update('users', ['verified' => true]);
    }
}
