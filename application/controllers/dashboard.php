<?php
 	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Dashboard extends MY_Controller
	{
		public function index()
		{

			$this->load->model('visitormodel','visitors');

			$query = $this->visitors->count_browser_status_chrome();
			$data['chrome']= $query->chrome;

			$query = $this->visitors->count_browser_status_mozila();
			$data['mozila']= $query->mozila;

			$query = $this->visitors->count_browser_status_edge();
			$data['edge']= $query->edge;

			$query = $this->visitors->count_browser_status_internet_explorer();
			$data['internet_explorer']= $query->internet_explorer;

			$query = $this->visitors->count_browser_status_apple_safari();
			$data['apple_safari']= $query->apple_safari;

			$query = $this->visitors->count_browser_status_safari();
			$data['safari']= $query->safari;

			$this->load->view('admin/dashboard',$data);
		}

		public function add_article()
		{
			$this->load->view('admin/add_article');
		}

		public function store_article()
		{
			$this->load->library('upload');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");

			if ( $this->form_validation->run('add_article_rules')) 
			{
				$new_photo ='';
				$photo = $_FILES['userfile']['name'];

				if ($photo != '') 
				{
					$photoExt1 = @end(explode('.', $photo));
					$phototest1 = strtolower($photoExt1);
					$new_photo = time().'.'.$phototest1;
					$photo_path	= './uploads/'.$new_photo;
					move_uploaded_file($_FILES['userfile']['tmp_name'], $photo_path);	
				}
					
				$data = array(
					'user_id' => $this->input->post('user_id'),
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'image_path' => $new_photo
				);
					
				return $this->_flashAndRedirect(
								$this->articles->add_article($data),
								"Article Added Successfully.",
								"Article Failed To Add, Please Try Again."
				);		
			}
			else 
			{
				$this->load->view('admin/add_article');
			}
		}

		public function edit_article($article_id)
		{
			$article = $this->articles->find_article($article_id);
			$this->load->view('admin/edit_article',['article'=>$article]);
		}

		public function update_article($article_id)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
			if ($this->form_validation->run('add_article_rules')) 
			{
				$post = $this->input->post();
				unset($post['submit']);

				return $this->_flashAndRedirect(
								$this->articles->update_article($article_id,$post),
								"Article Updated Successfully.",
								"Article Failed To Update, Please Try Again."
				);
			} else {
				$article = $this->articles->find_article($article_id);
				$this->load->view('admin/edit_article',['article'=>$article]);
			}		
		}

		public function delete_article()
		{                  
			$article_id = $this->input->post('article_id');

			return $this->_flashAndRedirect(
							$this->articles->delete_article($article_id),
							"Article Deleted Successfully.",
							"Article Failed To Delete, Please Try Again."
			);
		}

		public function view_articles()
		{
			$this->load->library('pagination');
			$config = [
						'base_url'			=> base_url('dashboard/view_articles'),
						'per_page'			=> 5,
						'total_rows'		=> $this->articles->num_rows(),
						'full_tag_open'		=> "<ul class='pagination'>",
						'full_tag_close'	=> "</ul>",
						'attributes'		=> ['class'=>'page-link'],
						'first_tag_open'	=> '<li>',
						'first_tag_close'	=> '</li>',
						'first_link'		=> 'First',
						'last_link'			=> 'Last',
						'last_tag_open'		=> '<li>',
						'last_tag_close'	=> '</li>',
						'next_tag_open'		=> '<li>',
						'next_tag_close'	=> '</li>',
						'prev_tag_open'		=> '<li>',
						'prev_tag_close'	=> '</li>',
						'num_tag_open'		=> '<li>',
						'num_tag_close'		=> '</li>',
						'cur_tag_open'		=> "<li class='page-link active'><a>",
						'cur_tag_close'		=> '</a></li>',
			];
			$this->pagination->initialize($config);

			$articles = $this->articles->articles_list( $config['per_page'], $this->uri->segment(3) );
			$this->load->helper('text');
			$this->load->view('admin/view_articles',['articles'=>$articles]);
		}

		public function search()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('query', 'Query', 'required');
			if ( ! $this->form_validation->run() ) 
				return $this->view_articles();
			$query = $this->input->post('query');
			return redirect("dashboard/search_results/$query");
		}

		public function search_results($query)
		{
			$this->load->library('pagination');
				$config = [
						'base_url'			=> base_url("dashboard/search_results/$query"),
						'per_page'			=> 5,
						'total_rows'		=> $this->articles->count_search_results($query),
						'full_tag_open'		=> "<ul class='pagination'>",
						'full_tag_close'	=> "</ul>",
						'attributes'		=> ['class'=>'page-link'],
						'first_tag_open'	=> '<li>',
						'uri_segment'		=>	4,
						'first_tag_close'	=> '</li>',
						'first_link'		=> 'First',
						'last_link'			=> 'Last',
						'last_tag_open'		=> '<li>',
						'last_tag_close'	=> '</li>',
						'next_tag_open'		=> '<li>',
						'next_tag_close'	=> '</li>',
						'prev_tag_open'		=> '<li>',
						'prev_tag_close'	=> '</li>',
						'num_tag_open'		=> '<li>',
						'num_tag_close'		=> '</li>',
						'cur_tag_open'		=> "<li class='page-link active'><a>",
						'cur_tag_close'		=> '</a></li>',
				];
				$this->pagination->initialize($config);

				$articles = $this->articles->search($query, $config['per_page'], $this->uri->segment(4));

				$this->load->helper('text');
				$this->load->view('admin/search_results',compact('articles'));
		}

		public function article($id)
		{
			$article = $this->articles->find( $id )  ;
			$this->load->view('admin/article_detail', compact('article'));
		}


		public function __construct()
		{
			parent::__construct();
			if ( ! $this->session->userdata('user_id') ) 
				return redirect('login');
			$this->load->model('articlesmodel','articles');
		}

		private function _flashAndRedirect( $successful, $successMessage, $failureMessage )
		{
			if ( $successful ) {
				$this->session->set_flashdata('feedback',$successMessage);
				$this->session->set_flashdata('feedback_class', 'alert-success');
			} else {
				$this->session->set_flashdata('feedback',$failureMessage);
				$this->session->set_flashdata('feedback_class','alert-danger');
			}
			return redirect('dashboard/view_articles');
		}
	}
?>