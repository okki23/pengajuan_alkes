<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Trans_pengajuan extends Parent_Controller {
  

  var $nama_tabel = 't_pengajuan';
  var $daftar_field = array('id','kode_pengajuan','id_user','status','keterangan','date_submit');
  var $primary_key = 'id';
 
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_trans_pengajuan');
 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	} 

	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'trans_pengajuan/trans_pengajuan_view';
		$this->load->view('template_view',$data);	 
	}
 
  	public function fetch_trans_pengajuan(){  
       $getdata = $this->m_trans_pengajuan->fetch_trans_pengajuan();
       echo json_encode($getdata);   
  	}  

  

	public function get_data_edit(){
		$id = $this->uri->segment(3); 
		$sql = "select a.*,b.nama_jabatan from m_trans_pengajuan a
		left join m_jabatan b on b.id = a.id_jabatan where a.id = '".$id."' "; 
		$get = $this->db->query($sql)->row();
		echo json_encode($get,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);   
    	$sqlhapus = $this->m_trans_pengajuan->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){
    
    
    $data_form = $this->m_trans_pengajuan->array_from_post($this->daftar_field);
 
    $id = isset($data_form['id']) ? $data_form['id'] : NULL;  

    $simpan_data = $this->m_trans_pengajuan->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
    
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}
   
	public function get_last_id(){
		$params = date('Ymd');
		echo $this->transaksi_id($params);   

	}

	public function transaksi_id($param = '') {
        $data = $this->m_trans_pengajuan->get_no();
        $lastid = $data->row();
        $idnya = $lastid->id;


        if($idnya == '') { // bila data kosong
            $ID = $param . "0000001";
            //00000001
        }else {
            $MaksID = $idnya;
            $MaksID++;
            if ($MaksID < 10)
                $ID = $param . "000000" . $MaksID;
            else if ($MaksID < 100)
                $ID = $param . "00000" . $MaksID;
            else if ($MaksID < 1000)
                $ID = $param . "0000" . $MaksID;
            else if ($MaksID < 10000)
                $ID = $param . "000" . $MaksID;
            else if ($MaksID < 100000)
                $ID = $param . "00" . $MaksID;
            else if ($MaksID < 1000000)
                $ID = $param . "0" . $MaksID;
            else
                $ID = $MaksID;
        }

        return $ID;
    }  	
	
}
