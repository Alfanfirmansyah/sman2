<?php 
class Loginuser extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('m_login');
		$this->load->library('session');
		
	}
	
	public function index()
	{ 



		$this->form_validation->set_rules('username', 'username','required');
		$this->form_validation->set_rules('password','password','required');

		if ($this->form_validation->run() == false) {
			//$data['tahun_ajaran'] = $this->m_login->tahun_ajaran();
			$data['judul'] = "Aplikasi Absensi SMAN2";
			$this->load->view('templates_login/login_user', $data);	
		}else{

			$this->login_val();
		}

	}	
	
	private function login_val(){
		

		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$password = md5($pass);
		//$tahun_ajaran = $this->input->post('tahun_ajaran');
			
		
		$cek = $this->m_login->cek_login($username,$password);


		if ($cek > 0) {

			//cek akun sudah aktif
			if ($cek['is_active'] == 1) {
				//cek password dan menu nya
				if ($password == $cek['password']) {

					$row = $this->m_login->get_tahun_ajaran();
					$tahun_ajaran = $row->tahun_ajaran;
					$semester = $row->semester;

					$row2 = $this->m_login->get_wali();
					$wali_kelas = $row2->wali_kelas;

					$data = [
						'id' => $cek['id'],
						'username' => $cek['username'],
						'role_id_fk' => $cek['role_id_fk'],
						'id_guru' => $cek['id_guru'],
						'nip' => $cek['id_wali_fk'],
						'nama_guru' => $cek['nama_guru'],
						'ketua_kelas' => $cek['ketua_kelas'],
						'foto' => $cek['foto'],
						'role' => $cek['role'],
						'tahun_ajaran' => $tahun_ajaran,
						'semester' => $semester,
						//'nip' => $wali_kelas,
						'id_kelas' => $cek['id_kelas']
					];
					if ($cek['role_id_fk'] == '2') {
						$this->session->set_userdata($data);
						$this->session->set_flashdata('hehe');
						redirect('guru'); 
					}elseif ($cek['role_id_fk'] == '3'){
						$this->session->set_userdata($data);
						$this->session->set_flashdata('hehe');
		
						redirect('wali_kelas');
					}elseif ($cek['role_id_fk'] == '4'){
						$this->session->set_userdata($data);
						$this->session->set_flashdata('hehe');
						redirect('ketua_kelas');
					}else{
						//login admin di url loginuser
						$this->session->set_flashdata('hehe', ' 
						<script>
		  				alert("Anda tidak punya hak akses!");
						</script>');
						redirect('Loginuser');

					
					}
				} else {
					//jika akun terdaftar tp password salah
					$this->session->set_flashdata('hehe','<div class="alert alert-danger" role="alert"> password Salah! </div>');
						redirect('Loginuser');
				}

			}
				else if($cek['is_active'] == 0){
				if ($password == $cek['password']) {

					$id_user_aktivasi = $cek['id'];
				}

				$this->session->set_flashdata('message', ' 
				<script>
  				alert("Silahkan aktivasi akun anda!");
				</script>');
				 redirect('aktivasi_user/validasi/'.$id_user_aktivasi); 
				}
				
			
		}else{
				// jika username dan pass tidak terdaftar
				$this->session->set_flashdata('hehe', ' 
				<script>
  				alert("Username/Password Tidak terdaftar!");
				</script>');
				 redirect('Loginuser');

				}

	
		

	}

	public function form() {
		$string = 'contoh pesan';
		$this->session->set_flashdata('role_id', $string);
		$this->load->view('form_flash');
	}
	public function hasil() {
		$this->load->view('hasil_flash');
	}
	function logout(){
	$this->session->sess_destroy();
	redirect(base_url('index'));
}

}


 ?>
