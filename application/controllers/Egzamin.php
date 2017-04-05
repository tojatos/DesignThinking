<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Egzamin extends MY_Controller
{
    public function index($id_egzamin = 0)
    {
        try {
            if (!$this->session->isLogged) {
                throw new Exception('Aby mieć dostęp do egzaminu musisz się <a href="'.site_url("Login").'">zalogować</a>!');
            }

            $view['mainNav'] = $this->loadMainNav();
            if ($id_egzamin == 0) {
                $view['content'] = $this->loadContent('Egzamin/index');
            } else {
                $view['content'] = $this->loadContent('Egzamin/egzamin'.$id_egzamin);
            }
            $this->showMainView($view);
        } catch (Exception $e) {
          $this->showMessage($e->getMessage());
        }
    }
}
