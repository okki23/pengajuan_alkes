<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Member extends Parent_Controller {
 
  var $nama_tabel = 'm_member';
  var $daftar_field = array('id','no_reg','nama','tgl_daftar','jenkel','telp','alamat','usia','tinggi','berat_badan','lemak_tubuh','kadar_air','masa_otot','kalori','usia_sel','masa_tulang','lemak_perut');
  var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_member'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}

	 
	 public function get_last_id(){
		$params = date('Ymd');
		echo $this->transaksi_id($params);   

	}

	public function transaksi_id($param = '') {
        $data = $this->m_member->get_no();
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
	
 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'member/member_view';
		$this->load->view('template_view',$data);		
   
	} 

  	public function fetch_member(){  
       $getdata = $this->m_member->fetch_member();
       echo json_encode($getdata);   
  	}
  	  
	  public function print()
	  {
		  $pdf = new \TCPDF();
		  $pdf->AddPage('L', 'mm', 'A4');
		  $pdf->SetFont('', 'B', 14);
		  $pdf->Cell(277, 10, "DAFTAR PEGAWAI AYONGODING.COM", 0, 1, 'C');
		  $pdf->SetAutoPageBreak(true, 0);
		  // Add Header
		  $pdf->Ln(10);
		  $pdf->SetFont('', 'B', 12);
		  $pdf->Cell(20, 8, "No", 1, 0, 'C');
		  $pdf->Cell(100, 8, "Nama Pegawai", 1, 0, 'C');
		  $pdf->Cell(120, 8, "Alamat", 1, 0, 'C');
		  $pdf->Cell(37, 8, "Telp", 1, 1, 'C');
		  $pdf->SetFont('', '', 12);
		  $pegawai = $this->db->get('m_member')->result();
		  $no=0;
		  foreach ($pegawai as $data){
			  $no++;
			  $pdf->Cell(20,8,$no,1,0, 'C');
			  $pdf->Cell(100,8,$data->nama,1,0);
			  $pdf->Cell(120,8,$data->alamat,1,0);
			  $pdf->Cell(37,8,$data->telp,1,1);
		  }
		  $pdf->SetFont('', 'B', 10);
		  $pdf->Cell(277, 10, "Laporan Pdf Menggunakan Tcpdf, Instalasi Tcpdf Via Composer", 0, 1, 'L');
		  $pdf->Output('Laporan-Tcpdf-CodeIgniter.pdf'); 
	  }

	public function get_data_edit(){
		$id = $this->uri->segment(3);
		$sql = $this->db->query('select *, CASE jenkel
		WHEN 1 THEN "Pria" 
		ELSE "Wanita"
		END as "gents" from m_member')->row(); 
		echo json_encode($sql,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
    	$delete = $this->db->where('id',$id)->delete('m_member');
    	 
    	if($delete){
    		$result = array("response"=>array('message'=>'success'));	
	    }else{
	    	$result = array("response"=>array('message'=>'failed'));
	    }
 
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){
    
    
    $data_form = $this->m_member->array_from_post($this->daftar_field);

    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 
	$data_form['tgl_daftar'] = date('Y-m-d');
 
    $simpan_data = $this->m_member->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
 
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}

 


}
