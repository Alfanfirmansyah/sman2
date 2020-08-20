<?php 
 
class M_data extends CI_Model
{

	function edit_profil()
	{
		return $this->db->get_where('profil_sekolah',array('id' => 1))->row();
	}
	function update_profil($data)
	{
		$this->db->where(['id' => 1]);
		return $this->db->update('profil_sekolah',$data);
	}


	// wa 
	function siswa_wa($tahun,$semester,$tgl)
	{

		$this->db->select('*');
		$this->db->from('presensi');
		$this->db->join('detail_kelas_siswa', 'presensi.id_siswa_fk = detail_kelas_siswa.id_detail');
		$this->db->join('siswa','detail_kelas_siswa.id_siswa = siswa.id_siswa');
		$this->db->join('guru', 'detail_kelas_siswa.id_wali_fk = guru.id_guru' );
		$this->db->join('jadwal_pelajaran', 'presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal ');
		$this->db->join('kelas','jadwal_pelajaran.id_kelas_fk = kelas.id_kelas');
		$this->db->join('keterangan_presensi','presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan');
		$this->db->join('history_message', 'presensi.id_presensi = history_message.id_presensi_fk', 'LEFT');
		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
		$this->db->join('keterangan_semester','tahun_ajaran.kd_semester = keterangan_semester.kd_semester');
		$where = "tahun_ajaran.tahun_ajaran = '$tahun' AND keterangan_semester.semester='$semester' AND presensi.tgl='$tgl' AND keterangan_presensi.kd_keterangan='A' ";
 		
		$this->db->where($where);
		$this->db->group_by('siswa.id_siswa');
		return $this->db->get()->result();
	}

	function wa_message_send($data)
	{
		$this->db->insert('history_message',$data);
	}

	function cek_wa($id_presensi,$tgl)
	{

	 	$this->db->select('*');    
     	$this->db->from('history_message');
     	$array = array('id_presensi_fk' => $id_presensi,
     					'tanggal_terkirim' => $tgl
     					);
    	$this->db->where($array);
		return $this->db->get()->num_rows();
	}
	
// model dashboard admin
	function countuser()
	{
	    $this->db->select('count(id) as totalcount');
		$this->db->from('users');
		$this->db->where('id != 1');
		return $this->db->get()->result();
    }
	function countguru()
	{
	    $this->db->select('count(id_guru) as totalcount');
		$this->db->from('guru');
		return $this->db->get()->result();
    }
    function countwali($tahun,$semester)
    {
	    $this->db->select('detail_kelas_siswa.id_wali_fk');
	    $this->db->from('guru');
	    $this->db->join('detail_kelas_siswa', 'guru.id_guru = detail_kelas_siswa.id_wali_fk');
	    $this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran','left');

 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );

		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('keterangan_semester.semester', $semester);		
		
	    $this->db->group_by('detail_kelas_siswa.id_wali_fk');
		$query = $this->db->get();
       return $count = $query->num_rows();

    }
    function countsiswa($tahun,$semester)
    {	
    	$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('detail_kelas_siswa', 'siswa.id_siswa = detail_kelas_siswa.id_siswa','left');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas','left');
		$this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran','left');

 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );

		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('keterangan_semester.semester', $semester);		
		
		$query = $this->db->get();
       return $count = $query->num_rows();		
    }
    function graph($tahun,$semester)
    {
		$date = date('Y-m-d');
		$data = $this->db->query("SELECT keterangan_presensi.nama_keterangan,COUNT(view_presensi.kd_keterangan_fk) as jumlah FROM view_presensi right JOIN keterangan_presensi ON view_presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan 
			join jadwal_pelajaran on view_presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal
			join tahun_ajaran on jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran
			join keterangan_semester on tahun_ajaran.kd_semester = keterangan_semester.kd_semester
			where view_presensi.tgl = '$date' and tahun_ajaran.tahun_ajaran = '$tahun' and keterangan_semester.semester = '$semester' GROUP BY keterangan_presensi.kd_keterangan ");
		return $data->result();
	}
	function counthadir($tahun,$semester)
	{
	    $this->db->select('count(id_presensi) as totalhadir');
		$this->db->from('view_presensi');
		$this->db->join('jadwal_pelajaran', 'view_presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal','left');
		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran','left');

 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );

		$array = array('kd_keterangan_fk' => 'H',
	     					'tgl' => date("Y-m-d"),
	     					'tahun_ajaran.tahun_ajaran' => $tahun,
	     					'keterangan_semester.semester' => $semester

	     					);
	    	$this->db->where($array);
		
		return $this->db->get()->row();
    }
    function countsakit($tahun,$semester)
	{
	    $this->db->select('count(id_presensi) as totalsakit');
		$this->db->from('view_presensi');
		$this->db->join('jadwal_pelajaran', 'view_presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal','left');
		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran','left');

 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );
		$array = array('kd_keterangan_fk' => 'S',
	     					'tgl' => date("Y-m-d"),
	     					'tahun_ajaran.tahun_ajaran' => $tahun,
	     					'keterangan_semester.semester' => $semester
	     					);
	    	$this->db->where($array);
		
		return $this->db->get()->row();
    }
    function countizin($tahun,$semester)
	{
	    $this->db->select('count(id_presensi) as totalizin');
		$this->db->from('view_presensi');
		$this->db->join('jadwal_pelajaran', 'view_presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal','left');
		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran','left');

 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );
		$array = array('kd_keterangan_fk' => 'I',
	     					'tgl' => date("Y-m-d"),
	     					'tahun_ajaran.tahun_ajaran' => $tahun,
	     					'keterangan_semester.semester' => $semester
	     					);
	    	$this->db->where($array);
		
		return $this->db->get()->row();
    }
    function countabsen($tahun,$semester)
	{
	    $this->db->select('count(id_presensi) as totalabsen');
		$this->db->from('view_presensi');
		$this->db->join('jadwal_pelajaran', 'view_presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal','left');
		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran','left');

 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');
		$array = array('kd_keterangan_fk' => 'A',
	     					'tgl' => date("Y-m-d"),
	     					'tahun_ajaran.tahun_ajaran' => $tahun,
	     					'keterangan_semester.semester' => $semester
	     					);
	    $this->db->where($array);
		
		return $this->db->get()->row();
    }
    function countdispensasi($tahun,$semester)
	{
	    $this->db->select('count(id_presensi) as totaldispensasi');
		$this->db->from('view_presensi');
		$this->db->join('jadwal_pelajaran', 'view_presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal','left');
		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran','left');

 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );
		$array = array('kd_keterangan_fk' => 'D',
	     					'tgl' => date("Y-m-d"),
	     					'tahun_ajaran.tahun_ajaran' => $tahun,
	     					'keterangan_semester.semester' => $semester
	     					);
	    $this->db->where($array);
		
		return $this->db->get()->row();
    }

    function countAll($tahun,$semester)
    {
	    $this->db->select('count(id_presensi) as total');
		$this->db->from('view_presensi');
		$this->db->join('jadwal_pelajaran', 'view_presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal','left');
		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran','left');

 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );
	   	$array = array(	'tgl' => date("Y-m-d"),
	     					'tahun_ajaran.tahun_ajaran' => $tahun,
	     					'keterangan_semester.semester' => $semester
	     					);
	    $this->db->where($array);
		
		return $this->db->get()->row();
	}

	//ini model user management

	function tampil_datauser()
	{
		$this->db->select('*');    
        $this->db->from('users');
        $this->db->join('user_role', 'users.role_id_fk = user_role.id_role','left');
        // $this->db->join('guru', 'users.id_guru_fk = guru.id_guru');
       	// $this->db->join('detail_kelas_siswa', 'guru.nip = detail_kelas_siswa.id_wali_fk');
       	// $this->db->join('siswa', ' detail_kelas_siswa.id_siswa = siswa.id_siswa');
        $this->db->where('id != 1');
        $query = $this->db->get();
        return $query->result();
	}

	function tampil_roleuser()
	{
		$this->db->select('*');
		$this->db->from('user_role');
		$query = $this->db->get();
        return $query->result();	
	}

	function tampil_ketua_kelas()
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('detail_kelas_siswa', 'siswa.id_siswa = detail_kelas_siswa.id_siswa');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran' );
		$this->db->group_by('siswa.id_siswa');
		$query = $this->db->get();
        return $query->result();		
	}

	function input_user($data)
	{
		$this->db->insert('users',$data);		
	}

	function edit_user($id)
	{
		return $this->db->get_where('users',array('id' => $id))->row();
	}

	function update_user($data,$id)
	{
		$this->db->where(['id' => $id]);
		return $this->db->update('users',$data);
	}

	// INI MODEL GURU
		
	function tampil_guru()
	{

		$this->db->select('*');
		$this->db->from('guru');

		return $this->db->get()->result();

 		//return $this->db->query("call tampil_guru();");
	}
	
	function input_guru($data)
	{
		$this->db->insert('guru',$data);	
	}

	function tampil_username()
	{
		return $this->db->get('users');
	}

	function edit_guru($id_guru)
	{
		return $this->db->get_where('guru',array('id_guru' => $id_guru))->row();
	}

	function update_guru($kode2,$data)
	{
		$this->db->where('id_guru', $kode2);
		$this->db->update('guru',$data);
	}

	// ini model siswa

		//function upload untuk siswa & guru
	public function upload_file($filename)
	{
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
		// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
	public function insert_multiple($data)
	{
		$this->db->insert_batch('siswa', $data);
	}
	public function insert_multiple_guru($data)
	{
		$this->db->insert_batch('guru', $data);
	}
	
	function tampil_siswa($tahun,$semester)
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('detail_kelas_siswa', 'siswa.id_siswa = detail_kelas_siswa.id_siswa','left');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas','left');
		$this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran','left');

 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );

		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('keterangan_semester.semester', $semester);		
		
		return $this->db->get()->result();		
	}

	function tampil_siswa2($tahun_ajaran,$id_kelas)
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('detail_kelas_siswa', 'siswa.id_siswa = detail_kelas_siswa.id_siswa','left');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas','left');
		$this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran','left');
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');
		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun_ajaran);
		$this->db->where('detail_kelas_siswa.id_kelas', $id_kelas);
		return $this->db->get()->result();		
	}

	
	function get_idtahunajaran($tahun_ajaran,$semester)
	{
		$this->db->select('*');
		$this->db->from('tahun_ajaran');
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');
		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun_ajaran);
		$this->db->where('keterangan_semester.semester', $semester);
		return $this->db->get()->row();
	}
	function input_siswa($data)
	{
		$this->db->insert('siswa',$data);
	}
	function edit_siswa($id_siswa)
	{
		return $this->db->get_where('siswa',array('id_siswa' => $id_siswa))->row();
	}
	function update_siswa($kode2,$data)
	{
		$this->db->where('id_siswa', $kode2);
		$this->db->update('siswa',$data);
	}

	function tampil_wali()
	{
		$this->db->select('*');
		$this->db->from('guru');
		$this->db->join('users', 'guru.id_guru = users.id_guru_fk');
		$this->db->where('users.role_id_fk',3);		

		$query = $this->db->get();
		return $query->result();
	}


	// ini model jadwalpelajaran

		function tampil_jdwl12($tahun,$semester)
	{
		$this->db->select('*');
		$this->db->from('jadwal_pelajaran');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel','left');
		$this->db->join('kelas', 'jadwal_pelajaran.id_kelas_fk = kelas.id_kelas','left');
		$this->db->join('guru', ' jadwal_pelajaran.id_guru_fk = guru.id_guru','left');
		$this->db->join('tahun_ajaran', ' jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran','left');
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );

		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('keterangan_semester.semester', $semester);
		$this->db->order_by('jadwal_pelajaran.id_jadwal', 'desc');

		return $this->db->get()->result();
		
	}
		function tampil_detailj()
	{
		return $this->db->get('mata_pelajaran');
	}
	
		function tampil_kelas()
	{
		$this->db->select('*');    
        $this->db->from('kelas');
        $query = $this->db->get();
        return $query->result();
	}

	// JADWAL PELAJARAN

		function tampil_guru_jadwal()
	{

		$this->db->select('*');
		$this->db->from('guru');
		$this->db->join('users', 'guru.id_guru = users.id_guru_fk');
		$where = "users.role_id_fk IN (2,3)";
		$this->db->where($where);

		return $this->db->get()->result();

 		//return $this->db->query("call tampil_guru();");
	}

	function input_jadwal($data)
	{
		$this->db->insert('jadwal_pelajaran',$data);	
	}

	function edit_jadwal($id)
	{
		return $this->db->get_where('jadwal_pelajaran',array('id_jadwal' => $id));
	}

	function update_jadwal($data,$id)
	{
		$this->db->where('id_jadwal', $id);
		$this->db->update('jadwal_pelajaran',$data);
	}

	function cek_insert_jadwal($hari,$jam_pelajaran,$kd_mapel_fk,$id_kelas_fk,$id_tahun_ajaran_fk)
	{
		$this->db->select('count(jam_pelajaran) as cek');
	    $this->db->from('jadwal_pelajaran');
	    $where = "hari = '$hari' AND jam_pelajaran = '$jam_pelajaran' AND kd_mapel_fk = '$kd_mapel_fk' and id_kelas_fk = '$id_kelas_fk' and id_tahun_ajaran_fk = '$id_tahun_ajaran_fk'";
	    $this->db->where($where);
		return $this->db->get()->row();
	}
	function cek_insert_jadwal2($hari,$jam_pelajaran,$id_kelas,$id_tahun_ajaran_fk)
	{
		$this->db->select('count(jam_pelajaran) as cek');
	    $this->db->from('jadwal_pelajaran');
	    $where = "hari = '$hari' AND jam_pelajaran = '$jam_pelajaran' and id_kelas_fk = '$id_kelas' and id_tahun_ajaran_fk = '$id_tahun_ajaran_fk'";
	    $this->db->where($where);
		return $this->db->get()->row();
	}
		function cek_edit_jadwal2($jam_pelajaran,$id_kelas,$id_tahun_ajaran_fk)
	{
		$this->db->select('count(jam_pelajaran) as cek');
	    $this->db->from('jadwal_pelajaran');
	    $where = "jam_pelajaran = '$jam_pelajaran' and id_kelas_fk = '$id_kelas' and id_tahun_ajaran_fk = '$id_tahun_ajaran_fk'";
	    $this->db->where($where);
		return $this->db->get()->row();
	}
	function cek_insert_jadwal3($hari,$kd_mapel_fk,$id_kelas,$id_tahun_ajaran_fk)
	{
		$this->db->select('count(jam_pelajaran) as cek');
	    $this->db->from('jadwal_pelajaran');
	    $where = "hari = '$hari' AND kd_mapel_fk = '$kd_mapel_fk' and id_kelas_fk = '$id_kelas' and id_tahun_ajaran_fk = '$id_tahun_ajaran_fk'";
	    $this->db->where($where);
		return $this->db->get()->row();
	}
	function cek_insert_jadwal4($hari,$jam_pelajaran,$id_guru_fk,$id_tahun_ajaran_fk)
	{
		$this->db->select('count(jam_pelajaran) as cek');
	    $this->db->from('jadwal_pelajaran');
	    $where = "hari = '$hari' AND jam_pelajaran = '$jam_pelajaran' and id_guru_fk = '$id_guru_fk' and id_tahun_ajaran_fk = '$id_tahun_ajaran_fk'";
	    $this->db->where($where);
		return $this->db->get()->row();
	}

	// MODEL PRESENSI

	function eTampilPresensi($id_presensi)
	{
		$this->db->select('*');
		$this->db->from('presensi');
		$this->db->join('detail_kelas_siswa', 'presensi.id_siswa_fk = detail_kelas_siswa.id_detail');
		$this->db->join('siswa','detail_kelas_siswa.id_siswa = siswa.id_siswa');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('jadwal_pelajaran', 'presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->where('id_presensi', $id_presensi);
		return $this->db->get()->result();	
	}

	function cek_absens($id_jadwal,$cektgl)
	{

	 	$this->db->select('*');    
     	$this->db->from('presensi');
     	$this->db->join('jadwal_pelajaran', 'presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal');
     	$array = array('id_jadwal_fk' => $id_jadwal,
     					'tgl' => $cektgl
     					);
    	$this->db->where($array);
		return $this->db->get()->num_rows();
	}

    function status_absen($id,$kode){
    	$this->db->set('opsi_buka_absen', $kode);
        $this->db->where('id', $id);
		$this->db->update('users');

    }
    
	function tampil_presensi3($tahun,$semester)
	{   

		$this->db->select('*');
		$this->db->from('presensi');
		$this->db->join('detail_kelas_siswa', 'presensi.id_siswa_fk = detail_kelas_siswa.id_detail');
		$this->db->join('siswa', 'detail_kelas_siswa.id_siswa = siswa.id_siswa');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('keterangan_presensi', 'presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan');
		$this->db->join('jadwal_pelajaran', ' presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );

		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('keterangan_semester.semester', $semester);
		$this->db->order_by('presensi.id_presensi', 'desc');
		return $this->db->get()->result();
	}

	function tampil_rombelpresensi3()
	{
		$this->db->select('*');
		$this->db->from('kelas');
		return $this->db->get();
	
	}
	function input_presensi12($result)
	{
		$this->db->insert_batch('presensi',$result);
	}
	function tampil_jadwalll($id_kelas_fk,$hariindonesia,$tahun,$semester)
	{
		$this->db->select("TIMEDIFF (CURRENT_TIME,master_jam_pelajaran.waktu_mulai) as batas_input,
			jadwal_pelajaran.*,mata_pelajaran.*");
		$this->db->from('jadwal_pelajaran');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');
		$this->db->join('master_jam_pelajaran', 'jadwal_pelajaran.jam_pelajaran_dimulai = master_jam_pelajaran.jam_pelajaran_dimulai');
		$this->db->where('jadwal_pelajaran.id_kelas_fk', $id_kelas_fk);
		$this->db->where('jadwal_pelajaran.hari', $hariindonesia);
		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('keterangan_semester.semester', $semester);
		
		$this->db->order_by('jadwal_pelajaran.jam_pelajaran', 'asc');
		
		return $this->db->get();
	}

	function tampil_keterangan()
	{
		return $this->db->get('keterangan_presensi');
	
	}
	
	function update_presensi12($id_presensi,$data){
		$this->db->where('id_presensi', $id_presensi);
		$this->db->update('presensi',$data);
	}


	// MODEL TAHUN AJARAN BARU
    //model cek unique tahun_ajaran
    function update_tahun_onoff($datas,$kode2)
	{
		$where = "id_tahun_ajaran != '$kode2'";
		$this->db->where($where);
		$this->db->update('tahun_ajaran',$datas);
	}

    function cek_tahun_semester($kd_semester, $tahun_ajaran)
    {
	    $this->db->select('count(tahun_ajaran) as cek');
	    $this->db->from('tahun_ajaran');
	    $where = "kd_semester = '$kd_semester' and tahun_ajaran = '$tahun_ajaran'";
	    $this->db->where($where);
		return $this->db->get()->row();
    }

    function tampil_tahunajaran()
	{
		$this->db->select('*');
		$this->db->from('tahun_ajaran');
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');
		$this->db->order_by('tahun_ajaran.id_tahun_ajaran', 'desc');
		$query = $this->db->get();
        return $query->result();
			
	}
	function edit_tahun($id_tahun_ajaran)
	{
		return $this->db->get_where('tahun_ajaran',array('id_tahun_ajaran' => $id_tahun_ajaran))->row();
	}
	
	function tampil_semester()
	{
		$this->db->select('*');
		$this->db->from('keterangan_semester');
		$query = $this->db->get();
        return $query->result();			
	}

	function update_tahun($data,$kode2)
	{
		$this->db->where('id_tahun_ajaran', $kode2);
		$this->db->update('tahun_ajaran',$data);
	}

	function tampil_tahun()
	{
		return $this->db->get('tahun_ajaran');
	}

	function input_tahun($data)
	{
		$this->db->insert('tahun_ajaran',$data);
		
	}

	function input_kelas($data)
	{
		$this->db->insert('kelas',$data);
		
	}
	function edit_kelas($id_kelas)
	{
		return $this->db->get_where('kelas',array('id_kelas' => $id_kelas));
	}
	function update_kelas($data,$id_kelas)
	{
		$this->db->where('id_Kelas', $id_kelas);
		$this->db->update('kelas',$data);
	}


	// MODEL ROMBONGAN BELAJAR SISWA

	function tampil_rombel($tahun)
	{
	  	$this->db->select('*');
		$this->db->from('kelas');
		$this->db->join('detail_kelas_siswa', 'kelas.id_kelas = detail_kelas_siswa.id_kelas');
		$this->db->join('guru', 'detail_kelas_siswa.id_wali_fk = guru.id_guru
 	  		' );
		$this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran' );
 	  	
 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );
 		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
 		$this->db->group_by('detail_kelas_siswa.id_kelas'); // Order by
 		$this->db->order_by('detail_kelas_siswa.id_kelas', 'desc');
 		
		
		return $this->db->get()->result();
		
	}


    //model cek unique ROMBEL
    function cek_wali_rombel($id_kelas, $id_tahun_ajaran_fk)
    {
	    $this->db->select('count(id_kelas) as cek');
	    $this->db->from('detail_kelas_siswa');
	    $where = "id_kelas = '$id_kelas' and id_tahun_ajaran_fk = '$id_tahun_ajaran_fk'";
	    $this->db->where($where);
		return $this->db->get()->row();
    }
    function cek_wali_kelas($wali_kelas, $id_tahun_ajaran_fk)
    {
	    $this->db->select('count(id_kelas) as cek');
	    $this->db->from('detail_kelas_siswa');
	    $where = "id_wali_fk = '$wali_kelas' and id_tahun_ajaran_fk = '$id_tahun_ajaran_fk'";
	    $this->db->where($where);
		return $this->db->get()->row();
    }

	function tampil_tahun_rombel($tahun_ajaran,$semester)
	{
	  	$this->db->select('detail_kelas_siswa.id_detail,siswa.nama_siswa, kelas.nama_kelas, tahun_ajaran.tahun_ajaran, guru.nama_guru');
		$this->db->from('siswa');
		$this->db->join('detail_kelas_siswa', 'siswa.id_siswa = detail_kelas_siswa.id_siswa');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran' );
 	  	$this->db->join('guru', 'detail_kelas_siswa.id_wali_fk = guru.id_guru
 	  		' );
 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );
 		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun_ajaran);
 		$this->db->where('keterangan_semester.semester', $semester);
 	    $this->db->order_by('tahun_ajaran.id_tahun_ajaran'); // Order by
        $this->db->limit(1); 
		
		return $this->db->get()->result();
		
	}
	function input_detail($data)
	{
		$this->db->insert('detail_kelas_siswa',$data);	
		
	}

	function tampil_siswa_all()
	{
		$current_year = date("Y");
		$this->db->select('*');
		$this->db->from('siswa');
		
		$where = "YEAR(CREATED_ADD) BETWEEN YEAR(DATE_SUB(CURRENT_DATE, INTERVAL 2 YEAR)) AND YEAR(CURRENT_DATE)";

		$this->db->where($where);
		return $this->db->get()->result();
	}


	function tampil_siswa_before()
	{
		$this->db->select('siswa.id_siswa,siswa.nama_siswa,siswa.tgl_lahir,siswa.jk,siswa.nipd,siswa.nisn');
	    $this->db->from('siswa');
	    $this->db->join('detail_kelas_siswa', 'siswa.id_siswa = detail_kelas_siswa.id_siswa', 'left');
	    $this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran', 'left');
	    $this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester', 'left');
	 
	    $this->db->group_by('siswa.id_siswa');
		return $this->db->get()->result();
	}

	function tampil_siswa_after($tahun)
	{
		$this->db->select('siswa.id_siswa,siswa.nama_siswa,siswa.tgl_lahir,siswa.jk,siswa.nipd,siswa.nisn');
	    $this->db->from('siswa');
	    $this->db->join('detail_kelas_siswa', 'siswa.id_siswa = detail_kelas_siswa.id_siswa', 'left');
	    $this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran', 'left');
	    $this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester', 'left');
	 	$where = "tahun_ajaran.tahun_ajaran = '$tahun'";
		$this->db->where($where);
	    $this->db->group_by('siswa.id_siswa');
		return $this->db->get()->result();
	}

	function cek_siswa($id_siswa,$tahun)
	{
		$this->db->select('count(siswa.id_siswa) as jumlah');
	    $this->db->from('siswa');
	    $this->db->join('detail_kelas_siswa', 'siswa.id_siswa = detail_kelas_siswa.id_siswa', 'left');
	    $this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran', 'left');
	    $this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester', 'left');
	    
	    $where = "siswa.id_siswa = '$id_siswa' and tahun_ajaran.tahun_ajaran = '$tahun'";
 		
		$this->db->where($where);
		return $this->db->get()->row();
	}
	
	//model pemberitahuan
    function count_pemberitahuan()
    {
	    $this->db->select('count(id_history_guru) as jumlah');
	    $this->db->from('history_guru');
	    $where = "status = '0' and (kd_keterangan_guru_fk = 1 or kd_keterangan_guru_fk = 2 or kd_keterangan_guru_fk = 3)";
	    $this->db->where($where);
		return $this->db->get()->row();
    }

    function update_notif_model($id_history_guru)
    {
    	$this->db->set('status', 1);
        $this->db->where('id_history_guru', $id_history_guru);
		$this->db->update('history_guru');
    }

     function pemberitahuan()
     {
		$this->db->select('history_guru.id_history_guru, guru.nama_guru, history_guru.tgl, mata_pelajaran.nama_pelajaran, keterangan_guru.keterangan_guru');
	    $this->db->from('history_guru');
	    $this->db->join('presensi', 'history_guru.tgl = presensi.tgl');
	    $this->db->join('jadwal_pelajaran', 'presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal');
	    $this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->join('keterangan_guru', 'history_guru.kd_keterangan_guru_fk = keterangan_guru.kd_keterangan_guru');
		$this->db->join('detail_kelas_siswa', 'presensi.id_siswa_fk = detail_kelas_siswa.id_detail');
		$this->db->join('guru', 'detail_kelas_siswa.id_wali_fk = guru.id_guru');
		$where = "STATUS = 0 AND ( kd_keterangan_guru_fk = 1 or kd_keterangan_guru_fk = 2 or kd_keterangan_guru_fk = 3) AND history_guru.id_jadwal_fk=presensi.id_jadwal_fk ";
 		
		$this->db->where($where);
		$this->db->group_by('history_guru.id_history_guru', 'DESC');
		return $this->db->get()->result();

  
    }

    function pemberitahuan_detail(){
    	$tahun_ajaran = $this->session->userdata('tahun_ajaran');
		$tahun = substr($tahun_ajaran,0,9); //muncul tahun_ajaran saja

		$semester = substr($tahun_ajaran, strrpos($tahun_ajaran, ' ' )+1); //semester

		$this->db->select('history_guru.id_history_guru, guru.nama_guru, history_guru.tgl, mata_pelajaran.nama_pelajaran, keterangan_guru.keterangan_guru,kelas.nama_kelas, jadwal_pelajaran.jam_pelajaran, history_guru.keterangan');
		$this->db->from('history_guru');
		$this->db->join('presensi', 'history_guru.tgl = presensi.tgl');
		$this->db->join('jadwal_pelajaran','presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal' );
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->join('keterangan_guru', 'history_guru.kd_keterangan_guru_fk = keterangan_guru.kd_keterangan_guru');
		$this->db->join('detail_kelas_siswa', 'presensi.id_siswa_fk = detail_kelas_siswa.id_detail');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('guru', 'detail_kelas_siswa.id_wali_fk = guru.id_guru');
		  $this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran', 'left');
	    $this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester', 'left');

		 $where ="history_guru.id_jadwal_fk=presensi.id_jadwal_fk AND (kd_keterangan_guru_fk = 1 or kd_keterangan_guru_fk = 2 or kd_keterangan_guru_fk = 3) AND tahun_ajaran.tahun_ajaran = '$tahun' AND keterangan_semester.semester = '$semester'";
		$this->db->where($where);
		$this->db->group_by('history_guru.id_history_guru', 'DESC');
		return $this->db->get()->result();

    }



}

