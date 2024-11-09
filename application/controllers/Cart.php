<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('CartModel');		
	}

	public function index(){
		$data['cart'] = $this->CartModel->get_cart();
		$data['total'] = $this->CartModel->get_total();
		$this->load->view('front/cart',$data);

	}


	public function add_to_cart(){
		$post = $this->input->post();
		// print_r($post);
		$check = $this->CartModel->add_to_cart($post);
		if($check){
			$this->session->set_flashdata('successMsg','Product removed successfull');
			redirect($cart);
			# code...
		}else{
			$this->session->set_flashdata('errMsg','Product already added to cart');
			redirect($cart);
		}
	}

	public function cart_update(){
		$post = $this->input->post();
		print_r($post);
		$check = $this->CartModel->cart_update($post);
		if($check){
			$this->session->set_flashdata('successMsg','Product removed successfull');
			redirect($cart);
			# code...
		}else{
			$this->session->set_flashdata('errMsg','Cart not updated');
			redirect($cart);
		}
	}
 
	public function delete_product($pro_id){
		$check = $this->CartModel->delete_product($pro_id);
		if ($check){
			$this->session->set_flashdata('successMsg','Product removed successfull');
			redirect($cart);
			# code...
		}

 }
}

	?>