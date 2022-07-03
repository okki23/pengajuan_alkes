<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_jabatan extends Parent_Model { 
  
 
     var $nama_tabel = 'm_jabatan';
     var $daftar_field = array('id','nama_jabatan');
     var $primary_key = 'id';
  
    
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }


  public function fetch_jabatan(){
      
       $getdata = $this->db->get('m_jabatan')->result();
       $data = array();  
      
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
             
                $sub_array[] = $row->nama_jabatan;   
                $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-sm waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" ><i class="nav-icon fas fa-edit"></i> Ubah </a> 
                 &nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-sm waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="nav-icon fas fa-trash"></i> Hapus </a>';  
                $sub_array[] =  $row->id;
                $data[] = $sub_array;  
              
           }  
          
       return $output = array("data"=>$data);
        
  } 
  
   
 
}
