<?php 

	function statusPresensiSingkat($val='')
	{
		switch ($val) {
			case 1:
				$status	= 'H';
				break;
			case 2:
				$status	= 'I';
				break;
			case 3:
				$status	= 'D';
				break;
			case 4:
				$status	= 'S';
				break;
			case 5:
				$status	= 'A';
				break;
			default:
				$status	= 'H'; // present
				break;
		}
		return $status;
	}

	function hari($tanggal, $cetak_hari = true)
	{
		$hari = array ( 1 =>    'Senin',
					'Selasa',
					'Rabu',
					'Kamis',
					'Jumat',
					'Sabtu',
					'Minggu'
				);
				
		$bulan = array (1 =>   'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				);
		$split 	  = explode('-', $tanggal);
		$tgl_indo = $split[0] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[2];
		
		if ($cetak_hari) {
			$num = date('N', strtotime($tanggal));
			return $hari[$num];
		}
		return $tgl_indo;
	}

	function tanggal_indo($tanggal, $cetak_hari = false )
	{
		$hari = array ( 1 =>    'Senin',
					'Selasa',
					'Rabu',
					'Kamis',
					'Jumat',
					'Sabtu',
					'Minggu'
				);
				
		$bulan = array (1 =>   'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				);
		$split 	  = explode('-', $tanggal);
		$tgl_indo = $split[0] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[2];
		
		if ($cetak_hari) {
			$num = date('N', strtotime($tanggal));
			return $hari[$num] . ', ' . $tgl_indo;
		}
		return $tgl_indo;
	}

	function rentang_tanggal($tanggal, $cetak_hari = false)
	{
		$hari = array ( 1 =>    'Senin',
					'Selasa',
					'Rabu',
					'Kamis',
					'Jumat',
					'Sabtu',
					'Minggu'
				);
				
		$bulan = array (1 =>   'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				);
		$split 	  = explode('-', $tanggal);
		$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
		
		if ($cetak_hari) {
			$num = date('N', strtotime($tanggal));
			return $hari[$num] . ', ' . $tgl_indo;
		}
		return $tgl_indo;
	}

	function bulan_indo($val)
	{
		$bulan = array (1 =>   'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				);
		return $bulan[intval($val)];
	}
	function tanggal_indo_pendek($tanggal, $cetak_hari = false)
	{
		$hari = array ( 1 =>    'Sen',
					'Sel',
					'Rab',
					'Kam',
					'Jum',
					'Sab',
					'Min'
				);
				
		$bulan = array (1 =>   'Jan',
					'Feb',
					'Mar',
					'Apr',
					'Mei',
					'Jun',
					'Jul',
					'Agu',
					'Sep',
					'Okt',
					'Nov',
					'Des'
				);
		$split 	  = explode('-', $tanggal);
		$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
		
		if ($cetak_hari) {
			$num = date('N', strtotime($tanggal));
			return $hari[$num] . ', ' . $tgl_indo;
		}
		return $tgl_indo;
	}
 ?>