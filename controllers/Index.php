<?php 

class Index extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('m_siswa');
	}
	public function index()
	{ 
		
		$data['hadir'] = $this->m_siswa->counthadir();
		$data['sakit'] = $this->m_siswa->countsakit();
		$data['izin'] = $this->m_siswa->countizin();
		$data['absen'] = $this->m_siswa->countabsen();
		$data['dispensasi'] = $this->m_siswa->countdispensasi();
		$data['all'] = $this->m_siswa->countall();
		$data['siswa'] = $this->m_siswa->tampil_presensi();
		$this->load->view('view_awal/index', $data);
		
	}

	// public function lihat_presensi() 
	// {

	
		
	// 	$this->load->view('view_awal/index',$data);
		
	// }
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('index'));
	}

}


 ?>