<!DOCTYPE html>
<html>
<head>
	<title>Laporan Presensi</title>
	<link href="public/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    div.page_break + div.page_break{
    page-break-before: always;
}
</style>
</head>
<body>
<?php
                    foreach ($detailsiswa as $row) {
                 ?>

                 <div class="page_break">

    <div class="container">
    	<div class="col-lg-12">
    		<div class="col-md-1" style="margin-top:10px;">
				<img src="public/images/logolaporan.png" alt="..." width="100px">
	    	</div>
	    	<div class="col-md-10" style="margin-top:-300px; margin-left:50px;">
	    	    <h5 class="text-center">PEMERINTAH DINAS PROVINSI JAWA TIMUR</h5>
                <h5 class="text-center">DINAS PENDIDIKAN</h5>
                <h4 class="text-center"><b> SEKOLAH MENENGAH ATAS NEGERI 2 </b></h4>
                 <h5 class="text-center">Jl. Raya Ijen 9 telp : (0321) 321505 fax : (0321) 331116</h5>
	    	    <h6 class="text-center">website : www.sman2mojokerto.sch.id E-mail : info@sman2mojokerto.sch.id</h6>
	    	    <h6 class="text-center">MOJOKERTO 61317</h6>
	    	</div>
    	</div>

        <hr>


	        <table cellspacing="0" cellpadding="2" style="width:100%;border-collapse:collapse;font-size:75%" >
           
            <tr>
                <td style="width: 15%"> NAMA SISWA </td>
                 <td style="width: 50%">
                    <h4> : <?php echo $row->nama_siswa ?></h4>
                </td>

            </tr>		
            <tr>
                <td>
                NIPD 
                </td>
                <td >
                    <h4> : <?php echo $row->nipd ?></h4>
                </td>

                  <td> <p style="float: right">KELAS : <?php echo $row->nama_kelas ?></p></td>
            </tr>
           
        </table>
        <br>		
        <table class="table table-striped table-bordered table-hover table-condensed">
            <thead>
                <tr align="center">
                    
                    <td>HARI </td>
                    <td>TANGGAL</td>
                    <td>JAM PELAJARAN</td>
                    <td>MATA PELAJARAN</td>
                    <td>KETERANGAN</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($detailsiswa2 as $key) {
                 ?>

                 <?php if($key->id_siswa == $row->id_siswa) { ?>
              
                <tr>
                    
                    <td class="text-center"><?php echo hari($key->tgl); ?></td>
                    <td class="text-center"><?php  
                    $date=date_create($key->tgl);
echo date_format($date,"d/m/Y");
                    ?></td>
                    <td class="text-center"><?php echo $key->jam_pelajaran; ?></td>
                    <td class="text-center"><?php echo $key->nama_pelajaran; ?></td>
                    <td class="text-center"><?php echo $key->kd_keterangan_fk; ?></td>
                </tr>
   <?php  } ?>
                <?php  } ?>

        </table>
        <div style="margin-left:2%; margin-top: 30px" >
        <h5>Keterangan Presensi : <br>
            <br> H = Hadir 
            <br> S = Sakit
            <br> I = Izin
            <br> D = Dispensasi
            <br> A = Alfa

        </h5>
        </div><br><br>

        <div style="margin-right:2%" class="text-right">
        	<h5>Mojokerto, <?php echo tanggal_indo(date("d-m-Y")); ?></h5>
	        <h5><b>Wali Kelas</b></h5><br><br><br>
            <h5><b><?php echo $row->nama_guru ?></b></h5>
	        <hr style="border:1px solid #000;width: 20%;margin-left:550px">	
        </div>
        
        </tbody>

    </div>
    </div>
       <?php  } ?>

</body>
</html>
