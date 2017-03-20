<?php

defined('BASEPATH') or exit('No direct script access allowed');
if (!function_exists('dump')) {
    function dump($var)
    {
        echo '<pre><code>';
        var_dump($var);
        echo '</code></pre>';
    }
}
if (!function_exists('dump_p')) {
    function dump_p($var)
    {
        echo '<pre><code>';
        var_dump(htmlentities($var));
        echo '</code></pre>';
    }
}
if (!function_exists('validateForm')) {
    //example array -  'login' => [$login, 50],
    function validateForm($arr)
    {
        $msg = '';
        foreach ($arr as $name => $info) {
            $var = $info[0];
            $max_num = $info[1];
            if ($var == null) {
                $msg .= 'Pole "'.$name.'" jest puste!<br>';
            }
            if (strlen($var) > $max_num) {
                $msg .= 'Pole "'.$name.'" jest zbyt długie!<br>';
            }
            if (strpos($var, '"') !== false || strpos($var, "'") !== false) {
                $msg .= 'Pole "'.$name.'" zawiera apostrofy lub cudzysłowia!<br>';
            }
        }
        if ($msg != '') {
            throw new Exception($msg);
        }

    }
}
