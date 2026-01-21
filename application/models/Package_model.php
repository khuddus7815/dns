<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Package_model extends CI_Model
{
   
public function add_package($data){
  $pkgid=$data['unit_type'];
  $pkgvalue=$data['value'];

  if(is_numeric($data['unit_type'])){
    $res=$this->db->query("SELECT package.value FROM package where package.id='$pkgid'")->row();
    $valuedata=json_decode($res->value);
    $mergedatarray=array_merge($valuedata,$pkgvalue);
    //print_r($mergedatarray);exit;
    $data=[
      'value'=>json_encode($mergedatarray)
       ];

       $this->db->where('id', $pkgid);
       $this->db->update('package', $data);
       return 1;  

  }else{
    $data=[
      'unit_type'=>$data['unit_type'],
      'value'=>json_encode($pkgvalue)
       ];
       $this->db->insert('package',$data);
       return $this->db->insert_id();  
  }
}
public function get_allpackages(){
  $data=$this->db->query("SELECT * FROM package");
  return $data->result();
}
public function get_pakagevalues($pkgid){
  if(sizeof($pkgid)){
    for ($i=0; $i < sizeof($pkgid); $i++) { 
      $id=$pkgid[$i];
      $result[]=$this->db->query("SELECT * FROM package where id='$id'")->row();
    }

    return $result;
  }else{
    return "no data found";
  }
}


public function get_allpakagelist(){
  $res=$this->db->query("SELECT package.unit_type,package.id,package.value FROM package")->result();
  return $res;
}


}
