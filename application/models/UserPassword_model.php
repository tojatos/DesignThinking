<?php

defined('BASEPATH') or exit('No direct script access allowed');
class UserPassword_model extends MY_Model
{
  public function addPasswordChangeRequest($email, $code)
  {
    try {
        $isEmail = $this->db->get_where(PASS_CHANGE_REQUEST_TABLE, ['email' => $email], 1);
        if ($isEmail->result() != null) {
            throw new Exception('Na ten e-mail już wysłano prośbę o zmianę hasła.<br>');
        }
        $data = array(
          'email' => $email,
          'code' => $code
    );
        $this->db->insert(PASS_CHANGE_REQUEST_TABLE, $data);
    } catch (Exception $e) {
        return $e->getMessage();
    }
  }
  public function changePassword($code, $newPassword)
  {
    $email = $this->db->get_where(PASS_CHANGE_REQUEST_TABLE, ['code' => $code], 1)->result()[0]->email;
    $this->db->where('email', $email)->update(USER_TABLE, ['password' => password_hash($newPassword, PASSWORD_DEFAULT)]);
  }
  public function validateCode($code)
  {
    $isCode = $this->db->where('code', $code)->get(PASS_CHANGE_REQUEST_TABLE)->result();
    if($isCode==null){
      return false;
    } else {
      return true;
    }
  }
  public function removeRequest($code)
  {
    $this->db->where('code', $code)->delete(PASS_CHANGE_REQUEST_TABLE);
  }
}
