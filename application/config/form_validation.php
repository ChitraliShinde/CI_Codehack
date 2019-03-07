<?php 
	
	$config = [

		'add_article_rules' => [
										[
											'field' => 'title',
											'label' => 'Article Title',
											'rules' => 'required'
										],
										[
											'field' => 'description',
											'label' => 'Article Description',
											'rules' => 'required'
										]
								],
		'admin_login' => [
										[
											'field' => 'username',
											'label' => 'Username',
											'rules' => 'required|alpha|trim'
										],
										[
											'field' => 'password',
											'label' => 'Password',
											'rules' => 'required'
										]

						],
		'admin_registration' => [
										[
											'field' => 'username',
											'label' => 'Username',
											'rules' => 'required|alpha|trim'
										],
										[
											'field' => 'email',
											'label' => 'Email Address',
											'rules' => 'required|valid_email|trim'
										],
										[
											'field' => 'password',
											'label' => 'Password',
											'rules' => 'required|min_length[5]|max_length[15]'
										],
										[
											'field' => 'confirm_password',
											'label' => 'Confirm Password',
											'rules' => 'required|matches[password]'
										]
						],
		'contact_message' => [
										[
											'field' => 'uname',
											'label' => 'Name',
											'rules' => 'required|alpha'
										],
										[
											'field' => 'email',
											'label' => 'Email Address',
											'rules' => 'required|valid_email|trim'
										],
										[
											'field' => 'contactno',
											'label' => 'Contact No',
											'rules' => 'required|numeric|exact_length[10]'
										],
										[
											'field' => 'message',
											'label' => 'Message',
											'rules' => 'required'
										]
							]
	];
?>