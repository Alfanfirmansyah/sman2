<?php 


/**
 * 
 */
class M_siswa extends CI_model
{
	
	function get_kelas($id_detail, $tahun_ajaran)
    {
      $this->db->select('*');    
      $this->db->from('detail_kelas_siswa');
      $this->db->join('siswa', 'detail_kelas_siswa.id_siswa = siswa.id_siswa');
      $this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas');
      $this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
      $this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');
      $this->db->where('detail_kelas_siswa.id_siswa', $id_detail);
      $this->db->where('tahun_ajaran.tahun_ajaran', $tahun_ajaran);

      return $this->db->get()->row_array();
    }

    function tampil_jadwalll($id_kelas,$tahun,$semester,$hariindonesia)
	{
		$this->db->select('TIMEDIFF (CURRENT_TIME,master_jam_pelajaran.waktu_mulai) as batas_input,
			jadwal_pelajaran.*,mata_pelajaran.*,master_jam_pelajaran.waktu_mulai');
		$this->db->from('jadwal_pelajaran');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');
		$this->db->join('master_jam_pelajaran', 'jadwal_pelajaran.jam_pelajaran_dimulai = master_jam_pelajaran.jam_pelajaran_dimulai');
		$this->db->where('jadwal_pelajaran.id_kelas_fk', $id_kelas);
		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('keterangan_semester.semester', $semester);
		$this->db->where('jadwal_pelajaran.hari', $hariindonesia);
		$this->db->group_by('jadwal_pelajaran.kd_mapel_fk');
		$this->db->order_by('jadwal_pelajaran.jam_pelajaran', 'asc');
		return $this->db->get();
	}
	function tampil_keterangan()
	{
		return $this->db->get('keterangan_presensi');
	
	}

    function tampil_namasiswa($id_kelas,$tahun)
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('detail_kelas_siswa', 'siswa.id_siswa = detail_kelas_siswa.id_siswa');
     	$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');
		$this->db->where('detail_kelas_siswa.id_kelas', $id_kelas);
		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->group_by('siswa.id_siswa');
		return $this->db->get();
	
	}

	public function insert_multiple($result)
	{
		$this->db->insert_batch('presensi', $result);
	}

	public function insert_keterangan_guru($dataketeranganguru)
	{
		$this->db->insert('history_guru', $dataketeranganguru);
	}

	function cek_absens($id_jadwal,$cektgl)
	{

	 	$this->db->select('*');    
     	$this->db->from('presensi');
     	$array = array('id_jadwal_fk' => $id_jadwal,
     					'tgl' => $cektgl
     					);
    	$this->db->where($array);
		return $this->db->get()->num_rows();
	}
	
	function counthadir()
	{
	    $this->db->select('count(id_presensi) as totalhadir');
		$this->db->from('view_presensi');
		$array = array('kd_keterangan_fk' => 'H',
	     					'tgl' => date("Y-m-d")
	     					);
	    	$this->db->where($array);
		
		return $this->db->get()->row();
    }
    function countsakit()
	{
	    $this->db->select('count(id_presensi) as totalsakit');
		$this->db->from('view_presensi');
		$array = array('kd_keterangan_fk' => 'S',
	     					'tgl' => date("Y-m-d")
	     					);
	    	$this->db->where($array);
		
		return $this->db->get()->row();
    }
    function countizin()
	{
	    $this->db->select('count(id_presensi) as totalizin');
		$this->db->from('view_presensi');
		$array = array('kd_keterangan_fk' => 'I',
	     					'tgl' => date("Y-m-d")
	     					);
	    	$this->db->where($array);
		
		return $this->db->get()->row();
    }
    function countabsen()
	{
	    $this->db->select('count(id_presensi) as totalabsen');
		$this->db->from('view_presensi');
		$array = array('kd_keterangan_fk' => 'A',
	     					'tgl' => date("Y-m-d")
	     					);
	    	$this->db->where($array);
		
		return $this->db->get()->row();
    }
    function countdispensasi()
	{
	    $this->db->select('count(id_presensi) as totaldispensasi');
		$this->db->from('view_presensi');
		$array = array('kd_keterangan_fk' => 'D',
	     					'tgl' => date("Y-m-d")
	     					);
	    	$this->db->where($array);
		
		return $this->db->get()->row();
    }
    function countAll()
    {
	    $this->db->select('count(id_presensi) as total');
		$this->db->from('view_presensi');
	    $this->db->where('tgl', date("Y-m-d"));
		
		return $this->db->get()->row();
	}

	function tampil_presensi()
	{
		$this->db->select('siswa.nama_siswa,kelas.nama_kelas,keterangan_presensi.nama_keterangan');
		$this->db->from('siswa');
		$this->db->join('detail_kelas_siswa', 'siswa.id_siswa = detail_kelas_siswa.id_siswa');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('view_presensi', 'detail_kelas_siswa.id_detail = view_presensi.id_siswa_fk');
		//$this->db->join('');
		$this->db->join('keterangan_presensi', 'view_presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan');
		$tgl = date("Y-m-d");
		//$where = "kd_keterangan_fk='A' OR kd_keterangan_fk='D' AND tgl = '$tgl'";

		$where = "tgl = '$tgl' AND (kd_keterangan_fk = 'S' OR kd_keterangan_fk = 'A' OR kd_keterangan_fk = 'D' OR kd_keterangan_fk = 'I')";

		$this->db->group_by('siswa.id_siswa');
		$this->db->where($where);
		return $this->db->get()->result();
	}
	function get_users($id_detail)
	{
	      $this->db->select('opsi_buka_absen');    
	      $this->db->from('users');
	      $this->db->where('users.ketua_kelas', $id_detail);
	      $query=$this->db->get();
	      return $query->row();
    }
}
 ?>