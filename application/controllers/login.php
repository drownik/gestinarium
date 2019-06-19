<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
            $this->load->model('gestinarium_model');
            $this->load->helper('url_helper');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->library('session');
    }


    public function index() {
		$this->form_validation->set_rules('username', 'Username');
		$this->form_validation->set_rules('password', 'Password', 'callback_validate');
		
		if($this->form_validation->run()) {
			$this->session->set_userdata('is_logged', true);
			redirect($this->session->userdata('route'));
		} else {
	    	$this->load->view('gestinarium/header');
	    	$this->load->view('gestinarium/login');
	    	$this->load->view('gestinarium/footer');
		}
    }

    public function validate() {

		$data=$this->input->post();
		unset($data['mysubmit']);

		$login = $this->gestinarium_model->validate_login($data['username'],$data['password']);

		if(!$login) {
			$this->form_validation->set_message('rule', 'Error Message');
			$this->form_validation->set_message('validate','Usuario o contraseña incorrectos');
            return false;
		} else {
			$this->session->set_userdata('user_data', $login);
			return true;
		}
    }

    public function logout() {
    	session_destroy();
    	redirect(base_url());
    }
}