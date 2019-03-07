<?php  
//error_reporting(0);
    class Commentmodel extends CI_Model
    {

        // get full tree comments based on news id
        public function tree_all($id) 
        {
            error_reporting(0);
            $result = $this->db->query("SELECT * FROM comment where id = $id")->result_array();
            foreach ($result as $row) {
                $data[] = $row;
            }
            return $data;
        }

        // to get child comments by entry id and parent id and news id
        public function tree_by_parent($id,$in_parent) 
        {
            $result = $this->db->query("SELECT * FROM comment where parent_id = $in_parent AND  id = $id")->result_array();
            foreach ($result as $row) {
                $data[] = $row;
            }
            return $data;
        }

        // to insert comments
        public function add_new_comment()
        {
            $this->db->set("id", $this->input->post('id'));
            $this->db->set("parent_id", $this->input->post('parent_id'));
            $this->db->set("comment_name", $this->input->post('comment_name'));
            $this->db->set("comment_email", $this->input->post('comment_email'));
            $this->db->set("comment_body", $this->input->post('comment_body'));
            $this->db->set("comment_created", time());
            $this->db->insert('comment');
            return $this->input->post('parent_id');
        }

        //to count total number of comments 
        public function count_comments($id)
        {
            $query = $this->db->select(['id','count(comment_id) as total_comments'])
                                ->from('comment')
                                ->where('id', $id)
                                ->get();
            return $query->row();
        }
    }
?>

