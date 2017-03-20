<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Main extends MY_Controller
{
    public function index()
    {
        $data['title'] = 'Design Thinking';
        $data['mainNav'] = $this->loadMainNav();
        $data['content'] = $this->loadContent('main');
        $this->showMainView($data);
    }
    public function error404()
    {
        $this->showView('404');
    }

}
