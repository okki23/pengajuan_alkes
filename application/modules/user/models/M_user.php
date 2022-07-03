<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_user extends Parent_Model { 
 

      var $nama_tabel = 'm_user';
      var $daftar_field = array('id','username','password','id_pegawai','level');
      var $primary_key = 'id';

	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_user(){   
		   $getdata = $this->db->query('select a.*,b.nama from m_user a
               left join m_karyawan b on b.id = a.id_pegawai')->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
         
                $sub_array[] = $row->username; 
                $sub_array[] = $row->nama;  
     
                      $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-sm waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="nav-icon fas fa-edit"></i> Ubah </a>  &nbsp; 
                      <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-sm waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="nav-icon fas fa-trash"></i> Hapus </a>';  
               
                $data[] = $sub_array;  
                 $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }

  
  
	 
 
}
