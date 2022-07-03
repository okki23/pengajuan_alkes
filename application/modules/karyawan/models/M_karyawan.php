<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends Parent_Model { 
   
      var $nama_tabel = 'm_karyawan';
      var $daftar_field = array('id','nip','nama','no_hp','alamat','tinggi_badan','jenkel','email','id_jabatan');
      var $primary_key = 'id';

	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_karyawan(){
       $sql = "select a.*,b.nama_jabatan,
                  CASE a.jenkel
                  WHEN 1 THEN 'Pria' 
                  ELSE 'Wanita'
                  END as 'gents' from m_karyawan a
                  left  join m_jabatan b on b.id = a.id_jabatan";   
		   $getdata = $this->db->query($sql)->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
                 
                $sub_array[] = $row->nip;  
                $sub_array[] = $row->nama;   
                $sub_array[] = $row->no_hp; 
                $sub_array[] = $row->gents; 
                $sub_array[] = $row->nama_jabatan; 
                $sub_array[] = $row->tinggi_badan. " cm";  
                $sub_array[] = $row->alamat;
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

    public function fetch_cat_karyawan(){   
       $getdata = $this->db->get('m_cat_karyawan')->result();
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
