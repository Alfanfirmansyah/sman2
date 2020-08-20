<?php 
class Guru extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model('m_guru');
		$this->load->model('m_data');
        $this->load->helper('date');
      //  $this->load->model('m_wali');

	
		if ($this->session->userdata('role_id_fk')!='2')
		{
	 		redirect(base_url('loginuser'));

	 	} 
	}
	public function index()
	{ 

        $tgl = "%Y-%m-%d";
		$data = array(

			'judul' => 'dashboard guru'
		);
			
		$tahun = $this->session->userdata('tahun_ajaran');
	    $semester = $this->session->userdata('semester');
		$data['graph'] = $this->m_data->graph($tahun,$semester);
		$data['hadir'] = $this->m_data->counthadir($tahun,$semester);
		$data['sakit'] = $this->m_data->countsakit($tahun,$semester);
		$data['izin'] = $this->m_data->countizin($tahun,$semester);
		$data['absen'] = $this->m_data->countabsen($tahun,$semester);
		$data['dispensasi'] = $this->m_data->countdispensasi($tahun,$semester);
		$data['all'] = $this->m_data->countall($tahun,$semester);

		$data['users'] = $this->m_data->countuser();
		$data['guru'] = $this->m_data->countguru();
		$data['wali_kelas'] = $this->m_data->countwali($tahun,$semester);
		$data['siswa'] = $this->m_data->countsiswa($tahun,$semester);
		$id_guru = $this->session->userdata('id_guru');
		$row = $this->m_guru->tampilhadirsemua($id_guru,$tgl);
		$data['total']          = $row->total;
		$data['presensikehadiran'] = $this->m_guru->tampilhadir($id_guru,$tgl);
		$data['content']   =  'view_guru/dashboard';
        $this->load->view('templates_guru/templates_guru',$data); 
	}
		// public function nickname($id)
	// {
		

	// 	$data['guru'] = $this->m_guru->tampil_nickname($id);
	// 	$data['judul'] = 'biodata pribadi';

	// 	$this->load->view('templates_guru/header_guru');
	// 	$this->load->view('view_guru/dashboard',$data);
	// 	$this->load->view('templates_guru/footer_guru');

	// }
	
	public function bio_guru($id)//fix
	{
		

		$data['guru'] = $this->m_guru->tampil_guru($id);
		$data['judul'] = 'biodata pribadi';
		$data['content']   =  'view_guru/biodata_guru';
        $this->load->view('templates_guru/templates_guru',$data); 

		

	}
	// public function edit_guru($id)
	// {


	// 	$data['guru'] = $this->m_guru->edit_guru($id);

	// 	$this->load->view('templates_guru/header_guru',$data);
	// 	$this->load->view('view_guru/edit_guru', $data);
	// 	$this->load->view('templates_guru/footer_guru', $data);
		
	// }
	// public function update_guru()
	// {
	
	// 	$kode2 = $this->input->post('kode');
	// 	$nama_guru = $this->input->post('nama_guru');
	// 	$jk = $this->input->post('jk');
	// 	$nip = $this->input->post('nip');
	// 	$alamat = $this->input->post('alamat');
	// 	$no_hp = $this->input->post('no_hp');
		

	 
	// 	$data = array(
			
	// 		'nama_guru'=> $nama_guru,
	// 		'jk'=> $jk,
	// 		'nip' => $nip,
	// 		'alamat'=> $alamat,
	// 		'no_hp' => $no_hp,
		

	// 	);
	 
		
	 
	// 	$this->m_guru->update_guru($kode2,$data);
	// 	redirect('guru/bio_guru/'.$this->session->userdata('id'));
	
		
	// }
	public function edit_pass($id)//fix
	{

			//$where = array('id' => $id );

		$data['login'] = $this->m_guru->edit_pass($id);
		$data['content']   =  'view_guru/edit_pass';
        $this->load->view('templates_guru/templates_guru',$data); 


	}
	public function update_pass()//fix
	{
	
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$password = md5($pass);
		
		$data = array(
			'username' => $username,
			'password' => $password,
			

		);
	 
	 
		$this->m_guru->update_pass($data, $id);
		$this->session->set_flashdata('hehe','<div class="alert alert-info" role="alert">Password berhasil diubah, silahkan login kembali! </div>');
		redirect('loginuser');
	
		
	}
	
	// CONTROLLER PRESENSI


// presensi 12

	public function lihat_presensi12()//fix 
	{
	$tahun = $this->session->userdata('tahun_ajaran');
	$semester = $this->session->userdata('semester');

	// $tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja
	// $semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester

	$id_guru = $this->session->userdata('id_guru');
	
	$data['presensi'] = $this->m_guru->tampil_presensi3($tahun,$id_guru,$semester);
	$data['content']   =  'view_guru/detail_presensi3';
    $this->load->view('templates_guru/templates_guru',$data); 

	}

	public function daftarkelas_presensi3()//fix
	{
		$tahun = $this->session->userdata('tahun_ajaran');
		$semester = $this->session->userdata('semester');
		$id_guru = $this->session->userdata('id_guru');
		$data['rombel'] = $this->m_guru->tampil_rombelpresensi3($tahun,$id_guru,$semester);
	
		// $data['guru'] = $this->m_data->tampil_guruu()->result();
		// $data['mata_pelajaran'] = $this->m_data->tampil_detailj()->result();
		$data['content']   =  'view_guru/daftarkelas_presensi3';
		$this->load->view('templates_guru/templates_guru',$data);


	}
	
	public function input_presensi12()
	{


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

		$tahun = $this->session->userdata('tahun_ajaran');
		$semester = $this->session->userdata('semester');
		// $tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

		// $semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester

		$id_guru = $this->session->userdata('id_guru');
		$row = $this->m_guru->get_users($id_guru);
		$data['val_absen'] = $row->opsi_buka_absen;

		$urikelas = $this->uri->segment(4);
		$id_kelas_fk = $this->uri->segment(3); // mengambil get url urutan slice ke 3
		$data['kelas'] = urldecode($urikelas);
		$id_kelas = $id_kelas_fk;

		$data['siswa'] = $this->m_guru->tampil_namasiswa($id_kelas,$tahun)->result();
		$data['jadwalll'] = $this->m_guru->tampil_jadwalll($id_kelas,$id_guru,$tahun,$semester,$hariindonesia)->result();
		$data['keterangan_presensi'] = $this->m_guru->tampil_keterangan()->result();

		
		$data['hariindonesia'] = $hariindonesia;
		

		$data['content']   =  'view_guru/inputpresensi12';
   		$this->load->view('templates_guru/templates_guru',$data);
	
		

	}

	public function tambah_presensi12()
	{

	
			$tanggal   = $this->input->post('tgl');
			$id_jadwal = $this->input->post('id_jadwal');
			$modul_pembahasan = $this->input->post('modul_pembahasan');
			//$cekguru = $this->input->post('kd_keterangan_guru_fk');

			$cekpresensi  = $this->m_guru->cek_absens($id_jadwal,$tanggal);
				
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
		
			$this->m_guru->input_presensi12($result);
			$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"> Berhasil Dibuat! </div>');
			redirect('guru/lihat_presensi12');
		}
		else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Data Presensi Sudah Ada </div>');
			redirect('guru/lihat_presensi12');
		}
    }
		
	public function edit_presensi12($id_presensi)
	{
		
		$id_prensensi = $this->uri->segment(3);
		$data['siswa'] = $this->m_guru->eTampilPresensi($id_presensi);
		$data['keterangan_presensi'] = $this->m_guru->tampil_keterangan()->result();

			$data['content']   =  'view_guru/edit_presensi12';
   		$this->load->view('templates_guru/templates_guru',$data);

	

	}
		public function update_presensi12()
	{
	
		$config['upload_path']      = 'foto/presensi/';
            $config['allowed_types']    = 'gif|jpg|png';
            $config['max_size']         = '2000';
            $config['max_width']        = '3000';
            $config['max_height']       = '3000';       
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('gambar')){
                    $gambar="";
                    $error = $this->upload->display_errors();
                }else{
                    $gambar=$this->upload->file_name;
                }

		$kd_keterangan = $this->input->post('kd_keterangan');
		$id_presensi = $this->input->post('id_presensi');
	 
		$data = array(

			'kd_keterangan_fk' => $kd_keterangan,
			'foto' => $gambar

		);
	 
		
		
	 
		$this->m_guru->update_presensi12( $id_presensi,$data);
		redirect('guru/lihat_presensi12');
	
		
	}
	

    
			

}
