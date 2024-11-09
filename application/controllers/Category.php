<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('CategoryModel');
	}

	public function index(){
		$this->form_validation->set_rules('cate_name','category name','required|trim');
		$this->form_validation->set_rules('status','status','required|trim');
		if ($this->form_validation->run()) {
			$post = $this->input->post();
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = '*';

			$this->load->library('upload',$config);
			$this->upload->do_upload('image');
			$data=$this->upload->data();
			$post['image']=$data['raw_name'].$data['file_ext'];

			// print_r($post['image']);
			// die;

			$check  = $this->CategoryModel->add_category($post);
			// $this->categoryModel->add_category($post);
			if ($check) {
				# code...
				$this->session->set_flashdata('succMsg','Data Inserted Successfully');
				redirect('category');
			}
		}else{
			$data['categories'] = $this->CategoryModel->all_category();
		$this->load->view('Category',$data);
		}
	}

	public function get_sub_cate(){
		$cate_id = $this->input->post('cate_id');
		print_r($this->categoryModel->get_sub_cate($cate_id));
	}
}

?>
