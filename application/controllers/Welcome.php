<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Profile_model');
	}

	public function index()
	{
		$model = $this->Profile_model;
		$data = [
			'controller_title' => $model->model_title,
			'ctrl_biodata' => $model->biodata,
		];

		$this->load->view('welcome_message');
	}

}


