<?php

class Pages extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->model('users_model');
			$this->load->helper(array('url', 'form', 'captcha'));
			$this->load->library(array('session', 'form_validation'));
		}

    public function view($page = 'home') {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        if ($this->session->userdata('id')) {
            redirect("dashboard");
        }

		$captcha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
		$captcha = substr(str_shuffle($captcha), 0, 6);
		$vals = array(
				'img_path'      => './images/',
				'img_url'       => base_url().'images/'
		);

		$cap = create_captcha($vals);
		$data['captcha'] = $cap;
        $data['title'] = ucfirst($page); // Capitalize the first letter

        $data['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );

        if ($this->session->userdata('errors')) {
            $data['errors'] = $this->session->userdata('errors');
            $this->session->unset_userdata('errors');
        }

        if ($this->session->userdata('success')) {
            $data['success'] = $this->session->userdata('success');
            $this->session->unset_userdata('success');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function dashboard() {
        $data['luser'] = $this->session->userdata();
        $data['users'] = $this->users_model->get();
        
        $data['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );

        if ($this->session->userdata('errors')) {
            $data['errors'] = $this->session->userdata('errors');
            $this->session->unset_userdata('errors');
        }

        if ($this->session->userdata('success')) {
            $data['success'] = $this->session->userdata('success');
            $this->session->unset_userdata('success');
        }

        if ($this->session->userdata('id')) {
            $data['title'] = "Dashboard";

            $this->load->view('templates/nav_header', $data);
            $this->load->view('pages/dashboard', $data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect('/');
        }
    }

}