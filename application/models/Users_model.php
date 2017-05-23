<?php
class Users_model extends CI_Model {

		private $table = 'users';

        public function __construct()
        {
                $this->load->database();
        }
		
		function get_user_info($id) {
			$sql = "SELECT * FROM users WHERE id = ?";
			$query = $this->db->query($sql, array(1, $id));
			
			return $query->result;
		}
		
		function insert_item($item) {
			$this->item = $item;
			
			$this->db->insert($this->table, $this);
		}
		
		function get(){
			$sql = "SELECT * FROM users";
			
			$query = $this->db->query($sql);
			return $query->result();
		}
		
		function check_user($user, $pass){
			$sql = "SELECT COUNT(*) FROM users where username = ? AND password = ?";
			$query = $this->db->query($sql, array($user, $pass));
			$result = $query->row_array();
			return $result['COUNT(*)'];
		}
		
		
		
}