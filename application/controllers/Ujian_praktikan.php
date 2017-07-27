<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ujian_praktikan extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','download'));				
	}

public function index()
	{
		if(!$this->session->userdata('praktikan')){
			redirect('beranda');	
		}
		$isi['content']			= 'ujian/index';
		$isi['judul']			= 'Ujian';
		$isi['subjudul']		= '';
		$isi['dashboard']		= '';
		$isi['lappendahuluan']	= '';
		$isi['lpmk2']			= '';
		$isi['lpor2']			= '';
		$isi['lpinterjar']		= '';
		$isi['lpecom']			= '';
		$isi['tugasakhir']		= '';
		$isi['tamk2']			= '';
		$isi['taro2']			= '';
		$isi['tainterjar']		= '';
		$isi['taecom']			= '';
		$isi['tentang']			= '';
		$isi['ujian']			= '"class = active "';
		$key					= $this->session->userdata('npm');
		$isi['foto']			= $this->db->query("SELECT foto from tbpraktikan where npm = '".$key."'");
		$isi['menu_logic']		= $this->db->query("SELECT kelas FROM tbpraktikan where npm = '".$key."'");
		

		$kondisi			= $this->db->query("SELECT status from tbujian where nama_matkul = 'MK2' ");
		foreach ($kondisi->result() as $key ) {
			$status = $key->status;
		}

		if ($status == 'Aktif') {
			$isi['disabled']	= 'class="btn btn-primary btn-sm "';
		}else{
			$isi['disabled']	= 'class="btn btn-primary btn-sm disabled"';
		}


		$this->load->view('praktikan/header_praktikan',$isi);
		$this->load->view('praktikan/menu_praktikan',$isi);
		$this->load->view('praktikan/content_praktikan',$isi);
		$this->load->view('praktikan/footer_praktikan');
	}


	public function downloadujian()
	{
    	$this->load->helper('download');
    	$name 		= 'UJIAN.pdf';
 		$soal 		= $this->db->query('SELECT file from tbujian where nama_matkul = "MK2" order by rand() limit 1');

 		foreach ($soal->result() as $value) {
 			$file	= $value->file;
 		}
 		$data 		= file_get_contents('assets/uploads/pdf/'.$file.''); 
 		force_download($name,$data);
    	 
    }

}