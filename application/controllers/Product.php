<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('CategoryModel');
		$this->load->model('productModel');
	}

	public function index(){
		$this->form_validation->set_rules('pro_id','Product ID','required|trim');
		$this->form_validation->set_rules('category','category','required|trim');
		$this->form_validation->set_rules('pro_name','product name','required|trim');
		$this->form_validation->set_rules('brand','brand','required|trim');
		$this->form_validation->set_rules('featured','featured','required|trim');
		$this->form_validation->set_rules('highlights','highlights','required|trim');
		$this->form_validation->set_rules('desc','desc','required|trim');
		$this->form_validation->set_rules('stock','stock','required|trim');
		$this->form_validation->set_rules('mrp','mrp','required|trim');
		$this->form_validation->set_rules('selling_price','selling_price','required|trim');
		$this->form_validation->set_rules('status','status','required|trim');



		if (empty($_FILES['pro_main_image']['name'])) {
			$this->form_validation->set_rules('pro_main_image','product image','required|trim');
			// code...
		}

		if ($this->form_validation->run()) {

			$post = $this->input->post();
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = '*';

			$this->load->library('upload',$config);
			$this->upload->do_upload('pro_main_image');
			$data=$this->upload->data();
			$post['pro_main_image']=$data['raw_name'].$data['file_ext'];
			$check = $this->productModel->add_product($post);
			if($check){
				$this->session->set_flashdata('SuccMsg','Product added Successfully');
				redirect('product');
				# code...
			}else{
				$this->session->set_flashdata('errMsg','Product added Successfully');
				redirect('product');

			}

	}else{

		if ($this->session->userdata('pro_id')!='') {
		    $pro_id = $this->session->userdata('pro_id');
		    # code...
		}else{
			$this->session->set_userdata('pro_id',mt_rand(11111,99999));
		}
		$data['categories'] = $this->CategoryModel->all_category();
		$data['pro_id'] = $pro_id;
		$this->load->view('product',$data);

	}
	}
}

?>
