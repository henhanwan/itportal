<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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


		public function cekAkun()
		{
			//load model_users
			$this->load->model('LoginModels');

			//membuat validasi login
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$query = $this->LoginModels->cekAkun($username, $password);

			if ($query === 1) {
				return "User Tidak Ditemukan!";
			}
			else if ($query === 2) {
				return "User Tidak Aktif!";
			}
			else if ($query === 3) {
				return "Password Salah!";
			}
			else {
				//membuat session dengan nama userdata
				$userData = array(
					'username' => $query->username,
					'level' => $query->level,
					'logged_in' => TRUE
				);
				$this->session->set_userdata($userData);
				return TRUE;
			}
		}

		public function login()
		{
			//melakukan pengalihan halaman sesuai dengan levelnya
			if ($this->session->userdata('level') == "user"){redirect('dashUser/');}
			if ($this->session->userdata('level') == "admin"){redirect('dashadmin/');}
			if ($this->session->userdata('level') == "superadmin"){redirect('dashSa/');}

			//proses login dan validasi nya
			if ($this->input->post('submit')) {
				$this->load->model('LoginModels');
				$this->form_validation->set_rules('username', 'Username', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				$error = $this->cekAkun();
				if ($this->form_validation->run() && $error === TRUE) {
					$data = $this->LoginModels->cekAkun($this->input->post('username'), $this->input->post('password'));

					//jika bernilai TRUE maka alihkan halaman sesuai dengan level nya
					if($data->level == 'admin'){
						redirect('dashadmin/');
					}
					else if($data->level == 'superadmin'){
						redirect('dashSa/');
					}
					else if($data->level == 'user'){
						redirect('dashUser/');
					}
				}

				//Jika bernilai FALSE maka tampilkan error
				else{

					$data['error'] = $error;
					$this->load->view('home', $data);

				}
			}
			//Jika tidak maka alihkan kembali ke halaman login
			else{
				redirect('../', 'refresh');
			}
		}


		public function logout()
		{
			//Menghapus semua session (sesi)
			$this->session->sess_destroy();
			redirect('http://localhost/itportal/');
		}
	}
