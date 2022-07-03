<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_params_setting extends Parent_Model { 
 

      var $nama_tabel = 'm_params_setting';
      var $daftar_field = array('id','params_settingname','password','id_pegawai','level');
      var $primary_key = 'id';

	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_params_setting(){   
		   $getdata = $this->db->query('select a.*,b.nama from m_params_setting a
               left join m_karyawan b on b.id = a.id_pegawai')->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
         
                $sub_array[] = $row->params_settingname; 
                $sub_array[] = $row->nama;  
     
                      $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-sm waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="nav-icon fas fa-edit"></i> Ubah </a>  &nbsp; 
                      <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-sm waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="nav-icon fas fa-trash"></i> Hapus </a>';  
               
                $data[] = $sub_array;  
                 $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }

  
  
	 
 
}
