<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CartModel extends CI_Model {

public function get_userid(){
	return $this->session->userdata('user_id');
}

public function get_cart(){
	$q = $this->db->where(['user_id'=>$this->get_userid()])->get('ec_cart');
	if ($q->num_rows()){
		return $q->result(); 
		# code...
	}else{
		return false;
	}

}

	public function add_to_cart($post){
$exist = $this->db->where(['pro_id'=>$post['pro_id'],'user_id'=>$this->get_userid()])->get('ec_cart');

if ($exist->num_rows()){

}else{
		$q = $this->db->select('pro_name,selling_price,slug,pro_main_image')->where('pro_id',$post['pro_id'])->get('e_product');

		if ($q->num_rows()){
			$prod = $q->row();
			$data['cart_id'] = mt_rand(11111,99999);
			$data['user_id'] = $this->get_userid();
			$data['pro_id'] =$post['pro_id'];
			$data['pro_qty'] =$post['pro_qty'];
			$data['pro_name'] =$prod->pro_name;
			$data['pro_price'] =$prod->selling_price;
			$data['slug'] =$prod->slug;
			$data['pro_image'] =$prod->pro_main_image;
			$date['added_on'] = date('Y-m-d');
			
			$this->db->insert('ec_cart',$data);
			return true;
			# code...
		}else{

			return false;
		}
}

}

public function cart_update($post){
	$count = count($post);
	for($i=0;$i<$count;$i++){
		$q=$this->db->where(['pro_id'=>$post['up_pro_id'][$i],'user_id'=>$this->get_userid()])->update('ec_cart',['pro_qty'=>$post['up_qty'][$i]]);
	}
	return true;
}

public function delete_product($pro_id){
	$q = $this->db->where(['pro_id'=>$pro_id,'user_id'=>$this->get_userid()])->delete('ec_cart');

	if($q) {
		return true;
		# code...
	}
}


public function get_total(){
	$q = $this->db->select('sum(pro_price) as total_price')->where(['user_id'=>$this->get_userid()])->get('ec_cart');
	if ($q->num_rows()){
		# code...
		$total = $q->row()->total_price;
		if ($total > 499) {
			return array('subtotal' => $total, 'grandtotal' => $total,'delievery' => 0);
			# code...
		}else{

			return array('subtotal'=>$total,'grandtotal' => $total + 40, 'delievery' => 40);
		}
		}else{
			return false;
		}
	}

}


	// public function index(){

	// }


	// public function add_to_cart(){
	// 	$post = $this->input->post();
	// 	// print_r($post);
	// 	$this->CartModel->add_to_cart($post);
	// }

?>