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
        $this->load->view('templates/homepage_header.php');
		$this->load->view('users/home.php');
	}

    public function signin()
    {
        $this->load->view('templates/homepage_header.php');
		$this->load->view('users/signin.php');
		var_dump($this->session->userdata());
    }

    public function process_signin()
    {
        $this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if(!$this->form_validation->run())
		{
            $this->session->set_flashdata('errors', validation_errors());
            redirect('users/signin');
        }
		else
		{
			$this->load->model('User');
			$user = $this->User->get_user_by_email($this->input->post('email'));
			$result = $this->User->validate_signin($user, $this->input->post('password'));
			if($result == 'success')
			{
				$this->session->set_userdata(array('user_id'=>$user['id'], 'first_name'=>$user['first_name'], 'user_level'=>$user['user_level']));            
                redirect("users/dashboard");
			}
			else
			{
				$this->session->set_flashdata('errors', $result);
				redirect('users/signin');
			}
		}

    }
	public function register()
	{
        $this->load->view('templates/homepage_header.php');
		$this->load->view('users/register.php');
	}
	public function process_register()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password_conf', 'Confirmation Password', 'required|matches[password]');
		if(!$this->form_validation->run())
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('users/register');
		}
		else
		{
			$this->load->model('User');
            $this->User->create_user($this->input->post());
			$this->session->set_flashdata('register_success', "<p class='text-success'>You have successfully registered! " . 
																$this->input->post('first_name') . " with an email of " . 
																$this->input->post('email') . "</p>");
			redirect('users/signin');
		}
	}

	public function dashboard()
	{
		$this->load->model('Dashboard');
		$dashboard['users'] = $this->Dashboard->show();
		$this->load->view('templates/dashboard_header.php');
		$this->load->view('users/dashboard_admin.php', $dashboard);
	}
}
