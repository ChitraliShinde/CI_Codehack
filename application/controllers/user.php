<?php 

	class User extends MY_Controller
	{
		public function index()
		{
			$this->load->helper('text');
			$this->load->model('articlesmodel','articles');

			$this->load->library('pagination');
			$config = [
						'base_url'			=> base_url('user/index'),
						'per_page'			=> 4,
						'total_rows'		=> $this->articles->count_all_articles(),
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

			//$articles = $this->articles->all_articles_list($config['per_page'], $this->uri->segment(3));
			
			$data['articles'] = $this->articles->all_articles_list($config['per_page'], $this->uri->segment(3));	
           
            $data['popular_articles'] = $this->articles->popular_articles_list($config['per_page'], $this->uri->segment(3));

			$this->load->view('public/home',$data);
		}
		
		public function about()
		{
			$this->load->model('aboutmodel','about');
			$about = $this->about->aboutus();
			$this->load->view('public/about', compact('about'));
		}		

		public function trendingnow()
		{
			$this->load->helper('text');
			$this->load->model('articlesmodel','articles');

			$this->load->library('pagination');
			$config = [
						'base_url'			=> base_url('user/trendingnow'),
						'per_page'			=> 4,
						'total_rows'		=> $this->articles->count_all_articles(),
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

			$articles = $this->articles->popular_articles_list($config['per_page'], $this->uri->segment(3));			
			$this->load->view('public/trendingnow',compact('articles'));
		}

		public function contact()
		{
			$this->load->view('public/contact');
		}
		
		public function send_message()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");

			if ($this->form_validation->run('contact_message')) {	//if validation passes
				$post = $this->input->post();
				unset($post['send']);


				$this->load->library('email');
				//SMTP mail configuration
				$config = array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => '465',   //465 or 587
					'smtp_Auth' => 'true',
					'smtp_user' => 'chitralishinde03@gmail.com',
					'smtp_pass' => 'shinde#chitrali03'
				);

				//$this->load->library('email', $config);
				$this->email->initialize($config);

				$this->email->set_newline("\r\n");
				$this->email->from(set_value('email'), set_value('uname'));
				$this->email->to('chitralishinde1234@gmail.com');
				$this->email->subject('This is Email Test');
				$this->email->message(set_value('message'));
				
				//$this->load->library('encrypt');

				if ($this->email->send()) {

					return $this->_flashAndRedirect(
								$this->contact(),
								"",
								"Thank You!!!"
					);
					
				} else {
					show_error($this->email->print_debugger());
				}

				$this->load->view('public/contact',$post);
			}
			else{
				$this->load->view('public/contact');
			}
		}

		/* this function to handle getting news details and its comments based on news id  */
    	public function show_one($id)
    	{
        	// get a post news based on news id
        	$data['article'] = $this->articles->find($id);
        	// get unique visitor
        	$this->add_count($id);
        	// get a post COMMENTS based on news id and send it to view
        	$data['comments'] = $this->show_tree($id);

        	$query = $this->commentmodel->count_comments($id);
        	$data['count_comments'] = $query->total_comments;

        	$this->load->view('public/articles_detail', $data);
    	}
    	// this function to handle add comments form on the news
    	function add_comment($id)
    	{
        	// get a post id based on news id
        	$data['article'] = $this->articles->find($id);

        	//set validation rules
        	$this->form_validation->set_rules('comment_name', 'Name', 'required|trim|htmlspecialchars');
        	$this->form_validation->set_rules('comment_email', 'Email', 'required|valid_email|trim|htmlspecialchars');
        	$this->form_validation->set_rules('comment_body', 'comment_body', 'required|trim|htmlspecialchars');
        	if ($this->form_validation->run() == FALSE) {
            	// if not valid load comments
            	$this->session->set_flashdata('error_msg', validation_errors());
            	redirect("user/show_one/$id");
        	} else {
            	//if valid send comment to admin to take approve
            	$this->commentmodel->add_new_comment();
            	$this->session->set_flashdata('error_msg', 'Your comment is awaiting moderation.');
            	redirect("user/show_one/$id");
        	}
    	}

    	public function show_tree($id)
    	{
        	// create array to store all comments ids
        	$store_all_id = array();
        	// get all parent comments ids by using news id
        	$id_result = $this->commentmodel->tree_all($id);
        	// loop through all comments to save parent ids $store_all_id array
        	foreach ($id_result as $comment_id) {
            	array_push($store_all_id, $comment_id['parent_id']);
        	}
        	// return all hierarchical tree data from in_parent by sending
        	//  initiate parameters 0 is the main parent,news id, all parent ids

        	return  $this->in_parent(0,$id, $store_all_id);
    	}

    	/* recursive function to loop through all comments and retrieve it*/
    	public function in_parent($in_parent,$id,$store_all_id) 
    	{
        	// this variable to save all concatenated html
        	$html = "";
        	// build hierarchy  html structure based on ul li (parent-child) nodes
        	if (in_array($in_parent,$store_all_id)) {
            	$result = $this->commentmodel->tree_by_parent($id,$in_parent);
            	$html .=  $in_parent == 0 ? "<ul class='tree'>" : "<ul>";
            	
            	foreach ($result as $re) {
                	$html .= " <li class='comment_box'>
            		<div class='aut'>".$re['comment_name']."</div>
            		<div class='aut'>".$re['comment_email']."</div>
            		<div class='comment-body'>".$re['comment_body']."</div>
            		<div class='timestamp'>".date("F j, Y", $re['comment_created'])."</div>
            		<a  href='#comment_form' class='reply' id='" . $re['comment_id'] . "'>Replay </a>";
                	$html .=$this->in_parent($re['comment_id'],$id, $store_all_id);
               		$html .= "</li>";
           		}
            	$html .=  "</ul>";
        	}
        	return $html;
    	}
    	
    	// This is the counter function.. 
		public function add_count($id)
		{
			// load cookie helper
    		$this->load->helper('cookie');
			// this line will return the cookie which has id name
  			$check_visitor = $this->input->cookie(urldecode($id), FALSE);
			// this line will return the visitor ip address
    		$ip = $this->input->ip_address();
			// if the visitor visit this article for first time then //
			//set new cookie and update article_views column  ..
			//you might be notice we used id for cookie name and ip 
			//address for value to distinguish between articles  views
    		if ($check_visitor == false) {
        		$cookie = array(
        	    	"name"   => urldecode($id),
        	    	"value"  => "$ip",
        	    	"(int)expire" =>  time() + 7200,
        	    	"secure" => false
        		);
    	    	$this->input->set_cookie($cookie);
    	    	$this->articles->update_counter(urldecode($id));
    		}
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
			return redirect('user/contact');
		}
	
    	public function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('articlesmodel','articles');
			$this->load->model('commentmodel');
		}
	}
?>