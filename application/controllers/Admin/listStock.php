<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class liststock extends CI_Controller {

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
					$this->load->model('AdminStock');
          $this->load->model('AdminUser');
	        if(!$this->session->userdata('username')){
	            redirect('../');
	        }
					elseif ($this->session->userdata('level') == "user") {
			      redirect('dashUser');
			    }
	    }

public function index()
{
  $this->load->model('AdminStock');
  $config['base_url'] = base_url('admin/liststock/index');
  $config['total_rows'] = $this->db->count_all('stock');
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
						$data['data'] = $this->AdminStock->getStock($config["per_page"], $data['page'], $field, $search);
				}else{
					$data['data'] = $this->AdminStock->getStock($config["per_page"], $data['page']);
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




$this->load->view('admin/dashboard/stocklist.php',$data);
}


public function editstock()
{

$this->load->library('session');
$this->load->library('form_validation');
$idstock = $this->input->post('id_stock');
$oldidstock = $this->input->post('old_idstock');
$namastock = $this->input->post('nama_stock');
$itemcode = $this->input->post('item_code');
$keterangan = $this->input->post('keterangan');

$data = array(
	'id_stock' => $idstock,
	'item_code' => $itemcode,
		'nama_stock' => $namastock,
		'keterangan' => $keterangan
	);


						 $this->AdminStock->updatestock($data,$oldidstock);

						redirect('../admin/listStock');
}



public function deletestock($id)
{
	$this->load->library('session');

	$where = array('id_stock' => $id);
	$this->AdminStock->deletestock($where,'stock');
	redirect('../admin/listStock');
}

public function fetch_stock()
	{
		$id_stock = $this->input->post('id_stock');
		$result = $this->AdminStock->fetch_stock($id_stock);

		echo json_encode($result);
		//$data['kategori2'] = $this->AdminBarang->fetch_kat2('id_kategori');
	}


}
