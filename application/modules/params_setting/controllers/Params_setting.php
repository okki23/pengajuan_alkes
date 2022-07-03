<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Params_setting extends Parent_Controller {
 
  var $nama_tabel = 'fat_setting';
  var $daftar_field = array('id','params_settingname','password','id_pegawai','level');
  var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_params_setting'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}

 
	public function index(){
		$parse = 20;
		$rel = $this->db->get($this->nama_tabel)->result();

		//get params 1
			$params1 = $this->db->where('id',1)->get($this->nama_tabel)->row();
			// echo $params1->min. " - ".$params1->max;

			if($parse >= $params1->min && $parse <= $params1->max){
				echo $params1->reason;
			}elseif($parse >= $params1->min && $parse <= $params1->max){
				
			}
		//get params 2

		//get params 3

		//get params 4

		//get params 5
		// foreach($rel as $k){ 
		// 	if($parse >= $k->min && $parse <= $k->max){
		// 		echo 'A';
		// 	}
		// }
		// echo 1;
		// $data['judul'] = $this->data['judul']; 
		// $data['konten'] = 'params_setting/params_setting_view'; 
		// $this->load->view('template_view',$data);		
   
	}
 
 
  	public function fetch_params_setting(){  
       $getdata = $this->m_params_setting->fetch_params_setting();
       echo json_encode($getdata);   
 	}  
	 
	public function get_data_edit(){
		$id = $this->uri->segment(3); 
		$get = $this->db->query("select a.*,b.nama from m_params_setting a
		left join m_karyawan b on b.id = a.id_pegawai WHERE a.id = '".$id."' ")->row();
		echo json_encode($get,TRUE);
	}
	
  	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
     
  		$sqlhapus = $this->m_params_setting->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
 
	public function simpan_data_params_setting(){
		$data_form = $this->m_params_setting->array_from_post(array('id','params_settingname','password','id_pegawai','level'));
		$id = $data_form['id'];	 
	 
		//apabila params_setting id kosong maka input data baru
		if($id == '' || empty($id)){ 
				 
				return $this->db->query("insert into m_params_setting set params_settingname = '".$data_form['params_settingname']."', password = '".base64_encode($data_form['password'])."', id_pegawai = '".$data_form['id_pegawai']."', level = '".$data_form['level']."' ");
		  

		//apabila params_setting id tersedia maka update data
		}else{

			if($data_form['password'] == '' || empty($data_form['password'])){
				 
				return $this->db->query("update m_params_setting set params_settingname = '".$data_form['params_settingname']."',  id_pegawai = '".$data_form['id_pegawai']."', level = '".$data_form['level']."'  where id = '".$id."' ");
		 
			}else{
				 
				return $this->db->query("update m_params_setting set params_settingname = '".$data_form['params_settingname']."',password = '".base64_encode($data_form['password'])."', id_pegawai = '".$data_form['id_pegawai']."', level = '".$data_form['level']."'  where id = '".$id."' ");
			}

		}

	 
		
	}
       


}
