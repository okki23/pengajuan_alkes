<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Trans_pengajuan extends Parent_Controller {
  

  var $nama_tabel = 't_pengajuan';
  var $daftar_field = array('id','kode_pengajuan','id_barang','jumlah','kondisi','keterangan','status','date_submit','id_user');
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
		// echo $this->session->userdata('userid'); 
		// die();
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
		$sql = "select a.*,case when a.kondisi = 1 then 'Ready' when a.kondisi = 2 then 'Good' else 'Bad' end as kondisinya,
		case when a.status = 1 then 'Pengajuan' when a.kondisi = 2 then 'Perbaikan' else 'Pengembalian' end as statusnya,
		c.username,d.nama,b.kode_barang,b.nama_barang from t_pengajuan a 
		left join m_barang b on b.id = a.id_barang 
		left join m_user c on c.id = a.id_user 
		left join m_pegawai d on d.id = c.id_pegawai
		 where a.id = '".$id."' "; 
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
	$data_form['date_submit'] = date('Y-m-d');
	$data_form['id_user'] = $this->session->userdata('userid');
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

	
	public function cetak_data(){
		$id = $this->uri->segment(3); 
		$get = $this->db->query("select a.*,b.no_reg,b.*,case when b.jenkel = 1 then 'Pria' else 'Wanita' end as gents, c.max as maxbmi,c.min as minbmi,c.reason as reasonbmi,
		d.option as optionbone,
		e.min as minfat,e.max as maxfat,e.reason as reasonfat,
		f.min as minmuscle,f.max as maxmuscle,f.reason as reasonmuscle,
		g.min as minvfr,g.max as maxvfr,g.reason as reasonvfr,
		h.min as mincalori,h.max as maxcalori,h.reason as reasoncalori,case when h.jk = 1 then 'Pria' else 'Wanita' end as jkcalori,
		i.min as minwater,i.max as maxwater,i.reason as reasonwater,case when i.jk = 1 then 'Pria' else 'Wanita' end as jkwater 
		from t_perhitungan a
		left join m_member b on b.id = a.id_member
		left join bmi_setting c on c.id = a.id_bmi
		left join bone_setting d on d.id = a.id_bone
		left join fat_setting e on e.id = a.id_fat
		left join muscle_setting f on f.id = a.id_muscle
		left join vfr_setting g on g.id = a.id_vfr
		left join calori_setting h on h.id = a.id_calori
		left join water_setting i on i.id = a.id_water
		where a.id  = '".$id."' ")->row(); 
		$data['trans'] = $get;
   			$this->load->library("pdf");
			 
			$this->pdf->setPrintHeader(false);
			$this->pdf->setPrintFooter(true, 'aku', 'kau');
			$this->pdf->SetHeaderData("", "", 'Judul Header', "codedb.co");
			$this->pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
			 // set auto page breaks
			$this->pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
			 // add a page
			$this->pdf->AddPage("P", "A4");
			 // set font
			$this->pdf->SetFont("helvetica", "", 9);
			$html = $this->load->view('calculate/calculate_print', $data, true);

			$this->pdf->writeHTML($html, true, false, true, false, "");
			 ob_end_clean();
			 //$this->pdf->Output("Employee Information.pdf", "I");
			$this->pdf->Output(base_url().'/store_files/filename.pdf', 'I');
 }
	
}
