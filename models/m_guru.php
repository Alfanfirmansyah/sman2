<?php 
 /**
  * 
  */
 class M_guru extends CI_Model
 {
 
 	function tampil_guru($id)
	{

		$this->db->select('*');
		$this->db->from('guru');
		$this->db->join('users', 'guru.id_guru = users.id_guru_fk');
		$this->db->where('id', $id);
		$this->db->limit(1);
		return $this->db->get()->result();
	}
		
	function edit_pass($id)
	{
		return $this->db->get_where('users',array('id' => $id))->row();
	}

	function update_pass($data,$id)
	{
		$this->db->where(['id' => $id]);
		return $this->db->update('users',$data);
	}
	
// MODEL PRESENSI
	
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

	function tampil_keterangan()
	{
		return $this->db->get('keterangan_presensi');
	}
	function tampil_jadwalll($id_kelas,$id_guru,$tahun,$semester,$hariindonesia)
	{
		$this->db->select('TIMEDIFF (CURRENT_TIME,master_jam_pelajaran.waktu_mulai) as batas_input,
			jadwal_pelajaran.*,mata_pelajaran.*,master_jam_pelajaran.waktu_mulai');
		$this->db->from('jadwal_pelajaran');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');
		$this->db->join('master_jam_pelajaran', 'jadwal_pelajaran.jam_pelajaran_dimulai = master_jam_pelajaran.jam_pelajaran_dimulai');
		$this->db->where('jadwal_pelajaran.id_kelas_fk', $id_kelas);
		$this->db->where('jadwal_pelajaran.id_guru_fk', $id_guru);
		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('keterangan_semester.semester', $semester);
		$this->db->where('jadwal_pelajaran.hari', $hariindonesia);
		$this->db->group_by('jadwal_pelajaran.kd_mapel_fk');
		$this->db->order_by('jadwal_pelajaran.jam_pelajaran', 'asc');
		
		return $this->db->get();
	}
	function get_users($id_guru)
	{
	      $this->db->select('opsi_buka_absen');    
	      $this->db->from('users');
	      $this->db->where('users.id_guru_fk', $id_guru);
	      $query=$this->db->get();
	      return $query->row();
    }
    
	function tampil_presensi3($tahun,$id_guru,$semester)//fix
	{   
		$this->db->select('*');
		$this->db->from('presensi');
		$this->db->join('detail_kelas_siswa', 'presensi.id_siswa_fk = detail_kelas_siswa.id_detail');
		$this->db->join('siswa', 'detail_kelas_siswa.id_siswa = siswa.id_siswa');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('keterangan_presensi', 'presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan');
		$this->db->join('jadwal_pelajaran', ' presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal');
		$this->db->join('guru', 'jadwal_pelajaran.id_guru_fk = guru.id_guru');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );
		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('jadwal_pelajaran.id_guru_fk', $id_guru);
$this->db->where('keterangan_semester.semester', $semester);
		$this->db->order_by('presensi.id_presensi', 'desc');
		return $this->db->get()->result();
		
	}

	function tampil_rombelpresensi3($tahun,$id_guru,$semester)
	{
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->join('jadwal_pelajaran', 'kelas.id_kelas = jadwal_pelajaran.id_kelas_fk');
		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );
		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('jadwal_pelajaran.id_guru_fk', $id_guru);
		$this->db->where('keterangan_semester.semester', $semester);
		$this->db->group_by('kelas.id_kelas');
		return $this->db->get()->result();
	
	}

	function input_presensi12($result)
	{
		$this->db->insert_batch('presensi',$result);
	}

	function update_presensi12($id_presensi,$data)
	{
		$this->db->where('id_presensi', $id_presensi);
		$this->db->update('presensi',$data);
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

    function tampilhadir($id_guru,$tgl){
    $this->db->select('COUNT(kd_keterangan_fk) as jumlah,keterangan_presensi.nama_keterangan, COUNT(presensi.id_siswa_fk) as total');
    $this->db->from('presensi');
    $this->db->join('jadwal_pelajaran', 'presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal');
    $this->db->join('keterangan_presensi', 'presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan');
    $array = array('jadwal_pelajaran.id_guru_fk' => $id_guru);
    $this->db->where($array);
    $this->db->group_by('kd_keterangan_fk');
	return $this->db->get()->result();
    }

    function tampilhadirsemua($id_guru,$tgl){
    $this->db->select('COUNT(id_presensi) as total');
    $this->db->from('presensi');
    $this->db->join('jadwal_pelajaran', 'presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal');
    $this->db->join('keterangan_presensi', 'presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan');
    $array = array('jadwal_pelajaran.id_guru_fk' => $id_guru);
    $this->db->where($array);
	return $this->db->get()->row();
    }
    
    function graph(){
		$data = $this->db->query("SELECT keterangan_presensi.nama_keterangan,COUNT(presensi.kd_keterangan_fk) as jumlah FROM presensi right JOIN keterangan_presensi ON presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan GROUP BY keterangan_presensi.kd_keterangan");
		return $data->result();
	}


 }

 ?>