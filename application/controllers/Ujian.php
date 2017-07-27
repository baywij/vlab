<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ujian extends CI_Controller {

public function index()
	{
		if(!$this->session->userdata('asisten')){
			redirect('beranda');	
		}
		$isi['content'] 		= 'uploadujian/ujian';
		$isi['judul']			= 'Upload Soal Ujian';
		$isi['subjudul']		= '';
		$isi['dashboard']		= '';
		$isi['matkul']			= '';
		$isi['deviden']			= '';
		$isi['sdeviden']		= '';
		$isi['leverage']		= '';
		$isi['sleverage']		= '';
		$isi['tentang']			= '';
		$isi['datapraktikan']	= '';
		$isi['soal']			= '';
		$isi['ujian']			= 'class="active"';
		$isi['datanilai']		= '';
		$isi['data_matkul']		= $this->db->query("SELECT * FROM tbmatkul order by nama_matkul ASC");
		$isi['dataujian']		= $this->db->query("SELECT * from tbujian");
		$key					= $this->session->userdata('kd_asisten');
		$isi['foto']			= $this->db->query("SELECT foto from tbasisten where kd_asisten = '".$key."'");

		$kondisi			= $this->db->query("SELECT status from tbujian where nama_matkul = 'MK2' ");
		foreach ($kondisi->result() as $key ) {
			$status = $key->status;
		}

		if ($status == 'Aktif') {
			$isi['disabled']	= '<input type="submit" name="status" class="btn btn-primary medium" value="Tidak Aktif" >';
		}else{
			$isi['disabled']	= '<input type="submit" name="status" class="btn btn-primary medium" value="Aktif" >';
		}
		$isi['doc']	 = $_SERVER['DOCUMENT_ROOT'];
		$this->load->view('asisten/header_asisten',$isi);
		$this->load->view('asisten/menu_asisten',$isi);
		$this->load->view('asisten/content_asisten',$isi);
		$this->load->view('asisten/footer_asisten');


	}	



	function upload()
	{	
		if(!$this->session->userdata('asisten')){
			redirect('beranda');
		}
	
		$config['upload_path'] 		='./assets/uploads/pdf';
		$config['allowed_types'] 	= 'pdf';
		$config['max_size']			= '1000000';
		$config['max_width']  		= '2000';
		$config['max_height']  		= '2000';
		
		$this->load->library('upload', $config);
		$this->load->model('model_data');
		if ( ! $this->upload->do_upload())
		{
			echo "Gagal Upload";
			$error = array('error' => $this->upload->display_errors());
			
		}
		else
		{	
			$data['upload_data'] 	= $this->upload->data();
			$filename 				= $data['upload_data']['file_name'];
			$kd_ujian				= $this->input->post('kd_ujian');
			$nama_matkul			= $this->input->post('nama_matkul');
			$tipe_soal				= $this->input->post('tipe_soal');
			$status					= $this->input->post('status');
			$this->model_data->uploadujian($kd_ujian,$nama_matkul,$tipe_soal,$status,$filename);
			redirect('ujian');
		}

		
	}

	public function delete()
	{
		$key = $this->uri->segment(3);
		$this->db->where('kd_ujian',$key);
		$query = $this->db->get('tbujian');
		$this->load->model('model_data');
		$this->model_data->deleteujian($key);
		redirect ('ujian');
	}


	function aktifasi()
	{
		
		if(!$this->session->userdata('asisten')){
			redirect('beranda');	
		}
		$kondisi				= $this->db->query("SELECT status from tbujian where nama_matkul = 'MK2' ");
		foreach ($kondisi->result() as $key ) {
			$status = $key->status;
		}

		if ($status == 'Aktif') {
			$isi['disabled']	= '<input type="submit" name="status" class="btn btn-primary medium" value="Tidak Aktif" >';
		}
		if ($status == 'Tidak Aktif') {
			$isi['disabled']	= '<input type="submit" name="status" class="btn btn-primary medium" value="Aktif" >';
		}
		
		if ($status == 'Tidak Aktif') {
			$this->db->query("UPDATE tbujian set status = 'Aktif' where nama_matkul = 'MK2' ");
		}else
		{
			$this->db->query("UPDATE tbujian set status = 'Tidak Aktif' where nama_matkul = 'MK2'");
		}
		redirect('ujian');
}

}