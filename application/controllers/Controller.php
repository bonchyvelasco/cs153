<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Controller extends CI_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->load->model('users_model');
			$this->load->helper('url');
			$this->load->library('session');
		}

		public function index() {
			$dbconnect = $this->load->database();
			
			foreach ($this->users_model->get() as $row) {
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
			
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			
			$info = $this->users_model->check_user($username, $password);
			
			if ($info) {
				$this->session->set_userdata($info);

				$this->users_model->online($info['id']);

				redirect('/dashboard');
			} else {
				$this->load->helper('url');
				redirect('/home');
			}
		}

		function logout() {
			if ($this->session->userdata('id')) {
				$this->users_model->online($this->session->userdata('id'), 0);
				$this->session->sess_destroy();
			} 
			
			redirect('/');
		}
	}
