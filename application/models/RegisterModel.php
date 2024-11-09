<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterModel extends CI_Model {

	public function register($post){


		$data['user_id'] = mt_rand(11111, 99999);
		$data['username'] = $post['name'];
		$data['email'] = $post['email'];
		$data['password'] = password_hash($post['password'],PASSWORD_BCRYPT);
		$data['status'] = 1;
		$data['added_on'] = date('Y-m-d');

		$this->db->insert('e_users',$data);
	}

}


?>