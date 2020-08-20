<!DOCTYPE html>
<html>
<head>
	<title>Laporan Presensi</title>
	<link href="public/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>


	

    <div class="container">
    	<div class="col-lg-12">
    		<div class="col-md-1">
				<img src="public/images/sman2.png" alt="..." width=60px">
	    	</div>
	    	<div class="col-md-10" style="margin-top:-90px;">
	    	    <h4 class="text-center"><b> DAFTAR PRESENSI SISWA KELAS  </b></h4>
	    	    <h5 class="text-center">Jalan raya ijen No. 9, Wates, Magersari, Kota Mojokerto 61317</h5>
	    	    <h6 style="margin-left:60px">No Telp: (0321) 321505</h6>
	    	    <h6 style="margin-left:430px;margin-top:-90px">info@sman2mojokerto.sch.id</h6>
	    	</div>
	    	<div class="col-md-1" align="right" style="margin-top:-90px">
				<img src="public/images/sman2.png" alt="..." width=60px">
	    	</div>
    	</div>

        <hr>
	       <h2 align="center">REKAP PRESENSI PADA BULAN 2020 FEBRUARI</h2>
    <h3 align="center">SMAN 2 MOJOKERTO</h3>

  <table class="table table-striped table-bordered table-hover table-condensed" >
    <thead>
      <tr style="background: #eee">
                <th rowspan="2">No</th>
                <th rowspan="2" style="width: 18%">Nama</th>
                <th colspan="<?php echo $jumlahhari ?>">Presensi</th>
                <th colspan="5">Jumlah</th>
            </tr>
            <tr>
                <?php for($d=1; $d<=$jumlahhari; $d++){ ?>
                    <?php if (date("l",mktime (0,0,0,$bulan,$d,$tahun)) != "Sunday") { ?>
                        <td style="width: 20px;"><?php echo $d ?></td>
                    <?php } else { ?>
                        <td style="color: red!important; width: 20px;">M</td>
                    <?php } ?>
                <?php } ?>
                <td>H</td>
                <td>I</td>
                <td>S</td>
                <td>A</td>
                <td>D</td>
            </tr>
        </thead>
        <tbody>
            <?php $no=1 ?>
            <?php foreach ($data as $d): ?>
                <?php $h=0; $ij=0; $s=0; $alp=0; $dis=0; ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $d->nama_siswa ?></td>
                    <?php for($a=1; $a<=$jumlahhari; $a++){ ?>
                        <?php $tanggal = $year.'-'.$month.'-'.sprintf('%02d', $a); ?>
                        <?php $ket = (!empty($data_presensi[$d->id_siswa][$tanggal]) ? $data_presensi[$d->id_siswa][$tanggal] : '') ?>
                        <td><?php echo $ket ?></td>
                        <?php 
                            if($ket=="H") $h++;
                            elseif($ket=="I") $ij++;
                            elseif($ket=="S") $s++;
                            elseif($ket=="A") $alp++; 
                            elseif($ket=="D") $dis++; 
                        ?>
                    <?php } ?>
                    <td><?php echo $h ?></td>
                    <td><?php echo $ij ?></td>
                    <td><?php echo $s ?></td>
                    <td><?php echo $alp ?></td>
                    <td><?php echo $dis ?></td>
                   
                </tr>
                <?php $no++ ?>
            <?php endforeach ?>
        </tbody>
    </table>
          <div style="margin-left:2%; margin-top: 30px" >
        <h5>Keterangan Presensi : <br>
            <br> H = Hadir 
            <br> S = Sakit
            <br> I = Izin
            <br> D = Dispensasi
            <br> A = Alfa

        </h5>
        </div>
   

        <div style="margin-right:2%" class="text-right">
        	<h5>Mojokerto,  <?php echo date('d-m-Y') ?></h5>
	        <h5><b>Wali Kelas</b></h5><br><br><br>
	        <hr style="border:1px solid #000;width: 20%;margin-left:800px">	
        </div>
        
       
    </div>

</body>
</html>
