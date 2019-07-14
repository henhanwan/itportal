<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
	 function __construct(){
	        parent::__construct();
					$this->load->helper('url');
					$this->load->library('pagination');
					$this->load->model('AdminUser');
	        if(!$this->session->userdata('username')){
	            redirect('../');
	        }
	    }


	public function index()
	{
		$this->load->view('sa/dashboard/users.php');
	}

	public function addUser()
	{
		// $this->load->view('admin/dashboard/adduser.php');
		$this->load->library('session');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('username', 'User Name', 'trim|required|min_length[4]');
	$this->form_validation->set_rules('id', 'Id Karyawan', 'trim|required|min_length[4]');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
	if($this->form_validation->run() == FALSE)
	{

				$this->session->set_flashdata('errors', validation_errors());
				redirect('../sadmin/user');
			}

			else

			{
	$this->load->model('AdminUser');
	$id = $this->input->post('id');
	$username = $this->input->post('username');
	$password = $this->input->post('password');
	$level = $this->input->post('optlevel');
	$active = $this->input->post('optactive');

	$data = array(
		'id' => $id,
		'username' => $username,
		'password' => md5($password),
		'level' => $level,
		'active' => $active
		);

		$query=$this->AdminUser->insert($data,'users');
	$this->session->set_flashdata('success','Data Yang anda masukan berhasil.');
	redirect('../sadmin/user');

	}
	}





}
