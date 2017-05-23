<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Controller extends CI_Controller {
		
		public function index() {
			$dbconnect = $this->load->database();
			
			$this->load->model('Users_model', 'model');
			
			$this->load->dbforge();
			
		}
	}
