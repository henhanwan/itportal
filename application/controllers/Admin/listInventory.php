<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class listinventory extends CI_Controller {

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
					$this->load->model('AdminBarang');
          $this->load->model('AdminUser');
	        if(!$this->session->userdata('username')){
	            redirect('../');
	        }
	    }

public function index()
{
  $this->load->model('AdminBarang');
  $config['base_url'] = base_url('admin/listinventory/index');
  $config['total_rows'] = $this->db->count_all('barang');
 $config['per_page'] = 5;
 $config['uri_segment']=4;
 $choice = $config["total_rows"] / $config["per_page"];
 $config["num_links"] = floor($choice);
  // pagination style
 $config['first_link'] = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

	$this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

	$filter = $this->input->post('filter');
        $field  = $this->input->post('field');
	$search = $this->input->post('search');
	/*
	if (isset($filter) && !empty($search)) {
		$this->load->model('AdminBarang');
		$data['students'] = $this->AdminBarang->getBarangWhereLike($field, $search);
	} else {
		$this->load->model('AdminBarang');
		// $this->load->model('students/Student_Model');
		$data['data'] = $this->AdminBarang->getBarang($config["per_page"], $data['page']);
	}
	*/
	if (isset($filter) && !empty($search)) {
  		$data['data'] = $this->AdminBarang->getBarang($config["per_page"], $data['page'], $field, $search);
	}else{
		$data['data'] = $this->AdminBarang->getBarang($config["per_page"], $data['page']);
	}
  	$data['pagination'] = $this->pagination->create_links();
	$data['users'] = $this->AdminUser->modalgetid();
  	$data['judul'] = "Users";
	$data['status_asset'] = $this->AdminBarang->get_status();

	$data['d2'] = $this->AdminBarang->get_d2();
	$data['cabang'] = $this->AdminBarang->get_cabang();
	$data['divisi'] = $this->AdminBarang->get_divisi();
	$data['kategori'] = $this->AdminBarang->get_kategori();
	$data['kategori2'] = $this->AdminBarang->fetch_kat2('id_kategori');




$this->load->view('admin/dashboard/inventorylist.php',$data);
}


public function editItem()
{

$this->load->library('session');
$this->load->library('form_validation');
$idbarang = $this->input->post('id_barang');
$old_idbarang = $this->input->post('old_idbarang');
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


						 $this->AdminBarang->updateitem($data,$old_idbarang);

						redirect('../admin/listInventory');
}



public function delete($idbarang)
{
	$this->load->library('session');

	$where = array('id_barang' => $idbarang);
	$this->AdminUser->delete($where,'barang');
	redirect('../admin/listInventory');
}

public function fetch_barang()
	{
		$id_barang = $this->input->post('id_barang');
		$result = $this->AdminBarang->fetch_barang($id_barang);

		echo json_encode($result);
		//$data['kategori2'] = $this->AdminBarang->fetch_kat2('id_kategori');
	}


}
