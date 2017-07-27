<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index (){
	}
	public function asisten(){
		if(!$this->session->userdata('asisten')){
			redirect('login');
		}
		$isi['content'] 		= 'asisten/profile';
		$isi['judul']			= 'Info Profile' ;
		$isi['subjudul']		= '';
		$isi['dashboard']		= '';
		$isi['matkul']			= '';
		$isi['deviden']			= '';
		$isi['leverage']		= '';
		$isi['sdeviden']		= '';
		$isi['sleverage']		= '';
		$isi['tentang']			= '';
		$isi['datapraktikan']	= '';
		$isi['soal']			= '';
		$isi['ujian']			= '';
		$isi['datanilai']		= '';
		$isi['data_matkul']		= $this->db->query("SELECT * FROM tbmatkul order by nama_matkul ASC");
		$key					= $this->session->userdata('kd_asisten');
		$isi['foto']			= $this->db->query("SELECT foto from tbasisten where kd_asisten = '".$key."'");
		$this->load->view('asisten/header_asisten',$isi);
		$this->load->view('asisten/menu_asisten',$isi);
		$this->load->view('asisten/content_asisten',$isi);
		$this->load->view('asisten/footer_asisten');
	}

	public function praktikan(){
		if(!$this->session->userdata('praktikan')){
			redirect('beranda');
		}
		$isi['content'] 		= 'praktikan/profile';
		$isi['judul']			= 'Info Profile';
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
		$isi['ujian']			= '';
		$key					= $this->session->userdata('npm');
		$isi['foto']			= $this->db->query("SELECT foto from tbpraktikan where npm = '".$key."'");
		$isi['menu_logic']		= $this->db->query("SELECT kelas FROM tbpraktikan");
		
		$this->load->view('praktikan/header_praktikan',$isi);
		$this->load->view('praktikan/menu_praktikan',$isi);
		$this->load->view('praktikan/content_praktikan',$isi);
		$this->load->view('praktikan/footer_praktikan');
	}

	public function admin()
	{
		if(!$this->session->userdata('asisten')){
			redirect('dashboard');
		}
		$isi['content'] = 'admin/profile';
		$isi['judul'] = 'Info Profile';
		$isi['subjudul'] = '';
		$isi['dashboard'] = 'class="active"';
		$isi['databerita'] = '';
		$isi['datamodul'] = '';
		$isi['dataasisten'] = '';
		$isi['tentang'] = '';
		
		$this->load->view('admin/header_admin',$isi);
		$this->load->view('admin/menu_admin',$isi);
		$this->load->view('admin/content_admin',$isi);
		$this->load->view('admin/footer_admin');
	}

	function updateavatarpraktikan()
	{	
		if(!$this->session->userdata('praktikan')){
			redirect('beranda');
		}
	
		$config['upload_path'] 		='C:\xampp\htdocs\pi\assets\uploads\images';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '100000';
		$config['max_width']  		= '2000';
		$config['max_height']  		= '2000';
		$key						= $this->session->userdata('npm');
		$this->load->library('upload', $config);
		$this->load->model('model_data');
		if ( ! $this->upload->do_upload())
		{
		
			$error = array('error' => $this->upload->display_errors());
			$isi['content'] 		= 'praktikan/profile';
			$isi['judul']			= 'Info Profile';
			$isi['subjudul']		= '';
			$isi['dashboard']		= '';
			$isi['lappendahuluan']	= '';
			$isi['tdeviden']		= '';
			$isi['tleverage']		= '';
			$isi['materi']			= '';
			$isi['mdeviden']		= '';
			$isi['mleverage']		= '';
			$isi['software']		= '';
			$isi['sdeviden']		= '';
			$isi['sleverage']		= '';
			$isi['tentang']			= '';
			$isi['ujian']			= '';
			$key					= $this->session->userdata('npm');
			$isi['foto']			= $this->db->query("SELECT foto from tbpraktikan where npm = '".$key."'");
			$this->load->view('praktikan/header_praktikan',$isi);
			$this->load->view('praktikan/menu_praktikan',$isi);
			$this->load->view('praktikan/content_praktikan',$isi);
			$this->load->view('praktikan/footer_praktikan');
		}
		else
		{	
			$data['upload_data'] = $this->upload->data();
			$filename = $data['upload_data']['file_name'];
			$this->model_data->updateavatarpraktikan($filename,$key);
			// $data = array('upload_data' => $this->upload->data());
			//$this->load->view('upload_sukses',$data);
			$isi['content'] 		= 'praktikan/profile';
			$isi['judul']			= 'Info Profile';
			$isi['subjudul']		= '';
			$isi['dashboard']		= '';
			$isi['lappendahuluan']	= '';
			$isi['tdeviden']		= '';
			$isi['tleverage']		= '';
			$isi['materi']			= '';
			$isi['mdeviden']		= '';
			$isi['mleverage']		= '';
			$isi['software']		= '';
			$isi['sdeviden']		= '';
			$isi['sleverage']		= '';
			$isi['tentang']			= '';
			$isi['ujian']			= '';
			$key					= $this->session->userdata('npm');
			$isi['foto']			= $this->db->query("SELECT foto from tbpraktikan where npm = '".$key."'");
			$this->load->view('praktikan/header_praktikan',$isi);
			$this->load->view('praktikan/menu_praktikan',$isi);
			$this->load->view('praktikan/content_praktikan',$isi);
			$this->load->view('praktikan/footer_praktikan');
		}

		
	}


	function updateavatarasisten()
	{	
		if(!$this->session->userdata('asisten')){
			redirect('beranda');
		}
	
		$config['upload_path'] 		='C:\xampp\htdocs\pi\assets\uploads\images';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '100000';
		$config['max_width']  		= '2000';
		$config['max_height']  		= '2000';
		$key						= $this->session->userdata('kd_asisten');
		$this->load->library('upload', $config);
		$this->load->model('model_data');
		if ( ! $this->upload->do_upload())
		{
		
			$error = array('error' => $this->upload->display_errors());
			$isi['content'] 		= 'asisten/profile';
			$isi['judul']			= 'Info Profile';
			$isi['subjudul']		= '';
			$isi['dashboard']		= '';
			$isi['deviden']			= '';
			$isi['leverage']		= '';
			$isi['sdeviden']		= '';
			$isi['sleverage']		= '';
			$isi['tentang']			= '';
			$isi['datapraktikan']	= '';
			$isi['soal']			= '';
			$isi['ujian']			= '';
			$key					= $this->session->userdata('kd_asisten');
			$isi['foto']			= $this->db->query("SELECT foto from tbasisten where kd_asisten = '".$key."'");
			$this->load->view('asisten/header_asisten',$isi);
			$this->load->view('asisten/menu_asisten',$isi);
			$this->load->view('asisten/content_asisten',$isi);
			$this->load->view('asisten/footer_asisten');
		}
		else
		{	
			$data['upload_data'] = $this->upload->data();
			$filename = $data['upload_data']['file_name'];
			$this->model_data->updateavatarasisten($filename,$key);
			// $data = array('upload_data' => $this->upload->data());
			//$this->load->view('upload_sukses',$data);
			$isi['content'] 		= 'asisten/profile';
			$isi['judul']			= 'Info Profile';
			$isi['subjudul']		= '';
			$isi['dashboard']		= '';
			$isi['deviden']			= '';
			$isi['leverage']		= '';
			$isi['sdeviden']		= '';
			$isi['sleverage']		= '';
			$isi['tentang']			= '';
			$isi['datapraktikan']	= '';
			$isi['soal']			= '';
			$isi['ujian']			= '';

			$key					= $this->session->userdata('kd_asisten');
			$isi['foto']			= $this->db->query("SELECT foto from tbasisten where kd_asisten = '".$key."'");
			$this->load->view('asisten/header_asisten',$isi);
			$this->load->view('asisten/menu_asisten',$isi);
			$this->load->view('asisten/content_asisten',$isi);
			$this->load->view('asisten/footer_asisten');
		}

		
	}
}