<?php

defined('BASEPATH') or exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
    protected function showView($viewName, $data = null)
    {
        $this->load->view('inc/header');
        $this->load->view($viewName, $data);
        $this->load->view('inc/footer');
    }
    protected function showMainView($data = null)
    {
        $this->showView('MainViewTemplate', $data);
    }
    protected function loadContent($path, $data = null)
    {
        return $this->load->view($path, $data, true);
    }
    protected function loadMainNav()
    {
        return $this->load->view('inc/mainNav', '', true);
    }
    protected function showMessage($message, $data = null)
    {
        $data['mainNav'] = $this->loadMainNav();
        $data['message'] = $message;
        $this->showView('show_message', $data);
    }
}
