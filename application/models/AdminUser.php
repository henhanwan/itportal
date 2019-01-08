<?php
class AdminUser extends CI_Model {
public $table = 'users';
  function ShowUsers(){
    return $this->db->get('users');
  }

function insert($data,$table){
$query=$this->db->insert($table,$data);
//$this->db->insert($table,$data);
if (!$query) return 1;
}

function modalgetid(){
  $query = $this->db->get('users');

  foreach($query->result_array() as $row){
    $id = $row['id'];
          $username = $row['username'];
          $password = $row['password'];
        $level = $row['level'];
          $active = $row['active'];

  }


  $data = array(
         'id' => $row['id'],
         'username' => $row['username'],
         'password' => $row['password'],
         'level' => $row['level'],
         'active' => $row['active'],

     );

    return $data;
}

function getUsers($limit, $start){
  $query = $this->db->get('users', $limit, $start);
return $query;

}

function getUser(){

}

function getID($where){
  $this->db->where($where);
  return $this->db->get('Users')->result();
}

  public function update($data, $id) {
        $this->db->where('id',$id);
        $this->db->update('users', $data);
        return TRUE;
 }

 public function fetch_user($id){
   $result = $this->db->where('id',$id)->get('users')->result_array();
  return $result;

 }

 public function delete($where, $table){
   $this->db->where($where);
   $this->db->delete($table);
 }

}

?>
