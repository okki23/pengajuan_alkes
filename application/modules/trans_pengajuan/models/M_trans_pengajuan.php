<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_trans_pengajuan extends Parent_Model { 
    
      var $nama_tabel = 't_pengajuan';
      var $daftar_field = array('id','kode_pengajuan','id_barang','jumlah','kondisi','keterangan','status','date_submit','id_user');
      var $primary_key = 'id';
	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_trans_pengajuan(){
       $sql = "select a.*,case when a.kondisi = 1 then 'Ready' when a.kondisi = 2 then 'Good' else 'Bad' end as kondisinya,
       case when a.status = 1 then 'Pengajuan' when a.kondisi = 2 then 'Perbaikan' else 'Pengembalian' end as statusnya,
       c.username,d.nama,b.kode_barang,b.nama_barang from t_pengajuan a 
       left join m_barang b on b.id = a.id_barang 
       left join m_user c on c.id = a.id_user 
       left join m_pegawai d on d.id = c.id_pegawai";   
		   $getdata = $this->db->query($sql)->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
                 
                $sub_array[] = $row->kode_pengajuan;  
                $sub_array[] = $row->kode_barang;   
                $sub_array[] = $row->nama_barang; 
                $sub_array[] = $row->jumlah;  
                $sub_array[] = $row->kondisinya;  
                $sub_array[] = $row->keterangan; 
                $sub_array[] = $row->statusnya; 
                $sub_array[] = $row->username; 
                $sub_array[] = $row->date_submit;    
		    $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-sm waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="nav-icon fas fa-edit"></i> Ubah </a> 
					&nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-sm waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="nav-icon fas fa-trash"></i> Hapus </a>';  
                $sub_array[] = $row->id;
                $data[] = $sub_array;  
                 $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }

    public function get_no(){
      $query = $this->db->query("SELECT SUBSTR(MAX(kode_pengajuan),-7) AS id  FROM t_pengajuan"); 
      return $query;
   }

    public function fetch_cat_trans_pengajuan(){   
       $getdata = $this->db->get('m_cat_trans_pengajuan')->result();
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
