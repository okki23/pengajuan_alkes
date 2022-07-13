<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends Parent_Model { 
   
      var $nama_tabel = 'm_pegawai';
      var $daftar_field = array('id','nik','nama','alamat','telp','jk','email');
      var $primary_key = 'id';

	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_pegawai(){
       $sql = $this->db->query('select *,case when jk = "L" then "Laki-Laki" else "Perempuan" end as gents from m_pegawai ')->result();
		   $data = array();  
		   $no = 1;
           foreach($sql as $row)  
           {  
                $sub_array = array();  
                 
                $sub_array[] = $row->nik;  
                $sub_array[] = $row->nama;   
                $sub_array[] = $row->alamat; 
                $sub_array[] = $row->telp; 
                $sub_array[] = $row->gents;  
                $sub_array[] = $row->email;     
		    $sub_array[] = ' 
				      <a href="javascript:void(0)" class="btn btn-warning btn-sm waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="nav-icon fas fa-edit"></i> Ubah </a> 
					&nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-sm waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="nav-icon fas fa-trash"></i> Hapus </a>';  
                $sub_array[] = $row->id;
                $data[] = $sub_array;  
                 $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }

    public function fetch_cat_pegawai(){   
       $getdata = $this->db->get('m_cat_pegawai')->result();
       $data = array();  
       $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $no;
                $sub_array[] = $row->deskripsi;   
                $sub_array[] = $row->id;   
                
                $data[] = $sub_array;  
                $no++;
           }  
          
       return $output = array("data"=>$data);
        
    }

  
  
	 
 
}
