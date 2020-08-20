<?php 
class Admin extends CI_Controller
{
	private $filename = "import_data";
	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('m_data');
		$this->load->model('m_wali');
		$this->load->library('upload');
		$this->load->helper('date');

		if ($this->session->userdata('role_id_fk')!='1')
		{
	 		redirect(base_url('loginbaru'));

	 	} 
	 	

	}

	//profil

		public function edit_profil()//fix
	{

		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$data['profil_sekolah'] = $this->m_data->edit_profil();
		$data['content']   =  'view_admin/profil_sekolah/edit_profil';

		$this->load->view('templates/templates',$data); 

	}

	public function update_profil()//fix
	{
	
		$nama_sekolah = $this->input->post('nama_sekolah');
		
	
		$config['upload_path']      = 'public/images/';
            $config['allowed_types']    = 'gif|jpg|png|bmp';
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

		$data = array(
			'nama_sekolah' => $nama_sekolah,
			'foto' => $gambar

			);
		
	 
		$this->m_data->update_profil($data);

		$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data Berhasil Diubah! </div>');
		redirect('admin/edit_profil');
		
	}

	// whatsapp gateway


	function wa_message(){
    	$nohp = $this->input->post('no_hp_ortu');
    	$pesan = $this->input->post('message');
    	$id_presensi = $this->input->post('id_presensi');
    	$nipd = $this->input->post('nipd');
    	$tgl = date('Y-m-d'); // harus dipakaiin load helper (date)
    	$jam = date('H:i');

    	$cekwa = $this->m_data->cek_wa($id_presensi,$tgl);

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

    	$this->m_data->wa_message_send($data);

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
		redirect('Admin');

    	}
    	else{

    		$this->session->set_flashdata('hehe', ' 
						<script>
		  				alert("Pesan Sudah Dikirim!");
						</script>');
			redirect('Admin');
    	}

    	
    }

    function wa_siswa(){
    	$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja
		$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester
    	$tgl = date('Y-m-d'); // harus dipakaiin load helper (date)
    	$id_wali = $this->session->userdata('nip');
    	

		$data['siswa'] = $this->m_data->siswa_wa($tahun,$semester,$tgl);
		$this->load->view('view_admin/wa',$data);
		

    }

	public function index()//fix
	{ 
		$data = array(

			'judul' => 'sman2'
		);
		$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

		$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester

		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$data['users'] = $this->m_data->countuser();
		$data['guru'] = $this->m_data->countguru();
		$data['wali_kelas'] = $this->m_data->countwali($tahun,$semester);
		$data['siswa'] = $this->m_data->countsiswa($tahun,$semester);

		$data['graph'] = $this->m_data->graph($tahun,$semester);
		$data['hadir'] = $this->m_data->counthadir($tahun,$semester);
		$data['sakit'] = $this->m_data->countsakit($tahun,$semester);
		$data['izin'] = $this->m_data->countizin($tahun,$semester);
		$data['absen'] = $this->m_data->countabsen($tahun,$semester);
		$data['dispensasi'] = $this->m_data->countdispensasi($tahun,$semester);
		$data['all'] = $this->m_data->countall($tahun,$semester);
		
		$data['content']   =  'view_admin/home';
        $this->load->view('templates/templates',$data); 
	}

	public function daftar_user()//fix
	{
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$data['user'] = $this->m_data->tampil_datauser();
		$data['content']   =  'view_admin/user_management/daftar_user';
        $this->load->view('templates/templates',$data); 		
	}

	public function tambah_user()//fix
	{
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$data['role'] = $this->m_data->tampil_roleuser();
		$data['ketua_kelas'] = $this->m_data->tampil_ketua_kelas();
		$data['guru'] = $this->m_data->tampil_guru();
		$this->form_validation->set_rules('username', 'username','required|trim|is_unique[users.username]', [
			'is_unique' => 'username ini sudah terdaftar!']);
		$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]');

		
		if ($this->form_validation->run() == false) 
		{
			$data['judul'] = 'Halaman Registrasi';

			$data['content']   =  'view_admin/user_management/form_user';
	        $this->load->view('templates/templates',$data); 
	
		}

		// KONDISI JIKA SISWA ADMIN DAN GURU TIDAK DITAMBAHKAN VALUENYA
		elseif ($this->input->post('ketua_kelas') == '' || $this->input->post('ketua_kelas') == null || $this->form_validation->run() == false)
		{
				if($this->input->post('guru') == '' || $this->input->post('guru') == null)
			{

				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$pass = md5($password);
				$role_id = $this->input->post('role');
			 
				$data = array(
					'username' => $this->input->post('username', true),
					'password' => $pass,
					'role_id_fk' => $this->input->post('role', true),
					'is_active' => 1

				);
				$this->m_data->input_user($data, 'users');
			

				$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Akun Berhasil Dibuat! </div>');
				redirect('admin/daftar_user');
			}
			else{ // TIDAK ISI SISWA ADMIN SAJA, TAPI NGINPUT GURU

				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$pass = md5($password);
				$role_id = $this->input->post('role');
				

				
			 
				$data = array(
					'username' => $this->input->post('username', true),
					'password' => $pass,
					'id_guru_fk' => $this->input->post('guru', true),
					'role_id_fk' => $this->input->post('role', true),
					'is_active' => 1

				);


				try {
			       $this->m_data->input_user($data, 'users');
			        $db_error = $this->db->error();
			        if (!empty($db_error)) {
			           if($db_error['code'] == 0){
			           	$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Akun berhasil dibuat </div>');
			    		redirect('admin/daftar_user');
						
			           }
			           else{
			           	$this->session->set_flashdata('message2','<div class="alert alert-danger" role="alert">Akun sudah ada </div>');
			    		redirect('admin/daftar_user');
			           }
			            return false; 
			        }
			        return TRUE;
			    } catch (Exception $e) {
			        echo $e->getMessage();
			        return;
			    } 
			}
			
		}
		else{ // TIDAK ISI GURU, TAPI NGINPUT SISWA ADMIN

			if($this->input->post('guru') == '' || $this->input->post('guru') == null)
			{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$ketua_kelas = $this->input->post('ketua_kelas');
				$pass = md5($password);
				$role_id = $this->input->post('role');

				$data = array(
					'username'=> $this->input->post('username', true),
					'password'=> $pass,
					'ketua_kelas'=> $ketua_kelas,
					'role_id_fk' => $this->input->post('role', true),
					'is_active' => 1
					

					);

							try {
			       $this->m_data->input_user($data, 'users');
			        $db_error = $this->db->error();
			        if (!empty($db_error)) {
			           if($db_error['code'] == 0){
			           	$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Akun berhasil dibuat </div>');
			    		redirect('admin/daftar_user');
						
			           }
			           else{
			           	$this->session->set_flashdata('message2','<div class="alert alert-danger" role="alert">Akun sudah ada </div>');
			    		redirect('admin/daftar_user');
			           }
			            return false; 
			        }
			        return TRUE;
			    } catch (Exception $e) {
			        echo $e->getMessage();
			        return;
			    }   
	        }

	        else { // NGINPUTKAN SEMUANYA

				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$ketua_kelas = $this->input->post('ketua_kelas');
				$pass = md5($password);
				$role_id = $this->input->post('role');

				$data = array(
					'username'=> $this->input->post('username', true),
					'password'=> $pass,
					'id_guru_fk' => $this->input->post('guru', true),
					'ketua_kelas'=> $ketua_kelas,
					'role_id_fk' => $this->input->post('role', true),
					'is_active' => 1
					

					);
				$this->m_data->input_user($data, 'users');
			

				$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Akun Berhasil Dibuat! </div>');
				redirect('admin/daftar_user');
		         
	         }
		}
	}

	public function edit_user($id)//fix
	{
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$data['role'] = $this->m_data->tampil_roleuser();
		$data['users'] = $this->m_data->edit_user($id);
		$data['guru'] = $this->m_data->tampil_guru();
		$data['ketua_kelas'] = $this->m_data->tampil_ketua_kelas();
		$data['content']   =  'view_admin/user_management/edit_user';

		$this->load->view('templates/templates',$data); 

	}

	public function update_user()//fix
	{
	
		if($this->input->post('password') == '' || $this->input->post('password') == null)
		{
			if($this->input->post('ketua_kelas') == '' || $this->input->post('ketua_kelas') == null)
				{

				if($this->input->post('guru') == '' || $this->input->post('guru') == null)
				{
					$id = $this->input->post('id');
					$username = $this->input->post('username');
					$role_id = $this->input->post('role');
					$ketua_kelas = null;
					$id_guru = null;
					$data = array(
					'username' => $username,
					'role_id_fk' => $role_id,
					'ketua_kelas' =>  $ketua_kelas,
					'id_guru_fk' => $id_guru
					);

				$this->m_data->update_user($data, $id);
				$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data  Berhasil Diubah </div>');
				redirect('admin/daftar_user');
				}

				else{
					$id = $this->input->post('id');
							$username = $this->input->post('username');
							$role_id = $this->input->post('role');
							$ketua_kelas = null;
							$data = array(
								'username' => $username,
								'role_id_fk' => $role_id,
								'ketua_kelas' =>  $ketua_kelas,
								'id_guru_fk' => $this->input->post('guru', true),
							);
				try {
			       	$this->m_data->update_user($data, $id);
			        $db_error = $this->db->error();
			        if (!empty($db_error)) {
			           if($db_error['code'] == 0){
			           	$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Akun berhasil dirubah </div>');
			    		redirect('admin/daftar_user');
						
			           }
			           else{
			           	$this->session->set_flashdata('message2','<div class="alert alert-danger" role="alert">Akun sudah ada </div>');
			    		redirect('admin/daftar_user');
			           }
			            return false; 
			        }
			        return TRUE;
			    } catch (Exception $e) {
			        echo $e->getMessage();
			        return;
			    } 
					}
				}
				else {

					if($this->input->post('guru') == '' || $this->input->post('guru') == null)
					{

						$id = $this->input->post('id');
						$username = $this->input->post('username');
						$role_id = $this->input->post('role');
					    $ketua_kelas = $this->input->post('ketua_kelas');
					    $id_guru = null;
					    $data = array(
							'username' => $username,
							'ketua_kelas' =>  $ketua_kelas,
							'role_id_fk' => $role_id,
							'id_guru_fk' => $id_guru			
						);
			   		try {
			       	$this->m_data->update_user($data, $id);
			        $db_error = $this->db->error();
			        if (!empty($db_error)) 
			        {
			           if($db_error['code'] == 0)
			           {
			           		$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Akun berhasil dirubah </div>');
			    			redirect('admin/daftar_user');	
			           }
			           else
			           {
			           		$this->session->set_flashdata('message2','<div class="alert alert-danger" role="alert">Akun sudah ada </div>');
			    			redirect('admin/daftar_user');
			           }
			            return false; 
			        }
			        return TRUE;
					} catch (Exception $e) {
					        echo $e->getMessage();
					        return;
					    } 
					}

					else {

						$id = $this->input->post('id');
						$username = $this->input->post('username');
						$role_id = $this->input->post('role');
					    $ketua_kelas = $this->input->post('ketua_kelas');
					    $data = array(
							'username' => $username,
							'ketua_kelas' =>  $ketua_kelas,
							'role_id_fk' => $role_id,
							'id_guru_fk' => $this->input->post('guru', true),

						);
			    	try {
			       	$this->m_data->update_user($data, $id);
			        $db_error = $this->db->error();
			        if (!empty($db_error)) {
			           if($db_error['code'] == 0){
			           	$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Akun berhasil dirubah </div>');
			    		redirect('admin/daftar_user');
						
			           }
			           else{
			           	$this->session->set_flashdata('message2','<div class="alert alert-danger" role="alert">Akun sudah ada </div>');
			    		redirect('admin/daftar_user');
			           }
			            return false; 
			        }
			        return TRUE;
					} catch (Exception $e) {
					        echo $e->getMessage();
					        return;
					    } 
					}
				 }	
		}
		

		else{

			if($this->input->post('ketua_kelas') == '' || $this->input->post('ketua_kelas') == null)
			{
				if($this->input->post('guru') == '' || $this->input->post('guru') == null)
				{

					$id = $this->input->post('id');
					$username = $this->input->post('username');
					$role_id = $this->input->post('role');
					$password = $this->input->post('password');
					$ketua_kelas = null;
					$id_guru = null;
			        $pass = md5($password);
				
					$data = array(
						'username' => $username,
						'role_id_fk' => $role_id,
						'ketua_kelas' =>  $ketua_kelas,
						'password' => $pass,
						'id_guru_fk' => $id_guru

					);

					$this->m_data->update_user($data, $id);
					$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data  Berhasil Diubah </div>');
					redirect('admin/daftar_user');
				}

				else {

					$id = $this->input->post('id');
					$username = $this->input->post('username');
					$role_id = $this->input->post('role');
					$password = $this->input->post('password');
					$ketua_kelas = null;
			        $pass = md5($password);
				
					$data = array(
						'username' => $username,
						'role_id_fk' => $role_id,
						'ketua_kelas' =>  $ketua_kelas,
						'id_guru_fk' => $this->input->post('guru', true),
						'password' => $pass

					);

					try {
			       	$this->m_data->update_user($data, $id);
			        $db_error = $this->db->error();
			        if (!empty($db_error)) {
			           if($db_error['code'] == 0){
			           	$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Akun berhasil dirubah </div>');
			    		redirect('admin/daftar_user');
						
			           }
			           else{
			           	$this->session->set_flashdata('message2','<div class="alert alert-danger" role="alert">Akun sudah ada </div>');
			    		redirect('admin/daftar_user');
			           }
			            return false; 
			        }
			        return TRUE;
			    } catch (Exception $e) {
			        echo $e->getMessage();
			        return;
			    } 
					}
			}


			else {

				if($this->input->post('guru') == '' || $this->input->post('guru') == null)
				{
					$id = $this->input->post('id');
					$username = $this->input->post('username');
					$role_id = $this->input->post('role');
				    $ketua_kelas = $this->input->post('ketua_kelas');
				    $password = $this->input->post('password');
			        $pass = md5($password);
			        $id_guru = null;
				   
				    $data = array(
						'username' => $username,
						'ketua_kelas' =>  $ketua_kelas,
						'role_id_fk' => $role_id,
						'password' => $pass,
						'id_guru_fk' => $id_guru
					

					);
			    	try {
			       	$this->m_data->update_user($data, $id);
			        $db_error = $this->db->error();
			        if (!empty($db_error)) {
			           if($db_error['code'] == 0){
			           	$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Akun berhasil dirubah </div>');
			    		redirect('admin/daftar_user');
						
			           }
			           else{
			           	$this->session->set_flashdata('message2','<div class="alert alert-danger" role="alert">Akun sudah ada </div>');
			    		redirect('admin/daftar_user');
			           }
			            return false; 
			        }
			        return TRUE;
			    } catch (Exception $e) {
			        echo $e->getMessage();
			        return;
			    } 
				}

			else{

            	$id = $this->input->post('id');
				$username = $this->input->post('username');
				$role_id = $this->input->post('role');
			    $ketua_kelas = $this->input->post('ketua_kelas');
			    $password = $this->input->post('password');
		        $pass = md5($password);
			   
			    $data = array(
					'username' => $username,
					'ketua_kelas' =>  $ketua_kelas,
					'role_id_fk' => $role_id,
					'id_guru_fk' => $this->input->post('guru', true),
					'password' => $pass
				

				);
			    $this->m_data->update_user($data, $id);
				$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data  Berhasil Diubah </div>');
				redirect('admin/daftar_user');

			}
		}
	
		}
		
	}

	public function hapus_user()//fix
	{

		try {
        $this->db->delete('users', array('id'=> $this->input->get('id')));
        $db_error = $this->db->error();
        if (!empty($db_error)) {
           if($db_error['code'] == 0){
           	$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data Berhasil Dihapus </div>');
    		redirect('admin/daftar_user');		
           }
           else{
           	$this->session->set_flashdata('message2','<div class="alert alert-danger" role="alert">Data Tidak Bisa Di Hapus!!!! </div>');
    		redirect('admin/daftar_user');
           }
            return false; 
        }
        return TRUE;
    } catch (Exception $e) {
        echo $e->getMessage();
        return;
    }

	}	

	// jadwal kelas 12

	public function daftar_jadwal12()//fix 
	{

		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

		$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester

		$data['tahun_rombel'] = $this->m_data->tampil_tahun_rombel($tahun_ajaran,$semester);
		$data['jadwalpelajaran'] = $this->m_data->tampil_jdwl12($tahun,$semester);
		
		
		//$data['rombel'] = $this->m_data->tampil_rombel();
		$data['content']   =  'view_admin/jadwal_pelajaran/jadwal_pelajaran12';

		$this->load->view('templates/templates',$data); 

	
	}
	public function form_jadwal12()//fix
	{
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$data['kelas'] = $this->m_data->tampil_kelas();
		$data['guru'] = $this->m_data->tampil_guru_jadwal();
		$data['mata_pelajaran'] = $this->m_data->tampil_detailj()->result();
		$data['tahun'] = $this->m_data->tampil_tahunajaran();
		$data['content']   =  'view_admin/jadwal_pelajaran/form_jadwal12';

		$this->load->view('templates/templates',$data);

	}


	public function tambah_jadwal12()//fix
	{

		//$this->form_validation->set_rules('jam_pelajaran', 'jam_pelajaran', 'required|trim');
		$this->form_validation->set_rules('kd_mapel', 'mata_pelajaran', 'required|trim');

		
		if ($this->form_validation->run() == false) {
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$data['kelas'] = $this->m_data->tampil_kelas();
		$data['guru'] = $this->m_data->tampil_guru();
		$data['mata_pelajaran'] = $this->m_data->tampil_detailj()->result();
		$data['tahun'] = $this->m_data->tampil_tahunajaran();
		$data['judul'] = 'Halaman Tambah Jadwal';

		$data['content']   =  'view_admin/jadwal_pelajaran/form_jadwal12';

		$this->load->view('templates/templates',$data);

	} else {

		
		$hari = $this->input->post('hari');
		$mata_pelajaran = $this->input->post('kd_mapel');
		$id_kelas = $this->input->post('id_kelas');
		$id_guru = $this->input->post('id_guru');
		$tahun = $this->input->post('id_tahun_ajaran');
		$convert = implode("," ,$this->input->post('jam_pelajaran')); //memecah array
		$mulai = explode("," ,$convert); //menggabungkan dalam bentuk koma

		

       $jumlah = $this->m_data->cek_insert_jadwal($hari,$convert,$mata_pelajaran,$id_kelas,$tahun);

       $jumlah2 = $this->m_data->cek_insert_jadwal2($hari,$convert,$id_kelas,$tahun);

       $jumlah3 = $this->m_data->cek_insert_jadwal3($hari,$mata_pelajaran,$id_kelas,$tahun);

       $jumlah4 = $this->m_data->cek_insert_jadwal4($hari,$convert,$id_guru,$tahun);


		if ($jumlah->cek > 0) //teruji inputkan : Jumat jam ke 1,2 Ekonomi X IPS 1 Agus Dwi 2024/2025
		{
			$this->session->set_flashdata('message2','<div class="alert alert-warning" role="alert">Jadwal Sudah Ada </div>');
			redirect('admin/daftar_jadwal12');
		} 

		elseif($jumlah2->cek > 0 ){ // teruji inputkan : Jumat jam ke 1,2 Geografi X IPS 1 Wiwik 2024/2025
			$this->session->set_flashdata('message2','<div class="alert alert-warning" role="alert">Jadwal Pelajaran Sudah Ada </div>');
			redirect('admin/daftar_jadwal12');
		}
		elseif($jumlah3->cek > 0 ) // inputkan jika hari itu, mapel itu, di kelas itu, dan tahun itu sudah ada jangan diulang mapel lagi di jam pelajaran lain
		{

			$this->session->set_flashdata('message2','<div class="alert alert-warning" role="alert">Mata Pelajaran Sudah Ada </div>');
			redirect('admin/daftar_jadwal12');

		} elseif($jumlah4->cek > 0) // inputkan jika hari itu, mapel itu, tp dikelas lain, guru itu mengajar tapi jam pelajaran yang sama dengan kelas lain dihari dan jam pel itu. 
		{
			$this->session->set_flashdata('message2','<div class="alert alert-warning" role="alert">Guru telah mengajar di jam pelajaran yang sama di kelas lain </div>');
			redirect('admin/daftar_jadwal12');
		}
		else // teruji jika inputan mulai dari 0 bisa
			{
				$data = array(
				'hari' => $hari,
			    'jam_pelajaran' => implode(",",$this->input->post('jam_pelajaran')),
				'kd_mapel_fk' => $mata_pelajaran,
				'id_kelas_fk' => $id_kelas,
				'id_guru_fk' => $id_guru,
				'id_tahun_ajaran_fk' => $tahun,
				'jam_pelajaran_dimulai' => $mulai[0],

				);
				$this->m_data->input_jadwal($data);
				

				$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Jadwal Berhasil Dibuat! </div>');
				redirect('admin/daftar_jadwal12');
			}
		}
		
	}

	public function edit_jadwal12($id)//fix
	{
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;
		
		$data['kelas'] = $this->m_data->tampil_kelas();
		$data['guru'] = $this->m_data->tampil_guru_jadwal();
		$data['mata_pelajaran'] = $this->m_data->tampil_detailj()->result();
		$data['jadwal_pelajaran'] = $this->m_data->edit_jadwal($id)->row(1);
		$data['tahun'] = $this->m_data->tampil_tahunajaran();

		$data['content']   =  'view_admin/jadwal_pelajaran/edit_jadwal12';

		$this->load->view('templates/templates',$data);
	}

	public function update_jadwal12()//fix
	{
		$id_jadwal = $this->input->post('id_jadwal');
		$hari = $this->input->post('hari');
		$mata_pelajaran = $this->input->post('kd_mapel');
		$id_kelas = $this->input->post('id_kelas');
		$id_guru = $this->input->post('id_guru');
		$tahun = $this->input->post('id_tahun_ajaran');
		$convert = implode("," ,$this->input->post('jam_pelajaran')); //memecah array
		$mulai = explode("," ,$convert); //menggabungkan dalam bentuk koma

		$jumlah = $this->m_data->cek_insert_jadwal($hari,$convert,$mata_pelajaran,$id_kelas,$tahun);

        $jumlah2 = $this->m_data->cek_insert_jadwal2($hari,$convert,$id_kelas,$tahun);

        $jumlah3 = $this->m_data->cek_insert_jadwal3($hari,$mata_pelajaran,$id_kelas,$tahun);

        $jumlah4 = $this->m_data->cek_insert_jadwal4($hari,$convert,$id_guru,$tahun);
		if ($jumlah->cek > 0) //teruji inputkan : Jumat jam ke 1,2 Ekonomi X IPS 1 Agus Dwi 2024/2025
		{
			
			if ($jumlah->cek > 1) //teruji inputkan : Jumat jam ke 1,2 Ekonomi X IPS 1 Agus Dwi 2024/2025
			{
				$this->session->set_flashdata('message2','<div class="alert alert-warning" role="alert">Jadwal Sudah Ada </div>');
				redirect('admin/daftar_jadwal12');
			}else{
				redirect('admin/daftar_jadwal12');
			}
		} 

		elseif($jumlah2->cek > 0 ){ // teruji inputkan : Jumat jam ke 1,2 Geografi X IPS 1 Wiwik 2024/2025

			if($jumlah2->cek > 1 )
			{ // teruji inputkan : Jumat jam ke 1,2 Geografi X IPS 1 Wiwik 2024/2025
				$this->session->set_flashdata('message2','<div class="alert alert-warning" role="alert">Jadwal Pelajaran Sudah Ada </div>');
				redirect('admin/daftar_jadwal12');
			} else {
				redirect('admin/daftar_jadwal12');
			}
			
		}

		elseif($jumlah3->cek > 0 ) // inputkan jika hari itu, mapel itu, di kelas itu, dan tahun itu sudah ada jangan diulang mapel lagi di jam pelajaran lain
		{

				if($jumlah3->cek > 1 ) // inputkan jika hari itu, mapel itu, di kelas itu, dan tahun itu sudah ada jangan diulang mapel lagi di jam pelajaran lain
			{

				$this->session->set_flashdata('message2','<div class="alert alert-warning" role="alert">Mata Pelajaran Sudah Ada </div>');
				redirect('admin/daftar_jadwal12');

			} else {
				redirect('admin/daftar_jadwal12');
			}
		

		} elseif($jumlah4->cek > 0) // inputkan jika hari itu, mapel itu, tp dikelas lain, guru itu mengajar tapi jam pelajaran yang sama dengan kelas lain dihari dan jam pel itu. 
		{
			if($jumlah4->cek > 1) // inputkan jika hari itu, mapel itu, tp dikelas lain, guru itu mengajar tapi jam pelajaran yang sama dengan kelas lain dihari dan jam pel itu. 
			{
				$this->session->set_flashdata('message2','<div class="alert alert-warning" role="alert">Guru telah mengajar di jam pelajaran yang sama di kelas lain </div>');
				redirect('admin/daftar_jadwal12');
			
			} else {
				redirect('admin/daftar_jadwal12');
			}
			
		}else{
	
		$data = array(
			'hari' => $hari,
			'jam_pelajaran' =>implode(",",$this->input->post('jam_pelajaran')),
			'kd_mapel_fk' => $mata_pelajaran,
			'id_kelas_fk' => $id_kelas,
			'id_guru_fk' => $id_guru,
			'id_tahun_ajaran_fk' => $tahun,
			'jam_pelajaran_dimulai' => $mulai[0]

			);
	 	
		$this->m_data->update_jadwal($data, $id_jadwal);
		$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Jadwal Berhasil Diubah! </div>');
		redirect('admin/daftar_jadwal12');
	}
		
	}


	public function hapus_jadwal12()//fix
	{

		 $this->db->delete('jadwal_pelajaran', array('id_jadwal'=> $this->input->get('id')));
		$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Jadwal berhasil Dihapus! </div>');
		redirect('admin/daftar_jadwal12');
	}


	public function lihat_presensi12()//fix 
	{
	$row = $this->m_data->count_pemberitahuan();
	$data['pemberitahuan'] = $this->m_data->pemberitahuan();
	$data['count_pemberitahuan'] = $row->jumlah;	

	$tahun_ajaran = $this->session->userdata('tahun_ajaran');
	$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

	$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester
	
	$data['presensi'] = $this->m_data->tampil_presensi3($tahun,$semester);
	//$data['guru'] = $this->m_data->tampil_pguru()->result();

	$data['content']   =  'view_admin/presensi_kehadiran/detail_presensi3';
	$this->load->view('templates/templates',$data);
	
	}

	public function daftarkelas_presensi3()
	{
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;	
		$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

		$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester
	
	
		$data['rombel'] = $this->m_data->tampil_rombelpresensi3()->result();
	
		// $data['guru'] = $this->m_data->tampil_guru();
		// $data['mata_pelajaran'] = $this->m_data->tampil_detailj()->result();
		$data['content']   =  'view_admin/presensi_kehadiran/daftarkelas_presensi3';
		$this->load->view('templates/templates',$data);


	}
	public function input_presensi12()//fix
	{

		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;	
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

		$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

		$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester

		$urikelas = $this->uri->segment(4);
		$id_kelas_fk = $this->uri->segment(3); // mengambil get url urutan slice ke 3
		$data['kelas'] = urldecode($urikelas); //untuk menghilangkan %
		$data['results'] = $this->m_data->tampil_siswa2($tahun,$id_kelas_fk);
		$data['jadwalll'] = $this->m_data->tampil_jadwalll($id_kelas_fk,$hariindonesia, $tahun,$semester)->result();
		//var_dump($id_kelas_fk,$hariindonesia, $tahun,$semester);
		$data['keterangan_presensi'] = $this->m_data->tampil_keterangan()->result();
		$data['content']   =  'view_admin/presensi_kehadiran/inputpresensi12';
		$this->load->view('templates/templates',$data);
	

	}

	public function status_on($id)
	{
		$kode = 1;
		$this->m_data->status_absen($id,$kode);
		redirect('admin/daftar_user');
	
		
	}
	public function status_off($id)
	{
		$kode = 0;
		$this->m_data->status_absen($id,$kode);
		redirect('admin/daftar_user');
	
		
	}

	public function tambah_presensi12()//fix
	{
			$tanggal   = $this->input->post('tgl');
			$id_jadwal = $this->input->post('id_jadwal');
			$modul_pembahasan = $this->input->post('modul_pembahasan');
			$cekpresensi  = $this->m_data->cek_absens($id_jadwal,$tanggal);
				
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

			var_dump($nm);
		
		// $this->m_data->input_presensi12($result);
		// $this->session->set_flashdata('message2','<div class="alert alert-info" role="alert"> Berhasil Dibuat! </div>');
		// redirect('admin/lihat_presensi12');
	}
	else{
		$this->session->set_flashdata('message2','<div class="alert alert-danger" role="alert"> Data Presensi Sudah Ada </div>');
		redirect('admin/lihat_presensi12');
	}
    }
		

	public function edit_presensi12($id_presensi)//fix
	{
		
		$id_prensensi = $this->uri->segment(3);
		$data['siswa'] = $this->m_data->eTampilPresensi($id_prensensi);
		$data['keterangan_presensi'] = $this->m_data->tampil_keterangan()->result();
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;
		$data['content']   =  'view_admin/presensi_kehadiran/edit_presensi12';
		$this->load->view('templates/templates',$data);
		
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
	 
		
	 
		$this->m_data->update_presensi12( $id_presensi,$data);
		$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data Presensi Berhasil Diubah! </div>');
		redirect('admin/lihat_presensi12');
	
		
	}
	

	public function daftar_guru()//fix
	{
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$data['guru'] = $this->m_data->tampil_guru();
		$data['content'] = 'view_admin/guru/daftar_guru';


		$this->load->view('templates/templates', $data);
	

	}
	public function form_data_guru()//fix
	{
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->m_data->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
				$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data Berhasil Diupload, Silahkan klik import.. </div>');
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
		redirect("admin/daftar_guru"); 
	}

	public function import_data_guru()//fix
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = [];
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, [
					'nama_guru'=>$row['A'], // Insert data nis dari kolom A di excel
					'email'=>$row['B'], // Insert data nama dari kolom B di excel
					'NUPTK'=>$row['C'], // Insert data jenis kelamin dari kolom C di
					'jk'=>$row['D'], // Insert data jenis kelamin dari kolom C di excel
					'tempat_lahir'=>$row['E'], // Insert data jenis kelamin dari kolom C di excel
					'tgl_lahir'=>$row['F'], // Insert data jenis kelamin dari kolom C di excel
					'nip'=>$row['G'], // Insert data jenis kelamin dari kolom C di excel
					'jenis_ptk'=>$row['H'], // Insert data jenis kelamin dari kolom C di excel
					'agama'=>$row['I'], // Insert data jenis kelamin dari kolom C di excel
					'alamat' =>$row['J'],
					'RT' =>$row['K'],
					'RW' =>$row['L'],
					'dusun' => $row['M'],
					'kelurahan'=> $row['N'],
					'kecamatan'=> $row['O'],
					'kode_pos'=> $row['P'],
					'no_hp'=>$row['Q'] // Insert data jenis kelamin dari kolom C di excel
					
						
				]);
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		try {
	       $this->m_data->insert_multiple_guru($data);
	        $db_error = $this->db->error();
	        if (!empty($db_error)) {
	           if($db_error['code'] == 0){
	           	$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data Berhasil Diimport</div>');
	           	    // $this->m_data->updatedeleteuserwali($rowid);
	    		redirect('admin/daftar_guru');
				
	           }
	           else{
	           	$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data Guru Sudah Ada </div>');

	    		redirect('admin/daftar_guru');
	           }
	            return false; // unreachable retrun statement !!!
	        }
		        return TRUE;
	    } catch (Exception $e) {
	        // this will not catch DB related errors. But it will include them, because this is more general. 
	        echo $e->getMessage();
	        return;
	    	}

	}


	public function form_guru()//fix
	{
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$data['users'] = $this->m_data->tampil_username()->result();
		$data['content'] = 'view_admin/guru/form_guru';

		$this->load->view('templates/templates', $data);

	}

	public function tambah_guru()//fix
	{
	
		$this->form_validation->set_rules('nama_guru', 'nama_guru', 'required|trim|is_unique[guru.nama_guru]',[
			'is_unique' => 'nama guru sudah terdaftar !']);

		$this->form_validation->set_rules('nip', 'nip', 'required|trim|numeric|min_length[18]|max_length[18]|is_unique[guru.nip]',
			[
			'is_unique' => 'nip tidak boleh sama !'
			]);

		$this->form_validation->set_rules('NUPTK', 'NUPTK', 'required|trim|numeric|min_length[16]|max_length[16]|is_unique[guru.NUPTK]',
			[
			'is_unique' => 'NUPTK tidak boleh sama !'
			]);

		$this->form_validation->set_rules('no_hp', 'no_hp', 'required|trim|numeric|min_length[10]|max_length[13]|is_unique[guru.no_hp]',[
			'is_unique' => 'nomer hp tidak boleh sama !'
			]);
		$this->form_validation->set_rules('kode_pos', 'kode_pos','required|trim|numeric|min_length[5]|max_length[5]');
		
		$this->form_validation->set_rules('RT', 'RT', 'required|trim|numeric');
		$this->form_validation->set_rules('RW', 'RW', 'required|trim|numeric');

		

		 $jkv = $this->input->post('jk');
		// $iduserv = $this->input->post('id_user');


		
		if ($this->form_validation->run() == false) 
		{
			$row = $this->m_data->count_pemberitahuan();
			$data['pemberitahuan'] = $this->m_data->pemberitahuan();
			$data['count_pemberitahuan'] = $row->jumlah;
			$data['pemberitahuan_detail'] = $this->m_data->pemberitahuan_detail();

			$data['judul'] = 'Halaman Tambah Guru';
			$data['content'] = 'view_admin/guru/form_guru_validasi';
			//$data['users'] = $this->m_data->tampil_username()->result();

			$data['validasi_jk'] =$jkv; 
			
			$this->load->view('templates/templates', $data);

			
		}else{
		

		
		$nama_guru = $this->input->post('nama_guru');
		$email = $this->input->post('email');
		$nuptk = $this->input->post('NUPTK');
		$jk = $this->input->post('jk');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');

		$myTime = strtotime($tgl_lahir); 
        $dateconvert = date("Y-m-d", $myTime);

		$nip = $this->input->post('nip');
		$jenis_ptk = $this->input->post('jenis_ptk');
		$agama = $this->input->post('agama');
		$alamat = $this->input->post('alamat');
		$rt = $this->input->post('RT');
		$rw = $this->input->post('RW');
		$dusun = $this->input->post('dusun');
		$kelurahan = $this->input->post('kelurahan');
		$kecamatan = $this->input->post('kecamatan');
		$kode_pos = $this->input->post('kode_pos');
		$no_hp = $this->input->post('no_hp');
		
			
			$data = array(
			
			'nama_guru'=> $nama_guru,
			'email' =>$email,
			'NUPTK' => $nuptk,
			'jk' => $jk,
			'tempat_lahir' => $tempat_lahir,
			'tgl_lahir'=> $tgl_lahir,
			'nip' => $nip,
			'jenis_ptk' => $jenis_ptk,
			'agama' => $agama,
			'alamat'=> $alamat,
			'RT' => $rt,
			'RW' => $rw,
			'dusun' => $dusun,
			'kelurahan' => $kelurahan,
			'kecamatan' => $kecamatan,
			'kode_pos' => $kode_pos,
			'no_hp' => $no_hp
			


		);

		
		$this->m_data->input_guru($data, 'guru');
		
		$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data Guru Berhasil Ditambahkan! </div>');
		redirect('admin/daftar_guru');


		}
	}

	public function edit_guru($id_guru)//fix
	{
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$data['guru'] = $this->m_data->edit_guru($id_guru);
		$data['content'] = 'view_admin/guru/edit_guru';


		$this->load->view('templates/templates', $data);

	}
	public function update_guru()//fix
	{


		$this->form_validation->set_rules('kode_pos', 'kode_pos','required|trim|numeric|min_length[5]|max_length[5]');
		
		$this->form_validation->set_rules('RT', 'RT', 'required|trim|numeric');
		$this->form_validation->set_rules('RW', 'RW', 'required|trim|numeric');


		if ($this->form_validation->run() == false) 
		{
			$kode = $this->input->post('kode');

			$row = $this->m_data->count_pemberitahuan();
			$data['pemberitahuan'] = $this->m_data->pemberitahuan();
			$data['count_pemberitahuan'] = $row->jumlah;
			$data['pemberitahuan_detail'] = $this->m_data->pemberitahuan_detail();
			$data['guru'] = $this->m_data->edit_guru($kode);

			$data['judul'] = 'Halaman Edit Guru';
			$data['content'] = 'view_admin/guru/edit_guru';
			//$data['users'] = $this->m_data->tampil_username()->result();

			// $data['validasi_jk'] =$jkv; 
			
			$this->load->view('templates/templates', $data);

			
		}else{
		

		$kode2 = $this->input->post('kode');
		$nama_guru = $this->input->post('nama_guru');
		$email = $this->input->post('email');
		$nuptk = $this->input->post('NUPTK');
		$jk = $this->input->post('jk');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$nip = $this->input->post('nip');
		$jenis_ptk = $this->input->post('jenis_ptk');
		$agama = $this->input->post('agama');
		$alamat = $this->input->post('alamat');
		$rt = $this->input->post('RT');
		$rw = $this->input->post('RW');
		$dusun = $this->input->post('dusun');
		$kelurahan = $this->input->post('kelurahan');
		$kecamatan = $this->input->post('kecamatan');
		$kode_pos = $this->input->post('kode_pos');
		$no_hp = $this->input->post('no_hp');
		

	 
		$data = array(
			
			'nama_guru'=> $nama_guru,
			'email' =>$email,
			'NUPTK' => $nuptk,
			'jk' => $jk,
			'tempat_lahir' => $tempat_lahir,
			'tgl_lahir'=> $tgl_lahir,
			'nip' => $nip,
			'jenis_ptk' => $jenis_ptk,
			'agama' => $agama,
			'alamat'=> $alamat,
			'RT' => $rt,
			'RW' => $rw,
			'dusun' => $dusun,
			'kelurahan' => $kelurahan,
			'kecamatan' => $kecamatan,
			'kode_pos' => $kode_pos,
			'no_hp' => $no_hp
			


		);
	 	$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data Berhasil Diubah </div>');
	
		$this->m_data->update_guru($kode2,$data);
		redirect('admin/daftar_guru');
		}
		
	}
	public function hapus_guru()//fix
	{



		try {
        $this->db->delete('guru', array('id_guru'=> $this->input->get('id')));
        $db_error = $this->db->error();
        if (!empty($db_error)) {
           if($db_error['code'] == 0){
           	$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data Berhasil Dihapus </div>');
           	    // $this->m_data->updatedeleteuserwali($rowid);
    		redirect('admin/daftar_guru');
			
           }
           else{
           	$this->session->set_flashdata('message2','<div class="alert alert-danger" role="alert">Data Tidak Bisa Di Hapus!!!! </div>');

    		redirect('admin/daftar_guru');
           }
            return false; // unreachable retrun statement !!!
        }
	        return TRUE;
	    } catch (Exception $e) {
	        // this will not catch DB related errors. But it will include them, because this is more general. 
	        echo $e->getMessage();
	        return;
	    	}
	}
// CONTROLLER WALI

// 	public function daftar_wali()
// 	{
// 		$data['wali_kelas'] = $this->m_data->tampil_walikelas();
// 		$data['content']   =  'view_admin/data_wali/daftar_wali';
//         $this->load->view('templates/templates',$data); 
	
// 	}
// 	public function form_wali()
// 	{
// 		//$data['wali_kelas'] = $this->m_data->tampil_wali();
// 		$data['guru'] = $this->m_data->tampil_guru();
// 		$data['content']   =  'view_admin/data_wali/form_wali';

//         $this->load->view('templates/templates',$data);

// 	}

// 	public function tambah_wali()
// 	{
	
// 		$this->form_validation->set_rules('id_guru', 'id_guru', 'required|trim');

		
// 		if ($this->form_validation->run() == false) 
// 		{
// 			$data['judul'] = 'Halaman Tambah Wali';

// 		$this->load->view('templates_admin/header');
// 		$this->load->view('view_admin/data_wali/form_wali', $data);
// 		$this->load->view('templates_admin/footer');

			
// 		}else{

// 		$id_guru = $this->input->post('id_guru');

// 		$row   = $this->m_data->get_iduser($id_guru);
// 		$rowid = $row->id; 

// 		$this->m_data->updateuserwali($rowid);



// 		$data = array(
// 			'id_guru_fk'=> $this->input->post('id_guru', true)
// 			);
// 		$this->m_data->input_wali($data, 'wali_kelas');
	
		
// 		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Wali kelas Berhasil Ditambah! </div>');
// 		redirect('admin/daftar_wali');


// 		}
// 	}

public function hapus_wali()
	{

		try {
		$id = $this->uri->segment(3);
		$id_tahun_ajaran_fk = $this->uri->segment(4);

		//$row   =$this->m_data->get_iduserwali($id);
		//$rowid = $row->id; 


        $this->db->delete('detail_kelas_siswa', array('id_kelas'=> $id,'id_tahun_ajaran_fk'=> $id_tahun_ajaran_fk));
        $db_error = $this->db->error();
        if (!empty($db_error)) {
           if($db_error['code'] == 0){
           	$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data Berhasil Dihapus </div>');
             //  $this->m_data->updatedeleteuserwali($rowid);
    			redirect('admin/daftar_rombel');
				
           }
           else{
           	$this->session->set_flashdata('message2','<div class="alert alert-danger" role="alert">Data Tidak Bisa Di Hapus!!!! </div>');
	    
    		redirect('admin/daftar_rombel');
           }
            return false; // unreachable retrun statement !!!
        }
	        return TRUE;
	    } catch (Exception $e) {
	        // this will not catch DB related errors. But it will include them, because this is more general. 
	        echo $e->getMessage();
	        return;
	    	}


		

}


// CONTROLLER SISWA


	public function daftar_siswa()//fix
	{
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

		$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester

		$data['siswa'] =  $this->m_data->tampil_siswa($tahun,$semester);
		$data['content'] = 'view_admin/data_siswa/daftar_siswa';


		$this->load->view('templates/templates', $data);
	}

	public function form()//fix
	{
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->m_data->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
				$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data Berhasil Diupload, Silahkan klik import.. </div>');
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		redirect("admin/daftar_siswa"); 
	}

	public function import()//fix
	{
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = [];
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, [
					'nama_siswa'=>$row['A'], // Insert data nis dari kolom A di excel
					'nipd'=>$row['B'], // Insert data nama dari kolom B di excel
					'jk'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
					'nisn'=>$row['D'], // Insert data jenis kelamin dari kolom C di excel
					'tempat_lahir'=>$row['E'], // Insert data jenis kelamin dari kolom C di excel
					'tgl_lahir'=>$row['F'], // Insert data jenis kelamin dari kolom C di excel
					'agama'=>$row['G'], // Insert data jenis kelamin dari kolom C di excel
					'alamat' =>$row['H'],
					'RT' =>$row['I'],
					'RW' =>$row['J'],
					'dusun' => $row['K'],
					'kelurahan'=> $row['L'],
					'kecamatan'=> $row['M'],
					'kode_pos'=> $row['N'],
					'no_hp_ortu'=>$row['O'], // Insert data jenis kelamin dari kolom C di excel
					
						
				]);
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

			try {
	       $this->m_data->insert_multiple($data);
	        $db_error = $this->db->error();
	        if (!empty($db_error)) {
	           if($db_error['code'] == 0){
	           	$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data Berhasil Diimport.. cek di detail anggota pada menu rombongan belajar </div>');
	           	    // $this->m_data->updatedeleteuserwali($rowid);
	    		redirect('admin/daftar_siswa');
				
	           }
	           else{
	           	$this->session->set_flashdata('message2','<div class="alert alert-danger" role="alert">Data Siswa Sudah Ada </div>');

	    		redirect('admin/daftar_siswa');
	           }
	            return false; // unreachable retrun statement !!!
	        }
		        return TRUE;
	    } catch (Exception $e) {
	        // this will not catch DB related errors. But it will include them, because this is more general. 
	        echo $e->getMessage();
	        return;
	    	}

	}


	public function form_siswa()//fix
	{
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

		$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester

		$data['kelas'] = $this->m_data->tampil_kelas();
		$data['siswa'] = $this->m_data->tampil_siswa($tahun,$semester);
		$data['content'] = 'view_admin/data_siswa/form_siswa';


		$this->load->view('templates/templates', $data);


	}
	public function tambah_siswa()//fix
	{
	
		$this->form_validation->set_rules('nama_siswa', 'nama_siswa', 'required|trim|is_unique[siswa.nama_siswa]',
			[
			'is_unique' => 'nama siswa sudah terdaftar !'
			]);

		$this->form_validation->set_rules('nipd', 'nipd', 'required|trim|numeric|is_unique[siswa.nipd]|min_length[4]|max_length[4]',
			[
			'is_unique' => 'nipd sudah terdaftar !'
			]);

		$this->form_validation->set_rules('nisn', 'nisn', 'required|trim|numeric|is_unique[siswa.nisn]|min_length[8]|max_length[8]',
			[
			'is_unique' => 'nisn sudah terdaftar!'
			]);

		$this->form_validation->set_rules('no_hp_ortu', 'no_hp_ortu', 'required|trim|numeric|min_length[10]|max_length[13]|is_unique[siswa.no_hp_ortu]',[
			'is_unique' => 'nomer hp sudah terdaftar !'
			]);

		$this->form_validation->set_rules('kode_pos', 'kode_pos','required|trim|numeric|min_length[5]|max_length[5]');
		// $idkelasv = $this->input->post('id_kelas');
		$jkv = $this->input->post('jk');
		$agamav = $this->input->post('agama');

		
		if ($this->form_validation->run() == false) 
		{
			$row = $this->m_data->count_pemberitahuan();
			$data['pemberitahuan'] = $this->m_data->pemberitahuan();
			$data['count_pemberitahuan'] = $row->jumlah;

			$tahun_ajaran = $this->session->userdata('tahun_ajaran');
			$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

			$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester


			$data['judul'] = 'Halaman Tambah Siswa';
			$data['content'] = 'view_admin/data_siswa/form_siswa_validasi';
			
		//	$data['validasi_kelas'] = $idkelasv;
            $data['kelas'] = $this->m_data->tampil_kelas();
		    $data['siswa'] = $this->m_data->tampil_siswa($tahun,$semester);
		    $data['validasi_jk'] =$jkv;
		    $data['validasi_agama']=$agamav;

			$this->load->view('templates/templates', $data);

			
		}else{

      

		$nama_siswa = $this->input->post('nama_siswa');
		$nipd = $this->input->post('nipd');
		$jk = $this->input->post('jk');
		$nisn = $this->input->post('nisn');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$myTime = strtotime($tgl_lahir); 
        $dateconvert = date("Y-m-d", $myTime);

		$agama = $this->input->post('agama');
		$alamat = $this->input->post('alamat');
		$rt = $this->input->post('RT');
		$rw = $this->input->post('RW');
		$dusun = $this->input->post('dusun');
		$kelurahan = $this->input->post('kelurahan');
		$kecamatan = $this->input->post('kecamatan');
		$kode_pos = $this->input->post('kode_pos');	
		$no_hp_ortu = $this->input->post('no_hp_ortu');
	

		$data = array(
			
			'nama_siswa'=> $nama_siswa,
			'nipd' => $nipd,
			'jk'=> $jk,
			'nisn' => $nisn,
			'tempat_lahir' => $tempat_lahir,
			'tgl_lahir' =>$dateconvert,
			'agama'=>$agama,
			'alamat'=> $alamat,
			'RT' => $rt,
			'RW' => $rw,
			'dusun' => $dusun,
			'kelurahan' => $kelurahan,
			'kecamatan' => $kecamatan,
			'kode_pos' => $kode_pos,
			'no_hp_ortu' => $no_hp_ortu

		);

		$this->m_data->input_siswa($data, 'siswa');
		//$this->m_data->input_guru($this->input->post());
		
		$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data Siswa Berhasil Ditambahkan! Silahkan ke menu rombongan belajar untuk registrasi siswa </div>');
		redirect('admin/daftar_siswa');

		}
	}
	public function edit_siswa($id_siswa)//fix
	{
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$data['kelas'] = $this->m_data->tampil_kelas();
		//$data['presensi'] = $this->m_data->tampil_presensi()->result();
		$data['siswa'] = $this->m_data->edit_siswa($id_siswa);
		$data['content'] = 'view_admin/data_siswa/edit_siswa';


		$this->load->view('templates/templates', $data);


	}

	public function update_siswa()//fix
	{

		$kode2 = $this->input->post('kode');
		$nama_siswa = $this->input->post('nama_siswa');
		$nipd = $this->input->post('nipd');
		$jk = $this->input->post('jk');
		$nisn = $this->input->post('nisn');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$agama = $this->input->post('agama');
		$alamat = $this->input->post('alamat');
		$rt = $this->input->post('RT');
		$rw = $this->input->post('RW');
		$dusun = $this->input->post('dusun');
		$kelurahan = $this->input->post('kelurahan');
		$kecamatan = $this->input->post('kecamatan');
		$kode_pos = $this->input->post('kode_pos');
		$no_hp = $this->input->post('no_hp_ortu');
	
	 
		$data = array(
			
			'nama_siswa'=> $nama_siswa,
			'nipd' => $nipd,
			'jk'=> $jk,
			'nisn' => $nisn,
			'tempat_lahir' => $tempat_lahir,
			'tgl_lahir' =>$tgl_lahir,
			'agama'=>$agama,
			'alamat'=> $alamat,
			'RT' => $rt,
			'RW' => $rw,
			'dusun' => $dusun,
			'kelurahan' => $kelurahan,
			'kecamatan' => $kecamatan,
			'kode_pos' => $kode_pos,
			'no_hp_ortu' => $no_hp

		);
	 
	 
		$this->m_data->update_siswa( $kode2,$data);

    	$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data Berhasil diubah </div>');
		redirect('admin/daftar_siswa');
	
		
	}

	public function hapus_siswa()//fix
	{

		try {
	        $this->db->delete('siswa', array('id_siswa'=> $this->input->get('id')));
	        $db_error = $this->db->error();
	        if (!empty($db_error)) {
	           if($db_error['code'] == 0){
	           	$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data Berhasil Dihapus </div>');
	           	    // $this->m_data->updatedeleteuserwali($rowid);
	    		redirect('admin/daftar_siswa');
				
	           }
	           else{
	           	$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data Tidak Bisa Di Hapus!!!! </div>');

	    		redirect('admin/daftar_siswa');
	           }
	            return false; // unreachable retrun statement !!!
	        }
		        return TRUE;
	    } catch (Exception $e) {
	        // this will not catch DB related errors. But it will include them, because this is more general. 
	        echo $e->getMessage();
	        return;
	    	}
								
	}

	// public function get_jadwalpresensi()
	// {

 //        $id=$this->input->post('id');
 //        $data=$this->m_data->get_mjadwalpresensi($id);
 //        echo json_encode($data);
 //    }

    // CONTROLLER TAHUN AJARAN
    public function daftar_tahunajaran()//fix
	{
        $row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;	
		$data['tahun_ajaran'] = $this->m_data->tampil_tahunajaran();
	
		$data['content']   =  'view_admin/tahun_ajaran/daftar_tahunajaran';
        $this->load->view('templates/templates',$data); 
		
	}

	public function edit_tahun($id_tahun_ajaran)//fix
	{
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;
		
		$data['tahun_ajaran'] = $this->m_data->edit_tahun($id_tahun_ajaran);
		$data['semester'] = $this->m_data->tampil_semester();
		//$data['status'] = $this->m_data->tampil_status_tahun();
		$data['content']   =  'view_admin/tahun_ajaran/edit_tahun';

		$this->load->view('templates/templates',$data); 

	}
	public function update_tahun()//fix
	{
		//$id_tahun_ajaran = $this->input->post('id_tahun_ajaran');
		$kode2 = $this->input->post('kode');
		$tahun_ajaran = $this->input->post('tahun_ajaran');
		$semester = $this->input->post('semester');
		$status = $this->input->post('status');

		$jumlah = $this->m_data->cek_tahun_semester($semester, $tahun_ajaran);
		if($status == "On"){
				$datas = array(
					'status' =>'Off'
			
					);
			$this->m_data->update_tahun_onoff($datas,$kode2);
			}
			if ($jumlah->cek > 0 )
			{

				if ($this->input->post('status_awal') == $this->input->post('status'))
				{
					$this->session->set_flashdata('message2','<div class="alert alert-danger" role="alert">Tahun Ajaran Sudah terdaftar! </div>');
					redirect('admin/daftar_tahunajaran');
				}
				else if($this->input->post('semester_awal') != $this->input->post('semester') && $this->input->post('status_awal') != $this->input->post('status') )
				{
					$data2 = array(
					'status' =>$status
			
					);
	
					$this->m_data->update_tahun($data2, $kode2);
					$this->session->set_flashdata('message2','<div class="alert alert-" role="alert">Tahun Ajaran Sudah terdaftar! tapi status telah berhasil diubah! </div>');
					redirect('admin/daftar_tahunajaran');
				}
				else 
				{
					$data2 = array(
					'status' =>$status
			
					);
	
					$this->m_data->update_tahun($data2, $kode2);
					$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Status Berhasil diubah! </div>');
					redirect('admin/daftar_tahunajaran');
				}

			
			} else{

				$data2 = array(
					'status' =>$status,
					'kd_semester' =>$semester
			
					);
	
					$this->m_data->update_tahun($data2, $kode2);
					$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Status Berhasil diubah! </div>');
					redirect('admin/daftar_tahunajaran');

			}
	}
	public function form_tahun()//fix
	{
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$data['tahun_ajaran'] = $this->m_data->tampil_tahun()->result();
		$data['semester'] = $this->m_data->tampil_semester();
		$data['content'] = 'view_admin/tahun_ajaran/form_tahun';

		$this->load->view('templates/templates', $data);

	}

	public function tambah_tahun()//fix
	{
	
	

		$this->form_validation->set_rules('tahun1', 'tahun1', 'required|trim');
		$this->form_validation->set_rules('tahun2', 'tahun2', 'required|trim|differs[tahun1]');


		
		if ($this->form_validation->run() == false) 
		{

			
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$data['tahun_ajaran'] = $this->m_data->tampil_tahun()->result();
		$data['semester'] = $this->m_data->tampil_semester();
		$data['content'] = 'view_admin/tahun_ajaran/form_tahun';

        $this->load->view('templates/templates',$data);
			
		}else{

		//$tahun_ajaran = $this->input->post('tahun_ajaran');
		$tahun_ajaran1 = $this->input->post('tahun1');
		$tahun_ajaran2 = $this->input->post('tahun2');
		$hasil_tahun = $tahun_ajaran1.'/'.$tahun_ajaran2;
		$status = $this->input->post('status');
		$semester = $this->input->post('semester');
		
		$jumlah = $this->m_data->cek_tahun_semester($semester, $hasil_tahun);
		if($status == "On"){
				$datas = array(
					'status' =>'Off'
			
					);
			$this->m_data->update_tahun_onoff($datas,$kode2);
			}
			if ($jumlah->cek > 0 )
			{

			
				$this->session->set_flashdata('message2','<div class="alert alert-danger" role="alert">Tahun Ajaran Sudah terdaftar! </div>');
				redirect('admin/form_tahun');
			} else {
				$data = array(
				'tahun_ajaran' => $hasil_tahun,
				'status' =>$status,
				'kd_semester' =>$semester
				);
	 
				$this->m_data->input_tahun($data, 'tahun_ajaran');
		
				$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Tahun Ajaran Baru Berhasil Ditambah! </div>');
				redirect('admin/daftar_tahunajaran');
			}
		}
	}

	// CONTROLLER KELAS SISWA
	public function daftar_kelas()
	{

		
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$data['kelas'] = $this->m_data->tampil_kelas();
		//$data['tahun_rombel'] = $this->m_data->tampil_tahun_rombel($tahun,$semester);
	
		$data['content']   =  'view_admin/data_kelas/daftar_kelas';
        $this->load->view('templates/templates',$data); 
		
	}

	public function form_kelas()
	{

		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$data['kelas'] = $this->m_data->tampil_kelas();

		$data['content'] = 'view_admin/data_kelas/form_kelas';


		$this->load->view('templates/templates', $data);


	}

	public function tambah_kelas()//fix
	{
		$this->form_validation->set_rules('nama_kelas', 'nama_kelas','required|trim|is_unique[kelas.nama_kelas]', [
			'is_unique' => 'Nama Kelas ini sudah terdaftar!']);
		$this->form_validation->set_rules('ruangan', 'ruangan','required|trim|is_unique[kelas.ruangan]', [
			'is_unique' => 'Ruangan Kelas ini sudah terdaftar!']);
		
		
		if ($this->form_validation->run() == false) 
		{
			$row = $this->m_data->count_pemberitahuan();
			$data['pemberitahuan'] = $this->m_data->pemberitahuan();
			$data['count_pemberitahuan'] = $row->jumlah;
			$data['pemberitahuan_detail'] = $this->m_data->pemberitahuan_detail();

			$data['judul'] = 'Halaman Tambah Rombel';
			$data['content'] = 'view_admin/data_kelas/form_kelas';


			$this->load->view('templates/templates', $data);
		} else {
			$this->m_data->input_kelas($this->input->post());
			$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data Berhasil Ditambah! </div>');
			redirect('admin/daftar_kelas');
		}
		
	}
	public function edit_kelas($id_kelas)//fix
	{
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$data['kelas'] = $this->m_data->edit_kelas($id_kelas)->row(1);

		$data['content']   =  'view_admin/data_kelas/edit_kelas';

		$this->load->view('templates/templates',$data);
		

	}
	public function update_kelas()//fix
	{
		$this->form_validation->set_rules('ruangan', 'ruangan','required|trim|is_unique[kelas.ruangan]', [
			'is_unique' => 'Ruangan Kelas ini sudah terdaftar!']);

		$id_kelas = $this->input->post('id_kelas');
		$nama_kelas = $this->input->post('nama_kelas');
		$tingkat_kelas = $this->input->post('tingkat_kelas');
		$ruangan = $this->input->post('ruangan');

		if ($this->form_validation->run() == false) 
		{
			$this->session->set_flashdata('message2','<div class="alert alert-danger" role="alert">Ruangan yang dipilih telah terdaftar </div>');
			redirect('admin/daftar_kelas');

		} else {

		$data = array(
			'id_kelas' => $id_kelas,
			'nama_kelas' => $nama_kelas,
			'tingkat_kelas' => $tingkat_kelas,
			'ruangan' => $ruangan,
		

			);
		
	 
		$this->m_data->update_kelas($data, $id_kelas);

		$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Kelas Baru Berhasil Ditambah! </div>');
		redirect('admin/daftar_kelas');
		}
	}
	public function hapus_kelas()//fix
	{
		try {
        $this->db->delete('kelas', array('id_kelas'=> $this->input->get('id_kelas', FALSE)));


        // documentation at
        // https://www.codeigniter.com/userguide3/database/queries.html#handling-errors
        // says; "the error() method will return an array containing its code and message"
        $db_error = $this->db->error();
        if (!empty($db_error)) {
           if($db_error['code'] == 0){
           	$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data Berhasil Dihapus </div>');
    		redirect('admin/daftar_kelas');
			
           }
           else{
           	$this->session->set_flashdata('message2','<div class="alert alert-danger" role="alert">KELAS Tidak Bisa Di Hapus karena sudah memiliki siswa </div>');
    		redirect('admin/daftar_kelas');
           }
            return false; // unreachable retrun statement !!!
        }
        return TRUE;
    } catch (Exception $e) {
        // this will not catch DB related errors. But it will include them, because this is more general. 
        echo $e->getMessage();
        return;
    }

		
	}	

	// CONTROLLER DETAIL KELAS SISWA

 	public function daftar_rombel()//fix
	{
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;
		
		$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

		$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester

		$data['rombel'] = $this->m_data->tampil_rombel($tahun);
		$data['tahun_rombel'] = $this->m_data->tampil_tahun_rombel($tahun,$semester);
	
		$data['content']   =  'view_admin/rombongan_belajar/daftar_rombel';
        $this->load->view('templates/templates',$data); 
		
	}

	public function form_rombel()//fix
	{

		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		
		$data['siswa'] = $this->m_data->tampil_siswa_all();
		$data['kelas'] = $this->m_data->tampil_kelas();
		$data['wali'] = $this->m_data->tampil_wali();
		$data['tahun'] = $this->m_data->tampil_tahunajaran();

		$data['content'] = 'view_admin/rombongan_belajar/form_rombel';


		$this->load->view('templates/templates', $data);


	}
	
	public function tambah_rombel()//fix
		{

		$kelas = $this->input->post('id_kelas');
		$tahun = $this->input->post('id_tahun_ajaran');
		$jumlah = $this->m_data->cek_wali_rombel($kelas, $tahun);
		$wali_kelas = $this->input->post('nip');

		if ($jumlah->cek > 0 )
		{


		$this->session->set_flashdata('message2','<div class="alert alert-danger" role="alert">Kelas Sudah terdaftar di tahun ajaran ini! </div>');
		redirect('admin/form_rombel');
		} else {


		if($this->input->post('id_siswa') == '' || $this->input->post('id_siswa') == null)
		{

		$jumlah2 = $this->m_data->cek_wali_kelas($wali_kelas, $tahun);


		if ($jumlah2->cek > 0 )
		{


		$this->session->set_flashdata('message2','<div class="alert alert-danger" role="alert">Wali Kelas Sudah terdaftar di tahun ajaran ini! </div>');
		redirect('admin/form_rombel');
		} else {

		//$siswa = $this->input->post('id_siswa');
		$kelas = $this->input->post('id_kelas');
		$wali = $this->input->post('nip');
		$tahun = $this->input->post('id_tahun_ajaran');

		$data = array(

		// 'id_siswa' => $siswa,
		'id_kelas' =>$kelas,
		'id_wali_fk' => $wali,
		'id_tahun_ajaran_fk' => $tahun
		);

		$this->m_data->input_detail($data,'detail_kelas_siswa');

		$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Data Berhasil Ditambah!</div>');
		redirect('admin/daftar_rombel');
		}
		       

		        }
		       else{ // NGINPUTKAN SEMUANYA

		$siswa = $this->input->post('id_siswa');
		$kelas = $this->input->post('id_kelas');
		$wali = $this->input->post('nip');
		$tahun = $this->input->post('id_tahun_ajaran');

		$data = array(

		'id_siswa' => $siswa,
		'id_kelas' =>$kelas,
		'id_wali_fk' => $wali,
		'id_tahun_ajaran_fk' => $tahun


		);

		$this->m_data->input_detail($data,'detail_kelas_siswa');

		$this->session->set_flashdata('message2','<div class="alert alert-danger" role="alert">Data Berhasil Ditambah! </div>');
		redirect('admin/daftar_rombel');
		}
		}

		}

	public function detail_anggota()//fix
	{
		$row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;

		$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

		$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester
		$id_kelas_fk = $this->input->post('id_kelas');
		$id_kelas = $this->uri->segment(3);
		$wali = $this->uri->segment(4);
		$kelas = $this->uri->segment(5);
		$data['id_guru'] = $this->uri->segment(6);
		$data['kelas'] = urldecode($kelas);
		$data['wali'] = urldecode($wali);
		$data['id_kelas'] = $id_kelas; 

		$row = $this->m_data->get_idtahunajaran($tahun,$semester);
		$data['id_tahun_ajaran']= $row->id_tahun_ajaran; 

		$data['siswa'] = $this->m_data->tampil_siswa2($tahun,$id_kelas);
		/////////////////////////////////////////////////////////////////////////
		$data['siswa_before'] = $this->m_data->tampil_siswa_before();
		$data['siswa_after'] = $this->m_data->tampil_siswa_after($tahun);
		// $data['kelas'] = $this->m_data->tampil_kelas();
		// $data['wali'] = $this->m_data->tampil_wali();
		// $data['tahun'] = $this->m_data->tampil_tahunajaran();
		
		//$data['rombel'] = $this->m_data->edit_rombel($id_detail)->row(1);

		$data['content']   =  'view_admin/rombongan_belajar/detail_anggota';

		$this->load->view('templates/templates',$data);
		

	}

	function insert_siswa_regis()//fix
	{
		$siswa = $this->input->post('id_siswa');
		$kelas = $this->input->post('id_kelas');
		$nama_guru = $this->input->post('nama_guru');
		$nama_kelas = $this->input->post('nama_kelas');
		$wali  = $this->input->post('id_wali_fk');
		$tahun = $this->input->post('id_tahun_ajaran_fk');

		$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$tahun2 = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

	
		$data = array(
			
			'id_siswa' => $siswa,
			'id_kelas' => $kelas,
			'id_wali_fk' => $wali,
			'id_tahun_ajaran_fk' => $tahun


			);
	
		$cek = $this->m_data->cek_siswa($siswa,$tahun2);


		$this->m_data->input_detail($data);
		$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Siswa Berhasil Diregistrasi.. </div>');
		redirect('admin/detail_anggota/'.$kelas.'/'.$nama_guru.'/'.$nama_kelas.'/'.$wali);

		

		
		
	}

	function hapus_anggota()//fix
	{
		$id_detail = $this->input->post('id_detail');
		$kelas = $this->input->post('id_kelas');
		$nama_guru = $this->input->post('nama_guru');
		$nama_kelas = $this->input->post('nama_kelas');
		$wali  = $this->input->post('id_wali_fk');
		$tahun = $this->input->post('id_tahun_ajaran_fk');

		
		try {
        $this->db->delete('detail_kelas_siswa', array('id_detail'=> $id_detail));

        $db_error = $this->db->error();
        if (!empty($db_error)) {
           if($db_error['code'] == 0){
           	$this->session->set_flashdata('message2','<div class="alert alert-info" role="alert">Siswa Berhasil Dikeluarkan! </div>');
    		redirect('admin/detail_anggota/'.$kelas.'/'.$nama_guru.'/'.$nama_kelas.'/'.$wali);
			
           }
           else{
           	$this->session->set_flashdata('message2','<div class="alert alert-danger" role="alert">Siswa Tidak Dapat Di Hapus karena sudah terdapat data presensi. </div>');
    		redirect('admin/detail_anggota/'.$kelas.'/'.$nama_guru.'/'.$nama_kelas.'/'.$wali);
           }
            return false; 
        }
        return TRUE;
    } catch (Exception $e) {
        echo $e->getMessage();
        return;
    }

		
	}

	// CONTROLLER NOTIFIKASI

		public function detail_pemberitahuan()//fix
	{ 

		$data = array(

			'judul' => 'sman2'
		);
        $row = $this->m_data->count_pemberitahuan();
		$data['pemberitahuan'] = $this->m_data->pemberitahuan();
		$data['count_pemberitahuan'] = $row->jumlah;
		$data['pemberitahuan_detail'] = $this->m_data->pemberitahuan_detail();
		$data['content']   =  'view_admin/detail_pemberitahuan';
        $this->load->view('templates/templates',$data); 
	}
		public function update_notif($id_history_guru)
	{
		
		$this->m_data->update_notif_model($id_history_guru);
		redirect('admin/detail_pemberitahuan');
	
		
	}

	// Presensi






}




 ?>
