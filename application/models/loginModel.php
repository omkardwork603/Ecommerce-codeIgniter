<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginModel extends CI_Model {

	public function auth($post)
	{
		$email = $post['email'];
		$pass = $post['password'];
		$q = $this->db->where(['email'=>$email, 'status'=>1])->get('e_users');
		if ($q->num_rows()){
			// $arr = $q->row();
			// $db_pass = $arr->password;
			// if(password_verify($pass,$db_pass)){
			// return true;	
			// }else{ 
			// return false;
			// }
			return true;
		}else{
			return false;
		}
	}

}


?>