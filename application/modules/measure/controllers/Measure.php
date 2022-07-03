<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Measure extends Parent_Controller {
 
	var $nama_tabel = 'm_measure';
	var $daftar_field = array('id','ukuran');
	var $primary_key = 'id';

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_measure'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}

 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'measure/measure_view'; 
		$this->load->view('template_view',$data);		
   
	}
 
 
  	public function fetch_measure(){  
       $getdata = $this->m_measure->fetch_measure();
       echo json_encode($getdata);   
 	}  
	 
	public function get_data_edit(){
		$id = $this->uri->segment(3); 
		$get = $this->db->where('id',$id)->get($this->nama_tabel)->row();
		echo json_encode($get,TRUE);
	}
	
  	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
     
  		$sqlhapus = $this->m_measure->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
 
	public function simpan_data_measure(){
		$data_form = $this->m_measure->array_from_post(array('id','ukuran'));
		$id = $data_form['id'];	 
	  
		if($id == '' || empty($id)){ 
				 
				return $this->db->query("insert into m_measure set ukuran = '".$data_form['ukuran']."' ");
		   
		}else{
 
				return $this->db->query("update m_measure set ukuran = '".$data_form['ukuran']."'   where id = '".$id."' ");
			 

		}

	 
		
	}
       


}
