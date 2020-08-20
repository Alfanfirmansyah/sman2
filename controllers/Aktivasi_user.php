<?php 


class Aktivasi_user extends CI_Controller

{
	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');	
		$this->load->model('m_data'); 	

	}
	public function validasi()

	{
		$data['id'] = $this->uri->segment(3);
		$data['judul'] = 'aktivasi akun' ;
		$this->load->view('templates_aktivasi/verifikasi', $data);
	}

	public function aktiv_val() 
	{
		$this->form_validation->set_rules('nip', 'nip','required|trim');
		$this->form_validation->set_rules('tgl_lahir', 'tgl_lahir','required|trim');


		$id_user = $this->input->post('id');
		$nip = $this->input->post('nip');
		$tgl_lahir = $this->input->post('tgl_lahir');
		//$guru = $this->m_data->tampil_guru();

		$cek = $this->m_data->cek_validasi($id_user,$nip,$tgl_lahir);
        
		//$guru = $this->db->get_where('guru',['nipd' => $nipd],['tgl_lahir' => $tgl_lahir])->row_array();
		if($cek > 0) {

		$this->m_data->update_aktivasi($id_user);

		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"> Selamat! Aktivasi berhasil, silahkan login! </div>');
		redirect('Loginbaru');		
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> nip atau Tanggal Lahir Anda salah! silahkan cek kembali </div>');
			redirect('Aktivasi_user/validasi/'.$id_user);
		}
		

	}
	public function validasi_link()

	{
		//$data['id'] = $this->uri->segment(3);
		$data['judul'] = 'aktivasi akun' ;
		$this->load->view('templates_aktivasi/verifikasi_link', $data);
	}

	public function aktiv_val_link() 
	{
		$this->form_validation->set_rules('username', 'username', 'required|trim');
		$this->form_validation->set_rules('nip', 'nip','required|trim');
		$this->form_validation->set_rules('tgl_lahir', 'tgl_lahir','required|trim');

		$username = $this->input->post('username');

		$row = $this->m_data->cek_username_link($username);
		$id_user = $row->id;

		
		$nip = $this->input->post('nip');
		$tgl_lahir = $this->input->post('tgl_lahir');

		$cek = $this->m_data->cek_validasi_link($id_user,$nip,$tgl_lahir);
        
		if($cek > 0) {

		$this->m_data->update_aktivasi($id_user);
	
		$this->session->set_flashdata('message','<div class="alert alert-info" role="alert"> Selamat! Akun Anda telah teraktivasi, silahkan login! </div>');
			redirect('Loginbaru');
			
		
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Username, nip dan Tanggal Lahir Anda salah! silahkan cek kembali </div>');
			redirect('Aktivasi_user/validasi_link/'.$id_user);
		}
		

	}
			}
	





?>