<?php

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if(!isset($this->session->login['username'])) {
            $this->session->sess_destroy();
            redirect('login');
        }
        
    }

    public function index() {
        echo '<h1> Welcome to Dashboard</h1>';
        echo '<p><a href="'.base_url('login/do_logout').'">logout</a></p>';
    }
   
}


