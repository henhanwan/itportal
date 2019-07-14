<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class liststocktrans extends CI_Controller {

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
					$this->load->model('AdminStock');
	        if(!$this->session->userdata('username')){
	            redirect('../');
	        }
	    }

public function index()
{
  $this->load->model('AdminStock');
  $config['base_url'] = base_url('sadmin/liststocktrans/index');
  $config['total_rows'] = $this->db->count_all('stock_trans');
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

				if (isset($filter) && !empty($search)) {
						$data['data'] = $this->AdminStock->getStocktrans($config["per_page"], $data['page'], $field, $search);
				}else{
					$data['data'] = $this->AdminStock->getStocktrans($config["per_page"], $data['page']);
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




$this->load->view('sa/dashboard/stocklisttrans.php',$data);
}


public function editstocktrans()
{
$this->load->model('AdminStock');
$this->load->library('session');
$this->load->library('form_validation');
$idtrans = $this->input->post('id_trans');
$old_idtrans = $this->input->post('old_idtrans');
$itemcode = $this->input->post('item_code');
$olditemcode = $this->input->post('old_item_code');
$old_quantity = $this->input->post('old_quantity');
$namastock = $this->input->post('nama_stock');
$optinout = $this->input->post('optinout');
$quantity = $this->input->post('quantity');
$tanggal = $this->input->post('tgl_inout');
$namavendor = $this->input->post('vendor');
$no_po = $this->input->post('no_po');
$nama_emp = $this->input->post('nama_emp');
$data = array(
	'id_trans' => $idtrans,
		'item_code' => $itemcode,
		'nama_stock' => $namastock,
		'inout' => $optinout,
		'quantity' => $quantity,
		'tanggal' => $tanggal,
		'vendor' => $namavendor,
		'no_po' => $no_po,
		'nama_emp' => $nama_emp



	);
	$data2 = array(
		'nama_stock' => $namastock,
		'item_code' => $itemcode,
		'last_in' => $tanggal,
		'quantity' => $quantity
	);


						 $this->AdminStock->updatestocktrans($data,'stock_trans',$data2,'stock',$itemcode,$optinout,$quantity,$tanggal,$old_idtrans,$old_quantity);

						redirect('../sadmin/liststocktrans');
}




public function deletestocktrans($id)
{
	$this->load->library('session');

	$where = array('id_trans' => $id);
	$this->AdminStock->deletestocktrans($where,'stock_trans');
	redirect('../sadmin/liststocktrans');
}

public function fetch_trans()
	{
		$id_trans = $this->input->post('id_trans');
		$result = $this->AdminStock->fetch_trans($id_trans);

		echo json_encode($result);
		//$data['kategori2'] = $this->AdminBarang->fetch_kat2('id_kategori');
	}


}
