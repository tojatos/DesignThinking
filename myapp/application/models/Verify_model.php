<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Verify_model extends MY_Model
{
    public function get_not_verified_emails()
    {
        $query = $this->db->from(USER_TABLE)->where('verified', false)->get();
        $users = $query->result();
        if ($users != null) {
            $not_verified_emails = [];
            foreach ($users as $user) {
                $not_verified_emails[] = $user->email;
            }

            return $not_verified_emails;
        }

        return null;
    }
    public function get_email_to_verify($not_verified_emails, $code)
    {
        foreach ($not_verified_emails as $email) {
            if (sha1($email) == $code) {
                return $email;
            }
        }

        return null;
    }
    public function verify($email)
    {
        $this->db->where('email', $email)->update(USER_TABLE, ['verified' => true]);
    }
}
