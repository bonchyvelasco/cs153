<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Controller extends CI_Controller {
		
		public function index() {
			$dbconnect = $this->load->database();
			
			$this->load->model('Users_model', 'model');
			
			foreach ($this->model->get() as $row) {
				echo $row->birthday;
			}
			
		}
		
		function add_user(){
			$dbconnect = $this->load->database();
			
			$this->load->model('Users_model', 'model');
			
			$username = $this->input->post('username', TRUE);
			$birthday = $this->input->post('birthday', TRUE);
		} 	
		
		function authenticate(){
			$dbconnect = $this->load->database();
			
			$this->load->model('Users_model', 'model');
			
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			
			if ($this->model->check_user($username, md5($password))) {
				echo ("valid");
			} else {
				echo ("haxx");
			}
		}
	}
