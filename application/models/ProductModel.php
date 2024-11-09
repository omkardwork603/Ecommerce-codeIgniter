<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model {



	public function add_product($post) {


		$post['added_on'] = date('d M, Y');
		$post['slug'] = $this->slug($post['pro_name']);
		$q = $this->db->insert('e_product',$post);
		if ($q) {
			$this->session->unset_userdata('pro_id');
			return true;
		}else{
			return false;
		}
	}

	function slug($string){
		$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/','-', $string))); 
		return $slug;
			 // $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);

	}

	
}	

?>
