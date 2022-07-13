<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_barang extends Parent_Model { 
     
     var $nama_tabel = 'm_barang';
     var $daftar_field = array('id','kode_barang','nama_barang','qty','kondisi');
     var $primary_key = 'id'; 
	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  
  public function fetch_barang(){
    
		   $getdata = $this->db->get($this->nama_tabel)->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
 
                $sub_array[] = $row->kode_barang;   
                $sub_array[] = $row->nama_barang; 
                $sub_array[] = $row->qty; 
                $sub_array[] = $row->kondisi; 
                $sub_array[] = ' 
                <a href="javascript:void(0)" class="btn btn-warning btn-sm waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="nav-icon fas fa-edit"></i> Ubah </a>  &nbsp; 
                <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-sm waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="nav-icon fas fa-trash"></i> Hapus </a>  &nbsp;';  
              
                $data[] = $sub_array;  
                $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }
     
	 
 
}
