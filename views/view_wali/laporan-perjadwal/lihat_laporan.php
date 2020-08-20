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


                 <div class="page_break">

    <div class="container">
        <div class="col-lg-12">
            <div class="col-md-1">
                <img src="public/images/sman2.png" alt="..." width="60px">
            </div>
            <div class="col-md-10" style="margin-top:-90px;">
                <h4 class="text-center"><b> DAFTAR PRESENSI SISWA  </b></h4>
                <h5 class="text-center">Jalan raya ijen No. 9, Wates, Magersari, Kota Mojokerto 61317</h5>
                <h6 style="margin-left:60px">No Telp: (0321) 321505</h6>
                <h6 style="margin-left:430px;margin-top:-90px">info@sman2mojokerto.sch.id</h6>
            </div>
            <div class="col-md-1" align="right" style="margin-top:-90px">
                <img src="public/images/sman2.png" alt="..." width="60px">
            </div>
        </div>

        <hr>
<?php
$i = 0;
                    foreach ($tgl as $row) {
                        
                 ?>

            <table>
            <tr>
                <td>
                    <h4 id="kelas"><b>Kelas</b></h4>
                </td>
                <td>
                    <h4 id="kelas"><b> : <?php echo $kelas?></b></h4>
                </td>
            </tr> 

              <tr>
                <td>
                    <h4 id="kelas"><b>Jadwal Pelajaran  </b></h4>
                </td>
                <td>
                    <h4 id="kelas"><b> : <?php echo $row->nama_pelajaran?> / <?php echo $row->jam_pelajaran?></b></h4>
                </td>
            </tr>

            <tr>
                <td>
                    <h4 id="kelas"><b>Tanggal Presensi  </b></h4>
                </td>
                <td>
                    <h4 id="kelas"><b> : <?php echo rentang_tanggal($tgl1); ?> <?php echo "-"; ?>
                    <?php echo rentang_tanggal($tgl2); ?></b></h4>
                </td>
            </tr>      
          
            <tr>
                <td>
                    <h4 id="kelas"><b>Wali Kelas</b></h4>
                </td>
                <td>
                    <h4 id="kelas"><b> : <?php echo $nama?></b></h4>
                </td>
            </tr>
        </table>
        <?php if (++$i == 1) break; } ?>
        <br>        
        <table class="table table-striped table-bordered table-hover table-condensed">
            <thead>
                <tr align="center">
                    
                    <td>HARI </td>
                    <td>Tanggal</td>
                    <td>Nama Siswa</td>
                    <td>MATA PELAJARAN</td>
                    <td>KETERANGAN</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($detailsiswa as $key) {
                 ?>

                
              
                <tr>
                    
                    <td class="text-center"><?php echo hari($key->tgl);  ?></td>
                    <td class="text-center"><?php echo $key->tgl ?>
                    </td>
                     <td class="text-center"><?php echo $key->nama_siswa ?>
                    </td>
                    <td class="text-center"><?php echo $key->nama_pelajaran; ?></td>
                    <td class="text-center"><?php echo $key->kd_keterangan_fk; ?></td>
                </tr>
 
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
            <h5><b><?php echo $nama; ?></b></h5>
            <hr style="border:1px solid #000;width: 20%;margin-left:550px"> 
        </div>
        
        </tbody>
    </div>
    </div>
       

</body>
</html>
