<?php
	class Login extends MY_Controller
	{
		public function index()
		{
			if ( $this->session->userdata('user_id') )
				return redirect('dashboard');
			$this->load->view('admin/admin_login');
		}
		
		public function admin_login()
		{
			$this->load->library('form_validation');

			$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");

			if ($this->form_validation->run('admin_login')) {	//if validation passes
				//success
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$this->load->model('loginmodel');

				$login_id = $this->loginmodel->login_valid($username,$password);

				if ( $login_id ) {
					//Credentials valid, login user.
					//$this->session->set_userdata('user_id', $login_id);
					$data = array();
						$data['user_id'] = $login_id->id;
						$data['user_name'] = $login_id->user_name;
						$data['user_img'] = $login_id->image_path;


					$this->session->set_userdata($data);
					return redirect('dashboard');
				}else{
					//authentication failed.
					$this->session->set_flashdata('login_failed','Invalid Username/Password...');
					return redirect('login');
				}
			}
			else{
				//Failed
				$this->load->view('admin/admin_login');
			}
		}

		public function logout()
		{
			$this->session->unset_userdata('user_id');
			return redirect('login');
		}

		public function admin_registration()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");

			if ($this->form_validation->run('admin_registration')) {	//if validation passes
				$data = $this->input->post();
				if ($data) {
					$username = $data['username'];
					$email = $data['email'];
					$password = $data['password'];
					$confirm_password = $data['confirm_password'];

					$datas = array(
							'user_name' => $username,
							'email' => $email,
							'password' => md5($password),
							'confirm_password' => md5($confirm_password)
					);
					$this->load->model('loginmodel');
					$this->loginmodel->admin_registration($datas);
					redirect('login');
				}
				else{
					redirect('login/admin_registration');
				}
			}
			else{
				$this->load->view('admin/admin_registration');
			}
		}
	}
?>