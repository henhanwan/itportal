<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

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
					$this->load->helper('form');
					$this->load->helper('url');
					$this->load->library('pagination');
					//$this->load->model('AdminUser');
					$this->load->model('AdminBarang');
	        if(!$this->session->userdata('username')){
	            redirect('../');
	        }
	    }


	public function index()
	{
		$data['status_asset'] = $this->AdminBarang->get_status();
		$data['d2'] = $this->AdminBarang->get_d2();
		$data['cabang'] = $this->AdminBarang->get_cabang();
		$data['divisi'] = $this->AdminBarang->get_divisi();
		$data['kategori'] = $this->AdminBarang->get_kategori();
		$data['kategori2'] = $this->AdminBarang->fetch_kat2('id_kategori');


		$this->load->view('admin/dashboard/inventory.php',$data);

	}

	public function addbarang()
	{
		// $this->load->view('admin/dashboard/adduser.php');
		$this->load->library('session');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('nama_barang', 'Nama Asset', 'trim|required|min_length[10]');
	$this->form_validation->set_rules('status', 'Status Asset', 'trim|required');
	$this->form_validation->set_rules('asset', 'Asset', 'trim|required');
	$this->form_validation->set_rules('cabang', 'Cabang', 'trim|required');
	$this->form_validation->set_rules('divisi', 'Divisi', 'trim|required');
	$this->form_validation->set_rules('tgl_beli', 'Tanggal pembelian', 'trim|required');
	$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
	$this->form_validation->set_rules('kategori2', 'kategori2', 'trim|required');
	$this->form_validation->set_rules('run_number', 'Running Number', 'trim|required');

	if($this->form_validation->run() == FALSE)
	{

				$this->session->set_flashdata('errors', validation_errors());
				redirect('../admin/inventory');
			}

			else

			{
	$this->load->model('AdminBarang');
	$idbarang = $this->input->post('id_barang');
	$namabarang = $this->input->post('nama_barang');
	$status = $this->input->post('status');
	$asset = $this->input->post('asset');
	$cabang = $this->input->post('cabang');
	$divisi = $this->input->post('divisi');
	$tgl_beli = $this->input->post('tgl_beli');
	$kategori = $this->input->post('kategori');
	$kategori2 = $this->input->post('kategori2');
	$number = $this ->input->post('number');
	$runnumber = $this->input->post('run_number');

	$data = array(
		'id_barang' => $idbarang,
		'nama_barang' => $namabarang,
		'id_status' => $status,
		'id_d2' => $asset,
		'id_cabang' => $cabang,
		'id_divisi' => $divisi,
		'tgl_pembelian' => $tgl_beli,
		'id_kategori' => $kategori,
		'no' => $number,
		'id_kategori2' => $kategori2,
		'running_number' => $runnumber
		);

		$query=$this->AdminBarang->insert($data,'barang');
	$this->session->set_flashdata('success','Data Yang anda masukan berhasil.');
	redirect('../admin/Inventory');

	}
	}

public function fetch_kat2()
	{
		if($this->input->post('id_kategori'))
		{
			echo $this->AdminBarang->fetch_kat2($this->input->post('id_kategori'));

		}
		//$data['kategori2'] = $this->AdminBarang->fetch_kat2('id_kategori');
	}



}
