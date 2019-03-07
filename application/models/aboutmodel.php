<?php 

	class Aboutmodel extends CI_model
	{
		public function aboutus()
		{
			$query = $this->db
								->select(['aboutID','aboutImg','aboutQuote','aboutContent'])
								->from('about')
								->get();
			return $query->row();
		}
	}
?>