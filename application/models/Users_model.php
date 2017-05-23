<?php
class Users_model extends CI_Model {

		private $table = 'users';

        public function __construct()
        {
                $this->load->database();
        }
		
		function get_user_info($user) {
			$sql = "SELECT * FROM users WHERE username = ?";
			$query = $this->db->query($sql, array(1, $user));
			
			return $query->result;
		}
		
		function insert_item($item) {
			$this->item = $item;
			
			$this->db->insert($this->table, $this);
		}
		
		function get_item($user) {
			$sql = "SELECT * FROM users WHERE username = ?";
			
			$this->db->query($sql, array($user));
		}
		
		
}