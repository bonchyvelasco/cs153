<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Controller extends CI_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->load->model('users_model');
			$this->load->helper(array('url', 'form'));
			$this->load->library(array('session', 'form_validation'));
		}

		public function index() {
			$dbconnect = $this->load->database();
			
			foreach ($this->users_model->get() as $row) {
				echo $row->birthday;
			}
			
		}
		
		function add_user($from = 'dashboard'){
			if (!$this->session->userdata('id'))
				redirect('/');
			
			$this->form_validation->set_rules(
					'username', 'Username',
					'required|min_length[5]|max_length[12]|is_unique[users.username]|alpha_dash',
					array(
							'required'      => 'You have not provided %s.',
							'is_unique'     => 'This %s already exists.',
							'min_length'	=> 'This %s is too short. Must be 5 to 12 characters.',
							'max_length'	=> 'This %s is too long. Must be 5 to 12 characters.'
					)
			);
			$this->form_validation->set_rules('name', 'Name', 'required|alpha_dash');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('birthday', 'Birthday', 'required|callback_is_date');

			if ($this->form_validation->run() == FALSE) {
				$errors = validation_errors();
				$this->session->set_userdata('errors', $errors);
				if ($from == 'dashboard') {
					redirect('dashboard');
				} else {
					redirect('/');
				}
			} else {
				if ($this->input->post('admin', TRUE)) {
					$admin = 1;
				} else {
					$admin = 0;
				}

				$info = array(
					'username' => $this->input->post('username', TRUE),
					'name' => $this->input->post('name', TRUE),
					'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
					'address' => $this->input->post('address', TRUE),
					'birthday' => $this->input->post('birthday', TRUE),
					'is_admin' => $admin,
					'is_online' => 0,
				);

				$this->users_model->insert_item($info);
				$this->session->set_userdata('success', 'You have successfully added a user!');
				if ($from == 'dashboard') {
					redirect('dashboard');
				} else {
					redirect('/');
				}
			}

		} 	
		
		function authenticate(){

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == FALSE) {
				$errors = validation_errors();
				$this->session->set_userdata('errors', $errors);
				redirect('/');
			} else {
				$username = $this->input->post("username", TRUE);
				$password = $this->input->post("password", TRUE);
				
				$info = $this->users_model->check_user($username, $password);
				
				if ($info) {
					$this->session->set_userdata($info);

					$this->users_model->online($info['id']);

					redirect('dashboard');
				} else {
					$this->session->set_userdata('errors', 'Your input does not match any of our existing users.');
					redirect('/');
				}
			}

		}

		function logout() {
			if ($this->session->userdata('id')) {
				$this->users_model->online($this->session->userdata('id'), 0);
				$this->session->sess_destroy();
			} 
			
			redirect('/');
		}

		public function is_date($str) {
			$dateRegex = "/^(?:(?!0000)[0-9]{4}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:0[13-9]|1[0-2])-(?:29|30)|(?:0[13578]|1[02])-31)|(?:[0-9]{2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[2468][048]|[13579][26])00)-02-29)$/";

			if (1 !== preg_match($dateRegex, $str))
			{
				$this->form_validation->set_message('is_date', 'The %s field is not a valid date');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
                public function registration(){
                    $this->load->model("Users_model");
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('Username', 'Username', 'trim|required|min_length[4]|is_unique[users.username]');
                    $this->form_validation->set_rules('Name', 'Name', 'trim|required|min_length[4]');
                    $this->form_validation->set_rules('Address', 'Address', 'trim|required|min_length[4]');
                    $this->form_validation->set_rules('Date', 'Date', 'trim|required');
                    $this->form_validation->set_rules('Password', 'Password', 'trim|required|min_length[4]|max_length[32]');
                    $this->form_validation->set_rules('ConPassword', 'Confirmation  Password', 'trim|required|matches[Password]');
					$this->form_validation->set_rules('Captcha', 'Captcha', 'trim|required|matches[captchaWord]');
					
					$this->session->unset_userdata('captchaWord');
                    
                    if($this->form_validation->run() == FALSE){
                       redirect('/home');
                    }
                    else{
                       $this->Users_model->add_user2();
                        redirect('/home');

                    }
                }
	}
