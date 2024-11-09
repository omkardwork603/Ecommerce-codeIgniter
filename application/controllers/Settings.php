<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('SettingsModel');
	}

	public function pincode(){
		$this->form_validation->set_rules('pincode','Pincode','required|trim');
		$this->form_validation->set_rules('delivery_charge','delivery charge','required|trim');
		$this->form_validation->set_rules('status','status','required|trim');
		if ($this->form_validation->run()) {
			$post = $this->input->post();
			$check  = $this->SettingsModel->add_pincode($post);
			// $this->categoryModel->add_category($post);
			if ($check) {
				# code...
				$this->session->set_flashdata('succMsg','Data Inserted Successfully');
				redirect('settings/pincode');
			}
		}else{
			// $data['categories'] = $this->categoryModel->all_category();
		$this->load->view('pincode');
		}
	}

	public function banner(){

		if (empty($_FILES['bann_image']['name'])){
			$this->form_validation->set_rules('bann_image','banner image','required|trim');
		}
		// $this->form_validation->set_rules('bann_image','banner image','required|trim');
		$this->form_validation->set_rules('status','Status','required|trim');
		if ($this->form_validation->run()){
			$post = $this->input->post();
			$config = array(
			'upload_path' => './upload',
			'allowed_types' => "gif|jpg|png|jpeg",
			);
			$this->load->library('upload',$config);
			$this->upload->do_upload('bann_image');
			$image = $this->upload->data();
			$post['bann_image'] = $image['file_name'];

			$check = $this->SettingsModel->add_banner($post);
			if ($check){
				$this->session->set_flashdata('succMsg','Data inserted Successfully');
				redirect('Settings/banner');
				# code...
			}
		}else{
		$this->load->view('banner');
			# code...
		}
		}
		
	}


?>
