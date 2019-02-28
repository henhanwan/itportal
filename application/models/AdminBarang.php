<?php
class AdminBarang extends CI_Model {
public $table = 'barang';
  function ShowBarang(){
    return $this->db->get('barang');
  }

function insert($data,$table){
$query=$this->db->insert($table,$data);
//$this->db->insert($table,$data);
if (!$query) return 1;
}

function modalgetid(){
  $query = $this->db->get('barang');

  foreach($query->result_array() as $row){
    $id = $row['id_barang'];
          $namabarang = $row['nama_barang'];
          $status = $row['status'];
        $asset = $row['asset'];
          $active = $row['active'];

  }


  $data = array(
         'id_barang' => $row['id_barang'],
         'nama_barang' => $row['nama_barang'],
         'status' => $row['status'],
         'asset' => $row['asset'],
         'active' => $row['active'],

     );

    return $data;
}

function getBarang($limit, $start, $field = NULL, $search = NULL){
  
  // $this->db->from('barang');
  $this->db->join('status_asset','status_asset.id_status = barang.id_status');
  $this->db->join('d2_asset','d2_asset.id_d2 = barang.id_d2');
  $this->db->join('cabang','cabang.id_cabang = barang.id_cabang');
  $this->db->join('divisi','divisi.id_divisi = barang.id_divisi');
  $this->db->join('kategori','kategori.id_kategori = barang.id_kategori');
  $this->db->join('kategori2','kategori2.no = barang.no');
	if($field && $search){
		$this->db->like($field, $search);
	}
  $query = $this->db->get('barang',$limit, $start);
return $query;

}

function getBarangWhereLike($field, $search){
  $query = $this->db->like($field, $search)->order_by('tgl_pembelian')->get('barang');
  return $query->result();
}


function getID($where){
  $this->db->where($where);
  return $this->db->get('barang')->result();
}

  public function updateitem($data, $old_idbarang) {
        $this->db->where('id_barang',$old_idbarang);
        $this->db->update('barang', $data);
        return TRUE;
 }

 public function delete($where, $table){
   $this->db->where($where);
   $this->db->delete($table);
 }

 public function get_status(){
   $result = $this->db->select('id_status,status')->get('status_asset')->result_array();

   $status = array();
   foreach ($result as $row) {
     $status[$row['id_status']]=$row['status'];
   }
   $status[''] = 'Select status';
        return $status;
 }

 public function get_d2(){
   $result = $this->db->select('id_d2,asset')->get('d2_asset')->result_array();

   $d2 = array();
   foreach ($result as $row) {
     $d2[$row['id_d2']]=$row['asset'];
   }
   $d2[''] = 'Select d2';
        return $d2;
 }

 public function get_cabang(){
   $result = $this->db->select('id_cabang,cabang')->get('cabang')->result_array();

   $cabang = array();
   foreach ($result as $row) {
     $cabang[$row['id_cabang']]=$row['cabang'];
   }
   $cabang[''] = 'Select cabang';
        return $cabang;
 }

 public function get_divisi(){
   $result = $this->db->select('id_divisi,divisi')->get('divisi')->result_array();

   $divisi = array();
   foreach ($result as $row) {
     $divisi[$row['id_divisi']]=$row['divisi'];
   }
   $divisi[''] = 'Select divisi';
        return $divisi;
 }

 public function get_kategori(){
   $result = $this->db->select('id_kategori,kategori')->get('kategori')->result_array();

   $kategori = array();
   foreach ($result as $row) {
     $kategori[$row['id_kategori']]=$row['kategori'];
   }
   $kategori[''] = 'Select kategori';
        return $kategori;
 }

 

 public function fetch_kat2($id_kategori){
   $result = $this->db->where('id_kategori',$id_kategori)->get('kategori2')->result();

  // $kategori2 = array();
$kategori2 = '<option selected="selected" value="">Select kategori2</option>';
   foreach($result as $row)
  {

    $kategori2 .='<option value="'.$row->id_kategori2.'">'.$row->kategori2.'</option>';
    //  $kategori2[$row['id_kategori2']]=$row['kategori2'];
  }
//$kategori2[''] = 'Select kategori';
      return $kategori2;
 }

 public function fetch_barang($id_barang){
   $result = $this->db->where('id_barang',$id_barang)->get('barang')->result_array();
  return $result;
 }

}

?>
