<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Report_barang extends Parent_Controller {
  
	var $nama_tabel = 'm_barang';
	var $daftar_field = array('id','kode_barang','nama_barang','qty','kondisi');
	var $primary_key = 'id'; 
	
 
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_report_barang');
 
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
		$data['konten'] = 'report_barang/report_barang_view';
		$this->load->view('template_view',$data);	 
	}
  
	public function cetak_data(){ 
		$get = $this->db->get($this->nama_tabel)->result(); 
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
			$html = $this->load->view('report_barang/report_barang_print', $data, true);

			$this->pdf->writeHTML($html, true, false, true, false, "");
			 ob_end_clean();
			 //$this->pdf->Output("Employee Information.pdf", "I");
			$this->pdf->Output(base_url().'/store_files/laporan_barang.pdf', 'I');
 }
	
}
