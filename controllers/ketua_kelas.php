<?php 

class Ketua_kelas extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('m_siswa');
		// $this->load->library('upload');
		// $this->load->helper('date');
	
		if ($this->session->userdata('role_id_fk')!='4')
		{
	 		redirect(base_url('loginuser'));
	 	} 

	}
	public function index()
	{ 
		$id_detail = $this->session->userdata('ketua_kelas');
		$id_kelas = $this->session->userdata('id_kelas');
		
		$tahun = $this->session->userdata('tahun_ajaran');
		$semester=$this->session->userdata('semester');


		$hari = date ("D");
		$hariindonesia = "";
		 
		 if($hari == 'Sat'){

		 	$hariindonesia = "Sabtu";
		 }
		 elseif ($hari == 'Sun') {
		 	$hariindonesia = "Minggu";
		 }
		 elseif ($hari == 'Mon') {
		 	$hariindonesia = "Senin";
		 }
		 elseif ($hari == 'Tue') {
		 	$hariindonesia = "Selasa";
		 }
		 elseif ($hari == 'Wed' ) {
		 	$hariindonesia = "Rabu";
		 }
		 elseif ($hari == 'Thu') {
		 	$hariindonesia = "Kamis";
		 }elseif ($hari == 'Fri') {
		 	$hariindonesia = "Jumat";
		 }

		 $row = $this->m_siswa->get_users($id_detail);
		$data['val_absen'] = $row->opsi_buka_absen;

		$row2 = $this->m_siswa->get_kelas($id_detail,$tahun);
		$id_kelas = $row2['id_kelas']; 
		$data['kelas'] = $row2['nama_kelas']; 
		$data['siswa'] = $this->m_siswa->tampil_namasiswa($id_kelas,$tahun)->result();
		$data['jadwalll'] = $this->m_siswa->tampil_jadwalll($id_kelas,$tahun,$semester,$hariindonesia)->result();
		$data['keterangan_presensi'] = $this->m_siswa->tampil_keterangan()->result();
		$data['content']   =  'view_siswa/input_presensi_siswa';
        $this->load->view('templates_siswaadmin/templates_siswaadmin',$data); 
	}

	public function tambah_presensi12()
	{


			$tanggal   = $this->input->post('tgl');
			$id_jadwal = $this->input->post('id_jadwal');
			$modul_pembahasan = $this->input->post('modul_pembahasan');
			$cekguru = $this->input->post('kd_keterangan_guru_fk');
			$keterangan = $this->input->post('keterangan');
			$cekpresensi  = $this->m_siswa->cek_absens($id_jadwal,$tanggal);
				
			if($cekpresensi < 1){

			$nm = $this->input->post('id_siswa');
			$id_jadwal = $this->input->post('id_jadwal');
			$tanggal = $this->input->post('tgl');

		    $result = array();
		    foreach($nm AS $key => $val){
		    	$id = $_POST['id_siswa'][$key];
			    $result[] = array(
				    "tgl"  => $tanggal,
				    "kd_keterangan_fk"  => $_POST['kd_keterangan-'.$id],
				    "id_jadwal_fk"  => $id_jadwal,
				    "modul_pembahasan" => $modul_pembahasan,
				    "id_siswa_fk"  => $_POST['id_siswa'][$key]
			    );
				  
			}

			$dataketeranganguru = array(
			'tgl' => $this->input->post('tgl'),
			'id_jadwal_fk' => $this->input->post('id_jadwal'),
			'kd_keterangan_guru_fk' => $this->input->post('id_keterangan_guru'),
			'keterangan' => $this->input->post('keterangan')
			
			);
		
			$this->m_siswa->insert_multiple($result);
			$this->m_siswa->insert_keterangan_guru($dataketeranganguru);
			$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"> Berhasil Dibuat! </div>');
			redirect('ketua_kelas/index');
		}
		else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Data Presensi Sudah Ada </div>');
			redirect('ketua_kelas/index');
		}
    }






}
 ?>