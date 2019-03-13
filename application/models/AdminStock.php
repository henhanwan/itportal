<?php
class AdminStock extends CI_Model {
public $table = 'stock_trans';
public $table2 = 'stock';

  function ShowBarang(){
    return $this->db->get('stock');
  }

function insert($data,$table,$data2,$table2,$namastock,$optinout,$quantity,$tanggal){
  $this->db->trans_start();
$query=$this->db->insert($table,$data);

$checkname = $this->db->where('nama_stock',$namastock)->get($table2);
$count = $checkname->num_rows();

if ($count === 0){
  $query2=$this->db->insert($table2,$data2);
}

elseif ($count === 1 && $optinout == "in") {
  $queryin=$this->db->set("quantity","quantity + $quantity", FALSE)->set("last_in",$tanggal)->where('nama_stock',$namastock)->update('stock');
}

elseif ($count === 1 && $optinout == "out") {
  $queryout=$this->db->set("quantity","quantity - $quantity", FALSE)->where('nama_stock',$namastock)->update('stock');

}


if (!$query && !$query2 && !$queryout && !$queryin) return 1;
$this->db->trans_complete();
}

//VALIDASI STOCK MODEL
function stockval($quantity,$optinout,$namastock){
$val=$this->db->from('stock')->where('quantity <', $quantity)->where('nama_stock',$namastock)->get();
$count = $val->num_rows();
  if ($optinout =="out" && $count===1)
  {
return TRUE;
}
else {
  return FALSE;
}
}


//VALIDASI TANGGAL
function stocktgl($optinout,$namastock,$tanggal){
$val=$this->db->from('stock')->where('last_in <', $tanggal)->where('nama_stock',$namastock)->get();
$count = $val->num_rows();
  if ($optinout =="out" && $count===1)
  {
return TRUE;
}
else {
  return FALSE;
}
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

function getBarang($limit, $start){

  // $this->db->from('barang');
  $this->db->join('status_asset','status_asset.id_status = barang.id_status');
  $this->db->join('d2_asset','d2_asset.id_d2 = barang.id_d2');
  $this->db->join('cabang','cabang.id_cabang = barang.id_cabang');
  $this->db->join('divisi','divisi.id_divisi = barang.id_divisi');
  $this->db->join('kategori','kategori.id_kategori = barang.id_kategori');
  $this->db->join('kategori2','kategori2.no = barang.no');
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
