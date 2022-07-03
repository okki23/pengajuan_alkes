<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_member extends Parent_Model {  
 
     var $nama_tabel = 'm_member';
     var $daftar_field = array('id','no_reg','nama','tgl_daftar','jenkel','telp','alamat','usia','tinggi','berat_badan','lemak_tubuh','kadar_air','masa_otot','kalori','usia_sel','masa_tulang','lemak_perut');
     var $primary_key = 'id'; 
    
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }

  public function get_no(){
     $query = $this->db->query("SELECT SUBSTR(MAX(no_reg),-7) AS id  FROM m_member"); 
     return $query;
  }
 
  public function fetch_member(){
      
       $getdata = $this->db->get('m_member')->result();
       $data = array();  
      
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
             
                $sub_array[] = $row->no_reg;   
                $sub_array[] = $row->nama;   
                $sub_array[] = $row->usia;   
                $sub_array[] = $row->alamat;   
                
                $sub_array[] = '
                 <a href="javascript:void(0)" class="btn btn-info btn-sm waves-effect" id="edit" onclick="Show_Detail('.$row->id.');" ><i class="nav-icon fas fa-chalkboard"></i> Detail </a> 
                 &nbsp;<a href="javascript:void(0)" class="btn btn-warning btn-sm waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" ><i class="nav-icon fas fa-edit"></i> Ubah </a> 
                 &nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-sm waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="nav-icon fas fa-trash"></i> Hapus </a>';  
                $sub_array[] =  $row->id;
                $data[] = $sub_array;  
              
           }  
          
       return $output = array("data"=>$data);
        
  } 
  
   
 
}
