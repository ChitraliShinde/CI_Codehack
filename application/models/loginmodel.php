<?php 	
	class Loginmodel extends CI_model
	{
		public function login_valid($username,$password)
		{
			$password = md5($password);
			$q = $this->db->where(['user_name'=>$username, 'password'=>$password])
							->get('users');

			if ($q->num_rows() ) {
				return $q->row();
				//return TRUE;
			} else {
				return FALSE;
			}
		}
		public function admin_registration($post)
		{
			$this->db->insert('users',$post);
		}
	}
?>