<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

		public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('user_id')){
		
		}else{
		$this->session->set_userdata('user_id',mt_rand(11111,99999));
		}
		$this->load->model('homeModel');
	}

	public function index(){
		$data['banner']=$this->homeModel->get_banner();
		$data['categ']=$this->homeModel->get_categ();
		$data['products']=$this->homeModel->get_product();

		$this->load->view('front/index',$data);
	}

	public function product_details($slug){
		$data['arr'] = $this->homeModel->product_details($slug);
		$this->load->view('front/product-details',$data);
		// echo "<pre>";
		// print_r($data['arr']);
	}
}

?>	