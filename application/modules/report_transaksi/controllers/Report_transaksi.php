<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Report_transaksi extends Parent_Controller {
  
	var $nama_tabel = 't_pengajuan';
	var $daftar_field = array('id','kode_pengajuan','id_barang','jumlah','kondisi','keterangan','status','date_submit','id_user');
	var $primary_key = 'id';
   
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_report_transaksi');
 
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
		$data['konten'] = 'report_transaksi/report_transaksi_view';
		$this->load->view('template_view',$data);	 
	}
  
	public function cetak_data(){ 
		$get = $this->db->query("select a.*,case when a.kondisi = 1 then 'Ready' when a.kondisi = 2 then 'Good' else 'Bad' end as kondisinya,
		case when a.status = 1 then 'Pengajuan' when a.kondisi = 2 then 'Perbaikan' else 'Pengembalian' end as statusnya,
		c.username,d.nama,b.kode_barang,b.nama_barang from t_pengajuan a 
		left join m_barang b on b.id = a.id_barang 
		left join m_user c on c.id = a.id_user 
		left join m_pegawai d on d.id = c.id_pegawai")->result(); 
		$data['trans'] = $get;
   			$this->load->library("pdf");
			 
			$this->pdf->setPrintHeader(false);
			$this->pdf->setPrintFooter(true, 'aku', 'kau');
			$this->pdf->SetHeaderData("", "", 'Judul Header', "codedb.co");
			$this->pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
			 // set auto page breaks
			$this->pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
			 // add a page
			$this->pdf->AddPage("L", "A4");
			 // set font
			$this->pdf->SetFont("helvetica", "", 9);
			$html = $this->load->view('report_transaksi/report_transaksi_print', $data, true);

			$this->pdf->writeHTML($html, true, false, true, false, "");
			 ob_end_clean();
			 //$this->pdf->Output("Employee Information.pdf", "I");
			$this->pdf->Output(base_url().'/store_files/laporan_transaksi.pdf', 'I');
 }
	
}
