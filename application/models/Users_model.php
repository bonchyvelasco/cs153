<?php
class Users_model extends CI_Model {

		private $table = 'users';

        public function __construct()
        {
                $this->load->database();
        }
		
		function get_user_info($id) {
			$sql = "SELECT * FROM users WHERE id =".$id." limit 1";
			$query = $this->db->query($sql);
			
			return $query->row_array();
		}

		function insert_item($item) {
			$this->db->insert($this->table, $item);
		}
		
		function get(){
			$sql = "SELECT * FROM users";
			
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		
		function check_user($user, $pass){
			$sql = "SELECT * FROM users where username = ? limit 1";
			$query = $this->db->query($sql, array($user));
			$result = $query->row_array();
			if (password_verify($pass, $result['password'])) {
				return $result;
			} else {
				return 0;
			}
		}
		
		function online($user, $status = 1) {
			$data = array(
					'is_online' => $status,
			);

			$this->db->where('id', $user);
			$this->db->update('users', $data);
		}

		function update($id, $info) {
			$this->db->where('id', $id);
			$this->db->update('users', $info);
		}
		
}