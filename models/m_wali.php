<?php 

/**
 * 
 */
class M_wali extends CI_Model
{

	
 // model di dashboard

	function siswa_wa($id_wali,$tahun,$semester,$tgl)
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
		$where = "detail_kelas_siswa.id_wali_fk = '$id_wali' AND tahun_ajaran.tahun_ajaran = '$tahun' AND keterangan_semester.semester='$semester' AND presensi.tgl='$tgl' AND keterangan_presensi.kd_keterangan='A' ";
 		
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
	function countuser()
	{
	    $this->db->select('count(id) as totalcount');
		$this->db->from('users');
		return $this->db->get()->result();
    }
	function countguru()
	{
	    $this->db->select('count(id_guru) as totalcount');
		$this->db->from('guru');
		return $this->db->get()->result();
    }

    function countwali()
    {
	    $this->db->select('count(distinct(detail_kelas_siswa.id_wali_fk)) as totalcount');
	    $this->db->from('detail_kelas_siswa');
	    $this->db->join('guru', 'detail_kelas_siswa.id_wali_fk = guru.id_guru');
		return $this->db->get()->result();
    }

    function countsiswa()
    {
	    $this->db->select('count(id_siswa) as totalcount');
	    $this->db->from('siswa');
		return $this->db->get()->result();
    }

	// model biodata wali
	
 	function tampil_wali($id)
	{
	
		$this->db->select('*');
		$this->db->from('guru');
		$this->db->join('users', 'guru.id_guru = users.id_guru_fk');
		$this->db->join('detail_kelas_siswa', 'guru.id_guru = detail_kelas_siswa.id_wali_fk');
		$this->db->where('users.id', $id);
		$this->db->limit(1);
		return $this->db->get()->result();

	}
	
   

    function get_kelaswali($tahun,$semester,$id_wali){
      $this->db->select('*');    
      $this->db->from('kelas');
      $this->db->join('detail_kelas_siswa', 'kelas.id_kelas = detail_kelas_siswa.id_kelas');
      $this->db->join('guru', 'detail_kelas_siswa.id_wali_fk = guru.id_guru');
      $this->db->join('jadwal_pelajaran', 'kelas.id_kelas = jadwal_pelajaran.id_kelas_fk');
      $this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );
		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('keterangan_semester.semester', $semester);
      $this->db->where('detail_kelas_siswa.id_wali_fk', $id_wali);

      $query=$this->db->get();
      return $query->row();
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
  
    // model presensi
    function get_users($id_guru){
      $this->db->select('opsi_buka_absen');    
      $this->db->from('users');
      $this->db->where('users.id_guru_fk', $id_guru);
      $query=$this->db->get();
      return $query->row();
    }
    
	function tampil_rombelpresensi3($tahun,$semester,$id_guru)
	{
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->join('jadwal_pelajaran', 'kelas.id_kelas = jadwal_pelajaran.id_kelas_fk');
		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );
		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('keterangan_semester.semester', $semester);
		$this->db->where('jadwal_pelajaran.id_guru_fk', $id_guru);
		$this->db->group_by('kelas.id_kelas');
		return $this->db->get()->result();
	
	}

    function input_presensi12($result)
	{
		$this->db->insert_batch('presensi',$result);
	}
	
	function update_presensi12($id_presensi,$data){
		$this->db->where('id_presensi', $id_presensi);
		$this->db->update('presensi',$data);
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

		function tampil_presensi3($tahun,$semester,$id_guru)
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
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');

		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('keterangan_semester.semester', $semester);
		// $this->db->where('detail_kelas_siswa.id_wali_fk', $id_wali);
		$this->db->where('jadwal_pelajaran.id_guru_fk', $id_guru);
		$this->db->order_by('presensi.id_presensi', 'desc');

		 return $this->db->get()->result();
		
	}

	function tampil_presensi_kelas($tahun,$semester,$id_wali)
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
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');

		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('keterangan_semester.semester', $semester);
		$this->db->where('detail_kelas_siswa.id_wali_fk', $id_wali);
		//$this->db->where('jadwal_pelajaran.id_guru_fk', $id_guru);
		$this->db->order_by('presensi.id_presensi', 'desc');

		 return $this->db->get()->result();
		
	}

	// model laporan

	function tampil_jadwal_laporan($tahun,$id_kelas,$semester)
	{
		$this->db->select('*');
		$this->db->from('jadwal_pelajaran');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		
		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');
		
		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('jadwal_pelajaran.id_kelas_fk', $id_kelas);
		$this->db->where('keterangan_semester.semester', $semester);
		$this->db->group_by('jadwal_pelajaran.kd_mapel_fk');
		return $this->db->get();
	}

	function graph(){
		$data = $this->db->query("SELECT keterangan_presensi.nama_keterangan,COUNT(presensi.kd_keterangan_fk) as jumlah FROM presensi right JOIN keterangan_presensi ON presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan GROUP BY keterangan_presensi.kd_keterangan");
		return $data->result();
	}

		function tampil_presensi_laporan($id_jadwal,$tgl_awal,$tgl_akhir,$id_siswa, $tahun)
	{
		$this->db->select('*');
		$this->db->from('presensi');
		$this->db->join('detail_kelas_siswa', 'presensi.id_siswa_fk = detail_kelas_siswa.id_detail');
		$this->db->join('jadwal_pelajaran','presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->join('siswa','detail_kelas_siswa.id_siswa = siswa.id_siswa');
		$this->db->join('keterangan_presensi', 'presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan');

		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');
		

		$where = "jadwal_pelajaran.kd_mapel_fk = '$id_jadwal' and presensi.tgl >= '$tgl_awal' and presensi.tgl <= '$tgl_akhir' and detail_kelas_siswa.id_siswa IN ($id_siswa) and tahun_ajaran.tahun_ajaran = '$tahun'";
		$this->db->where($where);
		$this->db->group_by('presensi.tgl');
		$this->db->group_by('presensi.id_jadwal_fk');
				
		return $this->db->get()->result();

	
	}
		function tampil_presensi_laporan2($id_siswa,$tgl_awal,$tgl_akhir,$id_jadwal, $tahun,$semester)//ini
	{
		$this->db->select('*');
		$this->db->from('presensi');
		$this->db->join('detail_kelas_siswa','presensi.id_siswa_fk = detail_kelas_siswa.id_detail');
		$this->db->join('jadwal_pelajaran','presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->join('siswa','detail_kelas_siswa.id_siswa = siswa.id_siswa');
		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');
		
		$where = "detail_kelas_siswa.id_siswa IN ($id_siswa) and presensi.tgl >= '$tgl_awal' and presensi.tgl <= '$tgl_akhir' and jadwal_pelajaran.kd_mapel_fk = '$id_jadwal' and tahun_ajaran.tahun_ajaran = '$tahun' and keterangan_semester.semester = '$semester'";
		$this->db->where($where);
		return $this->db->get()->result();

	}

	function tampil_siswa($tahun,$id_wali)
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('detail_kelas_siswa', 'siswa.id_siswa = detail_kelas_siswa.id_siswa','left');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas','left');
		$this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran','left');

 	  	$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester
 	  		' );

		$this->db->where('tahun_ajaran.tahun_ajaran', $tahun);
		$this->db->where('detail_kelas_siswa.id_wali_fk', $id_wali);
		
		
		return $this->db->get()->result();
		
	}
		
	

	function tampil_persiswa2($id_siswa,$tgl_awal,$tgl_akhir,$tahun,$semester)//ini
	{
		$this->db->select('*');
		$this->db->from('presensi');
		$this->db->join('detail_kelas_siswa','presensi.id_siswa_fk = detail_kelas_siswa.id_detail');
		$this->db->join('jadwal_pelajaran','presensi.id_jadwal_fk = jadwal_pelajaran.id_jadwal');
		$this->db->join('mata_pelajaran', 'jadwal_pelajaran.kd_mapel_fk = mata_pelajaran.kd_mapel');
		$this->db->join('tahun_ajaran', 'jadwal_pelajaran.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
		$this->db->join('keterangan_semester','tahun_ajaran.kd_semester = keterangan_semester.kd_semester ');
		$where = "detail_kelas_siswa.id_siswa IN ($id_siswa) and presensi.tgl >= '$tgl_awal' and presensi.tgl <= '$tgl_akhir' and tahun_ajaran.tahun_ajaran='$tahun' and keterangan_semester.semester='$semester'";//ini
		$this->db->where($where);
				// ini model e yg di form perhari jgn .buat lg ae taiya


		return $this->db->get()->result();

	}

	function tampil_persiswa1($id_kelas,$id_siswa,$tahun)
	{

		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('detail_kelas_siswa',' siswa.id_siswa = detail_kelas_siswa.id_siswa');
		$this->db->join('kelas','detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('guru', 'detail_kelas_siswa.id_wali_fk = guru.id_guru');
		$this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
		$this->db->join('keterangan_semester','tahun_ajaran.kd_semester = keterangan_semester.kd_semester ');
		$where = "siswa.id_siswa IN ($id_siswa) and tahun_ajaran.tahun_ajaran='$tahun'";
		$this->db->where($where);
		return $this->db->get()->result();
		
	}
	function tampil_ttd($id_wali)
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('detail_kelas_siswa',' siswa.id_siswa = detail_kelas_siswa.id_siswa');
		$this->db->join('kelas','detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('guru', 'detail_kelas_siswa.id_wali_fk = guru.id_guru');
		$this->db->where('detail_kelas_siswa.id_wali_fk',$id_wali);
		
		$this->db->limit(1);
		return $this->db->get()->row();
		
	}

	function bulan($bulan,$id_kelas,$tahun_ajaran,$id_siswa)
	{

		$this->db->select('min(keterangan_presensi.id_status_presensi) as value, presensi.tgl, detail_kelas_siswa.id_siswa,keterangan_presensi.kd_keterangan ');
		$this->db->from('presensi');
		$this->db->join('keterangan_presensi', 'presensi.kd_keterangan_fk = keterangan_presensi.kd_keterangan');
		$this->db->join('detail_kelas_siswa','presensi.id_siswa_fk = detail_kelas_siswa.id_detail');
		$this->db->join('kelas', 'detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
		$this->db->join('keterangan_semester','tahun_ajaran.kd_semester = keterangan_semester.kd_semester ');
		$where = "MONTH(tgl) = '$bulan' and detail_kelas_siswa.id_kelas = '$id_kelas' and tahun_ajaran.tahun_ajaran='$tahun_ajaran' and detail_kelas_siswa.id_siswa IN ($id_siswa)";
		$this->db->where($where);
		$this->db->group_by('tgl, id_siswa_fk');
		return $this->db->get()->result();
		
	}
	

	public function get_siswa($id_kelas,$tahun_ajaran,$id_siswa)
	{
		$this->db->select('siswa.id_siswa, siswa.nama_siswa, guru.nama_guru');
		$this->db->from('presensi');
		$this->db->join('detail_kelas_siswa', 'presensi.id_siswa_fk = detail_kelas_siswa.id_detail');
		$this->db->join('siswa', 'detail_kelas_siswa.id_siswa = siswa.id_siswa');
		$this->db->join('kelas','detail_kelas_siswa.id_kelas = kelas.id_kelas');
		$this->db->join('tahun_ajaran', 'detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran');
		$this->db->join('guru', 'detail_kelas_siswa.id_wali_fk = guru.id_guru');
		$this->db->join('keterangan_semester', 'tahun_ajaran.kd_semester = keterangan_semester.kd_semester');

		$where = "detail_kelas_siswa.id_kelas = '$id_kelas' and tahun_ajaran.tahun_ajaran='$tahun_ajaran' and siswa.id_siswa IN ($id_siswa)";
		$this->db->where($where);
		$this->db->group_by('id_siswa');

		return $this->db->get()->result();
	}



}


 ?>