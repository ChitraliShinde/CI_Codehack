<?php   

	class Articlesmodel extends CI_model	
	{

		public function articles_list($limit, $offset)
		{
			$user_id = $this->session->userdata('user_id');
			$query = $this->db
								->select(['id','title','description','image_path'])
								->from('articles')
								->where('user_id', $user_id)
								->order_by('title')
								->limit($limit, $offset)
								->get();
			return $query->result();
		}

		public function all_articles_list( $limit, $offset )
		{
			$query = $this->db
								->select(['id','title','description','image_path','created_at'])
								->from('articles')
								->limit($limit, $offset)
								->order_by('created_at','DESC')
								->get();
				return $query->result();
		}

		public function count_all_articles()
		{
			$query = $this->db
								->select(['id','title','description','image_path','created_at'])
								->from('articles')
								->get();
			return $query->num_rows();
		}

		public function num_rows()
		{
			$user_id = $this->session->userdata('user_id');
			$query = $this->db
								->select(['id','title','image_path'])
								->from('articles')
								->where('user_id', $user_id)
								->get();
			return $query->num_rows();
		}	

		public function add_article($array)
		{
			return $this->db->insert('articles', $array );
		}

		public function find_article($article_id)
		{
			$q = $this->db->select(['id','title','description','image_path'])
					->where('id', $article_id)
					->get('articles');
			return $q->row();
		}

		/*
		public function update_article($article_id, Array $article)
		{
			return $this->db
					->set($article)
					->where('id', $article_id)
					->update('articles', $article);
		}*/

		public function update_article($article_id, Array $data)
		{
			$old_photo = $_REQUEST['old_photo'];

			$photo = $_FILES['userfile']['name'];

			if ($photo != '') 
			{
				$photoExt1 = @end(explode('.', $photo));
				$phototest1 = strtolower($photoExt1);
				$new_photo = time().'.'.$phototest1;
				$photo_path	= './uploads/'.$new_photo;
				move_uploaded_file($_FILES['userfile']['tmp_name'], $photo_path);	
			}

			if ($photo == '') {
				$new_photo = $old_photo;
			}

			$data = array(
							'title' => $this->input->post('title'),
							'description' => $this->input->post('description'),
							'image_path' => $new_photo
					);

			return $this->db
					->where('id', $article_id)
					->update('articles', $data);
		}

		public function delete_article($article_id)
		{
			 return $this->db->delete('articles',['id'=>$article_id]);
		}

		public function search( $query, $limit, $offset )
		{
			$q = $this->db->from('articles')
						->like('title', $query)
						->limit($limit, $offset)
						->order_by('title')
						->get();
			return $q->result();			
		}

		public function count_search_results( $query )
		{
			$q = $this->db->from('articles')
							->like('title', $query)
							->get();
			return $q->num_rows();
		}

		public function find( $id )
		{
			$q = $this->db->from('articles')
					->where(['id'=> $id])
					->get();
			if ( $q->num_rows() )
				return $q->row();
			return false;
		}

		function update_counter($id) 
		{
			// return current article views 
    		$this->db->where('id', urldecode($id));
    		$this->db->select('article_views');
    		$count = $this->db->get('articles')->row();
			// then increase by one 
		    $this->db->where('id', urldecode($id));
		    $this->db->set('article_views', ($count->article_views + 1));
    		$this->db->update('articles');
		}
		
		public function popular_articles_list( $limit, $offset )
		{
			$query = $this->db
								->select(['id','title','description','image_path','created_at','image_path','article_views'])
								->from('articles')
								->limit($limit, $offset)
								->order_by('article_views','DESC')
								->get();
			return $query->result();
		}	
	}
?>