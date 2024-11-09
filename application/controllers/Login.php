<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

		public function __construct(){
		parent::__construct();
		$this->load->model('loginModel');			
		}


	public function index(){

		$this->form_validation->set_rules('email','email','required|trim|valid_email');
		$this->form_validation->set_rules('password','password','required|trim|min_length[6]');
		if ($this->form_validation->run()) {
			$post = $this->input->post();
			$check = $this->loginModel->auth($post);
			if($check){
				echo "Yes";
			}else{
                $this->session->set_flashdata('errMsg','wrong creditental');
				redirect('login');
			}
		}else{
			$this->load->view('front/login');
		}
	}
}
?>