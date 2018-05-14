<?php

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_model', 'mdlAdmin');
    }


    public function index() {
        $this->load->view('login');
    }


    public function auth() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $password = md5($password);
        $rules = [
            [
                "field" => "username",
                "label" => "Username",
                "rules" => "trim|required",
                "errors" => [
                    "required" => "username tidak boleh kosong",
                ]
            ]
        ];
        
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() === False) {
            $this->index();
        } else {
            $result = $this->mdlAdmin->auth($username, $password);
            $admin = $result->row();
            
            if(isset($admin->id) && $admin->username === $username) {
                $this->session->set_userdata('login', ['username' => $admin->username]);
                $this->session->set_userdata('name', $admin->name);    
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message', 'Username / password tidak valid');
                redirect('login');
            }
        }
    }

    public function do_logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}


