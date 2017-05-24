<?php

class Pages extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->model('users_model');
			$this->load->helper('url');
			$this->load->library('session');
		}

    public function view($page = 'home') {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function dashboard() {
        $data['luser'] = $this->session->userdata();
        $data['users'] = $this->users_model->get();
        
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