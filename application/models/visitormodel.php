<?php 


	class Visitormodel extends CI_model
	{
		public function count_browser_status_chrome()
		{
			$result = $this->db->query('SELECT COUNT(id) as chrome FROM site_visits WHERE user_agent LIKE "chrome%"');
			return $result->row();
		}

		public function count_browser_status_mozila()
		{
			$result = $this->db->query('SELECT COUNT(id) as mozila FROM site_visits WHERE user_agent LIKE "mozila%"');
			return $result->row();
		}

		public function count_browser_status_edge()
		{
			$result = $this->db->query('SELECT COUNT(id) as edge FROM site_visits WHERE user_agent LIKE "edge%"');
			return $result->row();
		}

		public function count_browser_status_internet_explorer()
		{
			$result = $this->db->query('SELECT COUNT(id) as internet_explorer FROM site_visits WHERE user_agent LIKE "internet explorer%"');
			return $result->row();
		}

		public function count_browser_status_apple_safari()
		{
			$result = $this->db->query('SELECT COUNT(id) as apple_safari FROM site_visits WHERE user_agent LIKE "apple safari%"');
			return $result->row();
		}

		public function count_browser_status_safari()
		{
			$result = $this->db->query('SELECT COUNT(id) as safari FROM site_visits WHERE user_agent LIKE "safari%"');
			return $result->row();
		}
	}
?>