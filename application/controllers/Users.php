<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		echo "Hello World!";
        $this->load->view('templates/header.php');
		$this->load->view('dashboard/homepage.php');
	}

    public function signin()
    {
        echo "signin";
        $this->load->view('templates/header.php');
        $this->load->view('dashboard/signin.php');
    }

    public function process_registration()
    {
        echo "i'm here";
    }
}