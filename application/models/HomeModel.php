<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model
{
	
	public function get_banner()
	{
		$q = $this->db->where('status','1')->order_by('id','desc')->get('e_banner');

		if ($q->num_rows()) {
			return $q->result();
		}else{
			return false;
		}
	}


	public function get_categ()
	{
		$q = $this->db->where('status','1')->order_by('id','desc')->get('ec_category');

		if ($q->num_rows()) {
			return $q->result();
		}else{
			return false;
		}
	}


	public function get_product()
	{
		$q = $this->db->where('status','1')->order_by('id','asc')->get('e_product');

		if ($q->num_rows()) {
			return $q->result();
		}else{
			return false;
		}
	}


	// public function category_name($cate_id){
		
	// 	$q = $this->db->where('cate_id',$cate_id)->get('ec_category');

	// 	if ($q->num_rows()) {
	// 		return $q->row()->cate_name;
	// 	}else{
	// 		return false;
	// 	}
	// }



	public function product_details($slug){
		
		$q = $this->db->where(['slug'=>$slug,'status'=>1])->get('e_product');
		if ($q->num_rows()) {
			return $q->row();
		}else{
			return false;
		}
	}


	public function category_name($cate_id){
		
		$q = $this->db->where(['cate_id'=>$cate_id,'status'=>1])->get('ec_category');
		if ($q->num_rows()) {
			return $q->row()->cate_name;
		}else{
			return false;
		}
	}
}

?>