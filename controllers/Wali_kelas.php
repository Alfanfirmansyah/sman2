<?php 
class Wali_kelas extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('m_wali');
		$this->load->model('m_data');
		$this->load->library('upload');
		$this->load->helper('date');
	
		if ($this->session->userdata('role_id_fk')!='3')
		{
	 		redirect(base_url('loginuser'));
	 	} 
	}
	public function index()//fix
	{ 
		$tgl = date('Y-m-d'); // harus dipakaiin load helper (date)
		$tahun = $this->session->userdata('tahun_ajaran');
	    $semester = $this->session->userdata('semester');
		$data['graph'] = $this->m_data->graph($tahun,$semester);
		$data['hadir'] = $this->m_data->counthadir($tahun,$semester);
		$data['sakit'] = $this->m_data->countsakit($tahun,$semester);
		$data['izin'] = $this->m_data->countizin($tahun,$semester);
		$data['absen'] = $this->m_data->countabsen($tahun,$semester);
		$data['dispensasi'] = $this->m_data->countdispensasi($tahun,$semester);
		$data['all'] = $this->m_data->countall($tahun,$semester);

		$data['users'] = $this->m_wali->countuser();
		$data['guru'] = $this->m_wali->countguru();
		$data['wali_kelas'] = $this->m_wali->countwali();
		$data['siswa'] = $this->m_wali->countsiswa();
        $id_wali = $this->session->userdata('id_wali');
		$data['content']   =  'view_wali/dashboard';
        $this->load->view('templates_wali/templates_wali',$data); 

	}
	public function bio_wali($id)//fix
	{
		
	
		$data['wali'] = $this->m_wali->tampil_wali($id);
		
		$data['content']   =  'view_wali/biodata/bio_wali';
        $this->load->view('templates_wali/templates_wali',$data);

	}

	
	public function edit_pass($id)//fix
	{



		$data['login'] = $this->m_wali->edit_pass($id);
		$data['content']   =  'view_wali/biodata/edit_pass';
        $this->load->view('templates_wali/templates_wali',$data);

		

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

		$this->m_wali->update_pass($data, $id);
		$this->session->set_flashdata('hehe','<div class="alert alert-info" role="alert">Password berhasil diubah, silahkan login kembali! </div>');
		redirect('loginuser');
	
		
	}

	public function lihat_presensi()//fix 
	{
	$tahun = $this->session->userdata('tahun_ajaran');
	$semester = $this->session->userdata('semester');
  
    $id_wali = $this->session->userdata('nip');
    $id_guru = $this->session->userdata('id_guru');
	
	$data['presensi'] = $this->m_wali->tampil_presensi3($tahun,$semester,$id_guru);

	$data['content']   =  'view_wali/presensi/lihat_presensi';
    $this->load->view('templates_wali/templates_wali',$data);

		
	}
	public function lihat_presensi_kelas()//fix 
	{

	$tahun = $this->session->userdata('tahun_ajaran');
	$semester = $this->session->userdata('semester');
    $id_wali = $this->session->userdata('nip');
	$data['presensi'] = $this->m_wali->tampil_presensi_kelas($tahun,$semester,$id_wali);
	$data['content']   =  'view_wali/presensi/lihat_presensi_kelas';
    $this->load->view('templates_wali/templates_wali',$data);
		
	}
	public function daftarkelas_presensi3()
	{
		$tahun = $this->session->userdata('tahun_ajaran');
		$semester = $this->session->userdata('semester');
		$id_guru = $this->session->userdata('id_guru');
		$data['rombel'] = $this->m_wali->tampil_rombelpresensi3($tahun,$semester,$id_guru);
		$data['content']   =  'view_wali/presensi/daftarkelas_presensi3';
		$this->load->view('templates_wali/templates_wali',$data);

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
		$id_wali = $this->session->userdata('nip');
		$id_guru = $this->session->userdata('id_guru');
		$row = $this->m_wali->get_users($id_guru);
		$data['val_absen'] = $row->opsi_buka_absen;

		$urikelas = $this->uri->segment(4);
		$id_kelas_fk = $this->uri->segment(3); // mengambil get url urutan slice ke 3
		$data['kelas'] = urldecode($urikelas);
		$id_kelas = $id_kelas_fk;

		$data['siswa'] = $this->m_wali->tampil_siswa2($tahun,$id_kelas_fk);
		$data['jadwalll'] = $this->m_wali->tampil_jadwalll($id_kelas,$id_guru,$tahun,$semester,$hariindonesia)->result();

		$data['keterangan_presensi'] = $this->m_wali->tampil_keterangan()->result();
		$data['content']   =  'view_wali/presensi/inputpresensi12';
   		$this->load->view('templates_wali/templates_wali',$data);
	}

		public function tambah_presensi12()
	{

	
			$tanggal   = $this->input->post('tgl');
			$id_jadwal = $this->input->post('id_jadwal');
			$modul_pembahasan = $this->input->post('modul_pembahasan');
			//$cekguru = $this->input->post('kd_keterangan_guru_fk');

			$cekpresensi  = $this->m_wali->cek_absens($id_jadwal,$tanggal);
				
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
		
			$this->m_wali->input_presensi12($result);
			$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"> Berhasil Dibuat! </div>');
			redirect('Wali_kelas/lihat_presensi');
		}
		else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Data Presensi Sudah Ada </div>');
			redirect('Wali_kelas/lihat_presensi');
		}
    }
	

                                       
   
	public function edit_presensi12($id_presensi)
	{
		
		$id_prensensi = $this->uri->segment(3);
		$data['siswa'] = $this->m_wali->eTampilPresensi($id_prensensi);
		$data['keterangan_presensi'] = $this->m_wali->tampil_keterangan()->result();

		$data['content']   =  'view_wali/presensi/edit_presensi12';
   		$this->load->view('templates_wali/templates_wali',$data);

	

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
	 
		
		
	 	$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"> Berhasil Diubah! </div>');
		$this->m_wali->update_presensi12( $id_presensi,$data);
		redirect('wali_kelas/lihat_presensi');
	
		
	}

// cetak pdf 
	// Laporan per jadwal 

	 function view_laporan_perjadwal() 
	{
		$tahun = $this->session->userdata('tahun_ajaran');
		$semester = $this->session->userdata('semester');
		$data['nama'] = $this->session->userdata('nama_guru');
        // $tgl = $this->input->post('tgl');
        // $data['jadwal'] = $this->input->post('tgl');
        $id_jadwal = $this->input->post('id_jadwal');
        $id_wali = $this->session->userdata('nip');
        
        $row   = $this->m_wali->get_kelaswali($tahun,$semester,$id_wali);
	    $id_kelas = $row->id_kelas; 
	    $data['kelas'] = $row->nama_kelas;
		$data['siswa'] =  $this->m_wali->tampil_siswa($tahun,$id_wali);


    	$data['jadwalll'] = $this->m_wali->tampil_jadwal_laporan($tahun,$id_kelas,$semester)->result();
    	$data['content']   =  'view_wali/laporan-perjadwal/formlaporan';
   		$this->load->view('templates_wali/templates_wali',$data);

		
	}

    function laporan_perjadwal(){
		

    	if(empty($this->input->post('id'))){

    		$this->session->set_flashdata('messagecetak','<div class="alert alert-warning" role="alert">Field siswa kosong harap diisi! </div>');
		redirect('Wali_kelas/view_laporan_perjadwal');


    	}else{

    	$tahun = $this->session->userdata('tahun_ajaran');
		$semester = $this->session->userdata('semester');
		$data['nama'] = $this->session->userdata('nama_guru');
		
        $data['jadwal'] = $this->input->post('tgl');
		$id_kelas = $this->input->post('id_kelas');
	    $id_siswa = implode(",",$this->input->post('id'));

	    $data['tgl1'] = $this->input->post('tgl_awal');
	    $data['tgl2'] = $this->input->post('tgl_akhir');

        $tgl_awal = $this->input->post('tgl_awal');//ini
		$tgl_akhir = $this->input->post('tgl_akhir');//ini
		
        $id_jadwal = $this->input->post('id_jadwal');
        $id_wali = $this->session->userdata('nip');
        
        
        $row   = $this->m_wali->get_kelaswali($tahun,$semester,$id_wali);
	    $id_kelas = $row->id_kelas; 
	    $data['kelas'] = $row->nama_kelas;
	 
		$cek = $this->m_wali->tampil_presensi_laporan($id_jadwal,$tgl_awal,$tgl_akhir,$id_siswa, $tahun);

	     
	 	if(empty($cek)) {
	 		$this->session->set_flashdata('messagecetak','<div class="alert alert-warning" role="alert">Data laporan tidak ada! </div>');
	 		redirect('wali_kelas/view_laporan_perjadwal');
	 	}

	 	else{
	 		$tahun2 = $this->session->userdata('tahun_ajaran');
		$semester2 = $this->session->userdata('semester');
	 		//foreach get tanggal presensi, nama_pelajaran,jam_pelajaran sesuai tanggal
    	$data['tgl'] = $this->m_wali->tampil_presensi_laporan($id_jadwal,$tgl_awal,$tgl_akhir,$id_siswa,$tahun2,$semester2);//for atas


    	
      	$data['detailsiswa'] = $this->m_wali->tampil_presensi_laporan2($id_siswa,$tgl_awal,$tgl_akhir,$id_jadwal,$tahun2,$semester2);//for bawah
      	$data['content']   =  'view_wali/laporan-perjadwal/lihat_laporan';
		
		$this->load->library('Pdf');
    	$html = $this->load->view('templates_wali/templates_wali',$data); 
	    $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-perjadwal";
        $this->pdf->load_view('view_wali/laporan-perjadwal/lihat_laporan', $data);
	 	}

		
	   
    	 
      }
	 
    }

//ini home laporan 
	 public function view_laporan() 
	{
		
    	$data['content']   =  'view_wali/home-laporan/form_home_laporan';
   		$this->load->view('templates_wali/templates_wali',$data);

		
	}

// cetak per hari
     public function view_laporan_perhari() 
	{
		$tahun = $this->session->userdata('tahun_ajaran');
		$semester = $this->session->userdata('semester');
		$id_wali = $this->session->userdata('nip');
		$row   = $this->m_wali->get_kelaswali($tahun,$semester,$id_wali);
	    $data['kelas'] = $row->nama_kelas;
		$data['siswa'] =  $this->m_wali->tampil_siswa($tahun,$id_wali);
    	$data['content']   =  'view_wali/laporan-perhari/formperhari';
   		$this->load->view('templates_wali/templates_wali',$data);

		
	}

    function laporan_perhari(){


    	if(empty($this->input->post('id'))){

    		$this->session->set_flashdata('messagecetak','<div class="alert alert-warning" role="alert">Field siswa kosong harap diisi! </div>');
		redirect('Wali_kelas/view_laporan_perhari');


    	}else{

    
		$tahun = $this->session->userdata('tahun_ajaran');
		$semester = $this->session->userdata('semester');

		$id_kelas = $this->input->post('id_kelas');
		$id_siswa = implode(",",$this->input->post('id'));
		$tgl_awal = $this->input->post('tgl_awal');//ini
		$tgl_akhir = $this->input->post('tgl_akhir');//ini
		

		$data['detailsiswa'] = $this->m_wali->tampil_persiswa1($id_kelas,$id_siswa,$tahun);
    
      	$data['detailsiswa2'] = $this->m_wali->tampil_persiswa2($id_siswa,$tgl_awal,$tgl_akhir,$tahun,$semester);//ini


    	$data['content']   =  'view_wali/laporan-perhari/lihat_laporan_perhari';
    	 $this->load->library('Pdf');
    	$html = $this->load->view('templates_wali/templates_wali',$data); 
	    $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-perhari";
        $this->pdf->load_view('view_wali/laporan-perhari/lihat_laporan_perhari', $data); 

        	}
    }

// view laporan per bulan

	public function view_laporan_perbulan() 
	{
		$tahun = $this->session->userdata('tahun_ajaran');
		$semester = $this->session->userdata('semester');
		$id_wali = $this->session->userdata('nip');
		$row   = $this->m_wali->get_kelaswali($tahun,$semester,$id_wali);
	    $data['kelas'] = $row->nama_kelas;
		$data['siswa'] =  $this->m_wali->tampil_siswa($tahun,$id_wali);
    	$data['content']   =  'view_wali/laporan-perbulan/formperbulan';
   		$this->load->view('templates_wali/templates_wali',$data);

		
	}

    function laporan_perbulan(){

    	if(empty($this->input->post('id'))){

    		$this->session->set_flashdata('messagecetak','<div class="alert alert-warning" role="alert">Field siswa kosong harap diisi! </div>');
		redirect('Wali_kelas/view_laporan_perbulan');


    	}else{

		$bulan = $this->input->post('bulan');
		$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$semester = $this->session->userdata('semester');
		$id_wali = $this->session->userdata('nip');
    	$row   = $this->m_wali->get_kelaswali($tahun_ajaran,$semester,$id_wali);
	    $id_kelas = $row->id_kelas; 

    	
		$data['semestercek'] = $this->session->userdata('semester');
		
		 //$bulan = '02';
		$data['bulan'] = $bulan;
		$data['month'] = $bulan;
		$data['year'] = date("Y");

		$id_siswa = implode(",",$this->input->post('id'));
	    $data['data_siswa'] = $this->m_wali->get_siswa($id_kelas,$tahun_ajaran,$id_siswa);
		$data['pres'] = $this->m_wali->bulan($bulan,$id_kelas,$tahun_ajaran,$id_siswa);
		$data['ttd'] = $this->m_wali->tampil_ttd($id_wali);
 

    	$data['content']   =  'view_wali/laporan-perbulan/lihat_laporan_perbulan';
    	 $this->load->library('Pdf');
    	$html = $this->load->view('templates_wali/templates_wali',$data); 
	    $this->pdf->setPaper('Legal', 'landscape');
        $this->pdf->filename = "laporan-presensi";
        $this->pdf->load_view('view_wali/laporan-perbulan/lihat_laporan_perbulan', $data);  
    }
    }
   

// cetak laporan per semester
	function view_laporan_persemester(){


		$tahun = $this->session->userdata('tahun_ajaran');
		$semester = $this->session->userdata('semester');
		$id_wali = $this->session->userdata('nip');
		$row   = $this->m_wali->get_kelaswali($tahun,$semester,$id_wali);
	    $data['kelas'] = $row->nama_kelas;
		$data['siswa'] =  $this->m_wali->tampil_siswa($tahun,$id_wali);
    	$data['content']   =  'view_wali/laporan-persemester/formpersemester';
   		$this->load->view('templates_wali/templates_wali',$data);
	}

	function laporan_persemester()
	{
		if(empty($this->input->post('id'))){

    		$this->session->set_flashdata('messagecetak','<div class="alert alert-warning" role="alert">Field siswa kosong harap diisi! </div>');
		redirect('Wali_kelas/view_laporan_persemester');


    	}else{
    	$id_wali = $this->session->userdata('nip');

		$data['id_siswa'] = implode(",",$this->input->post('id'));
		$data['semester'] = $this->input->post('semester');
		$data['ttd'] = $this->m_wali->tampil_ttd($id_wali);
   
		$data['content']   =  'view_wali/laporan-persemester/lihat_laporan_persemester';
    	$this->load->library('Pdf');
    	$html = $this->load->view('templates_wali/templates_wali',$data); 
	    $this->pdf->setPaper('Legal', 'landscape');
        $this->pdf->filename = "laporan-presensi";
        $this->pdf->load_view('view_wali/laporan-persemester/lihat_laporan_persemester', $data);
    }
	}


 		

    // whatsapp gateway


	function wa_message(){
    	$nohp = $this->input->post('no_hp_ortu');
    	$pesan = $this->input->post('message');
    	$id_presensi = $this->input->post('id_presensi');
    	$nipd = $this->input->post('nipd');
    	$tgl = date('Y-m-d'); // harus dipakaiin load helper (date)
    	$jam = date('H:i');

    	$cekwa = $this->m_wali->cek_wa($id_presensi,$tgl);

    	if ($cekwa < 1) {
    		$data = array(

			'nip_wali' => $this->session->userdata('nip'),
			'id_presensi_fk' => $id_presensi,
			'pesan' => $pesan,
			'tanggal_terkirim' => $tgl,
			'jam_terkirim' => $jam

		);
    	// set ketik balasan
    	$data2 = array(
    		'nipd' =>$nipd,
			'phone' =>$nohp,
			'status' => 1

		);	

    	$this->m_wali->wa_message_send($data);

    	$db2 = $this->load->database('wa_gateway', TRUE);
		$db2->insert('inbox',$data2);
		
    	$curl = curl_init();
		$token = "L9tkeC8FDaUl2CGrjYEcZwgTJ7WmCW7o7AIc1uFFrCABWCC6m0CDMviLNJ85SYgk";
		$data = [
		    'phone' => $nohp,
		    'message' => $pesan,
		];

		curl_setopt($curl, CURLOPT_HTTPHEADER,
		    array(
		        "Authorization: $token",
		    )
		);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($curl, CURLOPT_URL, "https://ampel.wablas.com/api/send-message");
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($curl);
		curl_close($curl);
		redirect('wali_kelas');

    	}
    	else{

    		$this->session->set_flashdata('hehe', ' 
						<script>
		  				alert("Pesan Sudah Dikirim!");
						</script>');
			redirect('wali_kelas');
    	}

    	
    }

    function wa_siswa(){
    	$tgl = date('Y-m-d'); // harus dipakaiin load helper (date)
    	$id_wali = $this->session->userdata('nip');
    	$tahun = $this->session->userdata('tahun_ajaran');
		$semester = $this->session->userdata('semester');
  
		$data['siswa'] = $this->m_wali->siswa_wa($id_wali,$tahun,$semester,$tgl);
		$this->load->view('view_wali/wa',$data);
		

    }

    

   
}
