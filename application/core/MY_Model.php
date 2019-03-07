<?php
	
	class MY_Model extends CI_Model
	{
		public function test()
		{
			echo "Test from MY Model";
		}
	}

	class adminPanel extends MY_Model {

			//public function common functionalities
	}

	class userPanel extends MY_Model {

			//public function common functionalities
	}
?>