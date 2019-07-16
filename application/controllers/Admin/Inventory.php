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
					elseif ($this->session->userdata('level') == "user") {
			      redirect('dashUser');
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
	$idstatus = $this->input->post('status');
	$status = $this->input->post('status_hidden');
	$idasset = $this->input->post('asset');
	$asset = $this->input->post('asset_hidden');
	$idcabang = $this->input->post('cabang');
	$cabang = $this->input->post('cabang_hidden');
	$iddivisi = $this->input->post('divisi');
	$divisi = $this->input->post('divisi_hidden');
	$tgl_beli = $this->input->post('tgl_beli');
	$kategori = $this->input->post('kategori_hidden');
	$idkategori = $this->input->post('kategori');
	$kategori2 = $this->input->post('kategori2_hidden');
	$idkategori2 = $this->input->post('kategori2');
	$number = $this ->input->post('number');
	$runnumber = $this->input->post('run_number');

	$data = array(
		'id_barang' => $idbarang,
		'nama_barang' => $namabarang,
		'status' => $status,
		'id_status' => $idstatus,
		'asset' => $asset,
		'id_d2' => $idasset,
		'cabang' => $cabang,
		'id_cabang' => $idcabang,
		'divisi' => $divisi,
		'id_divisi' => $iddivisi,
		'tgl_pembelian' => $tgl_beli,
		'kategori' => $kategori,
		'id_kategori' => $idkategori,
		'no' => $number,
		'kategori2' => $kategori2,
		'id_kategori2' => $idkategori2,
		'running_number' => $runnumber
		);

		$query=$this->AdminBarang->insert($data,'barang');
	$this->session->set_flashdata('success','Data Yang anda masukan berhasil.');
	redirect('../admin/listinventory');

	}
	}


	public function addstock()
	{
		// $this->load->view('admin/dashboard/adduser.php');
		$this->load->library('session');
	$this->load->library('form_validation');
	$this->form_validation->set_rules('nama_stock', 'Nama Stock', 'trim|required|min_length[10]');
	$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|callback_stock_valout');
	$this->form_validation->set_rules('tgl_inout', 'Tanggal IN / OUT', 'trim|required|callback_stock_valtgl');
	$this->form_validation->set_rules('vendor', 'Nama Vendor', 'trim|required');
	$this->form_validation->set_rules('no_po','No PO','trim|required');
	$this->form_validation->set_rules('nama_emp', 'Nama Employee', 'trim|required');

	if($this->form_validation->run() == FALSE)
	{

				$this->session->set_flashdata('errors', validation_errors());
				redirect('../admin/inventory');
			}

			else

			{
	$this->load->model('AdminStock');
	// $idtrans = $this->input->post('id_barang');
	$namastock = $this->input->post('nama_stock');
	$itemcode = $this->input->post('item_code');
	$optinout = $this->input->post('optinout');
	$quantity = $this->input->post('quantity');
	$tanggal = $this->input->post('tgl_inout');
	$vendor = $this->input->post('vendor');
	$no_po = $this->input->post('no_po');
	$nama_emp = $this->input->post('nama_emp');

	$data = array(
		// 'id_barang' => $idbarang,
		'nama_stock' => $namastock,
		'item_code' => $itemcode,
		'inout' => $optinout,
		'quantity' => $quantity,
		'tanggal' => $tanggal,
		'vendor' => $vendor,
		'no_po' => $no_po,
		'nama_emp' => $nama_emp
		);

		$data2 = array(
			'nama_stock' => $namastock,
			'item_code' => $itemcode,
			'last_in' => $tanggal,
			'quantity' => $quantity
		);



		$query=$this->AdminStock->insert($data,'stock_trans',$data2,'stock',$itemcode,$optinout,$quantity,$tanggal);



	$this->session->set_flashdata('success','Data Yang anda masukan berhasil.');
	redirect('../admin/liststock');

	}
	}

//VALIDASI STOCK CONTROLLER
public function stock_valout()
{
$this->load->model('AdminStock');
$namastock = $this->input->post('nama_stock');
$quantity = $this->input->post('quantity');
$optinout = $this->input->post('optinout');
$stockval=$this->AdminStock->stockval($quantity,$optinout,$namastock);
	if($stockval==TRUE){
		$this->form_validation->set_message('stock_valout','Out quantity melebihi stock quantity ');
		return FALSE;
	}
	elseif($stockval==FALSE) {
		return TRUE;
	}
}

//VALIDASI TANGGAL CONTROLLER
public function stock_valtgl()
{
$this->load->model('AdminStock');
$namastock = $this->input->post('nama_stock');
$tanggal = $this->input->post('tgl_inout');
$optinout = $this->input->post('optinout');
$stocktgl=$this->AdminStock->stocktgl($tanggal,$optinout,$namastock);
	if($stocktgl==TRUE){
		$this->form_validation->set_message('stock_valtgl','Tanggal out tidak valid');
		return FALSE;
	}
	elseif($stocktgl==FALSE) {
		return TRUE;
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
