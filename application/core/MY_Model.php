<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MY_Model extends CI_Model
{

    protected function getNextID($table)
    {

        $maxid = 0;
        $row = $this->db->query('SELECT MAX(id_'.$table.') AS maxid FROM '.$table)->row();
        if ($row) {
            $maxid = $row->maxid;
        }

        return $maxid + 1;
    }
}
