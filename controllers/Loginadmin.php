<?php 
class Loginadmin extends CI_Controller
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
			
			$data['tahun_ajaran'] = $this->m_login->tahun_ajaran();
			
			$data['judul'] = "Aplikasi Absensi SMAN2";
			$this->load->view('templates_login/login', $data);	
		}else{

			$this->login_val();
		}

	}	
	
	private function login_val(){
		

		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$password = md5($pass);
		$tahun_ajaran = $this->input->post('tahun_ajaran');
	
		if ($tahun_ajaran == null || $tahun_ajaran == '' || empty($tahun_ajaran)) 
		{
			$this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Pilih tahun ajaran </div>');
			redirect('loginadmin');
	
		}  else {

	
		
		$cek = $this->m_login->cek_login($username,$password);


		if ($cek > 0) {
			//cek akun sudah aktif
			if ($cek['is_active'] == 1) {
				//cek password dan menu nya
				if ($password == $cek['password']) {

					$data = [
						'id' => $cek['id'],
						'username' => $cek['username'],
						'role_id_fk' => $cek['role_id_fk'],
						'id_guru' => $cek['id_guru'],
						'nip' => $cek['id_wali_fk'],
						'nama_guru' => $cek['nama_guru'],
						'siswa_admin' => $cek['siswa_admin'],
						'foto' => $cek['foto'],
						'role' => $cek['role'],
						'tahun_ajaran' => $tahun_ajaran,
						'id_kelas_fk' => $cek['id_kelas_fk']
						
					];
					if ($cek['role_id_fk'] == '2') {
				
						$this->session->set_flashdata('message', ' 
						<script>
		  				alert("Anda tidak punya hak akses!");
						</script>');
						redirect('loginadmin'); 
					}elseif ($cek['role_id_fk'] == '3'){
					
						$this->session->set_flashdata('message', ' 
						<script>
		  				alert("Anda tidak punya hak akses!");
						</script>');
						redirect('loginadmin');
					}elseif ($cek['role_id_fk'] == '4'){
						
						$this->session->set_flashdata('message', ' 
						<script>
		  				alert("Anda tidak punya hak akses!");
						</script>');
						redirect('loginadmin');
					}else{
						$this->session->set_userdata($data);
						$this->session->set_flashdata('message');
						redirect('admin');
					}
				} else {
						//jika akun terdaftar tp password salah
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> password Salah! </div>');
						redirect('Loginadmin');
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

				$this->session->set_flashdata('message', ' 
				<script>
  				alert("Username/Password Salah!");
				</script>');
				 redirect('Loginadmin');

				}

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
