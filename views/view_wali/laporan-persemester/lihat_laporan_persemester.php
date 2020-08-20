 <!-- <body onLoad="javascript:window:print()"> -->
    <?php  

$tahun_ajaran2 = $this->session->tahun_ajaran;
$semester2 = $this->session->semester;
    ?>
<html>
    <head>
            <link href="public/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        
    <div> 
            <div class="container">
        <div class="col-lg-12">
            <div class="col-md-1">
                <img src="public/images/sman2.png" alt="..." width=60px">
            </div>
            <div class="col-md-10" style="margin-top:-90px;">
                <h4 class="text-center"><b> DAFTAR PRESENSI SISWA </b></h4>
                <h5 class="text-center">Jalan raya ijen No. 9, Wates, Magersari, Kota Mojokerto 61317</h5>
                <h6 style="margin-left:60px">No Telp: (0321) 321505</h6>
                <h6 style="margin-left:900px;margin-top:-90px">info@sman2mojokerto.sch.id</h6>
            </div>
            <div class="col-md-1" align="right" style="margin-top:-90px">
                <img src="public/images/sman2.png" alt="..." width=60px">
            </div>
        </div> <hr>
        <br><br>
        <p align="center">
            <h3><center>REKAP ABSENSI PER SEMESTER SMAN 2 MOJOKERTO</center></h3> <br><br>
        </p>
             <table class="table table-striped table-bordered table-hover table-condensed" >
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Nama Siswa</th>
                <?php
                $querybulan=$this->db->query("select * from parameter_laporan_persemester where semester='$semester' order by bulan asc")->result();
                foreach ($querybulan as $tbbulan) {
                    # code...
                    ?>
                    <th colspan="5" class="text-center"><?php echo $tbbulan->bulan_lengkap; ?></th>
                    <?php
                }
                ?>

                <th colspan="5" class="text-center">Jumlah</th>
            </tr>
            <tr>
                <?php
                $itung=$this->db->query("select * from parameter_laporan_persemester where semester='$semester' order by bulan asc")->result();
                foreach ($itung as $tbbulan) {
                    # code...
                    ?>
                    
                    <th class="text-center">S</th>
                    <th class="text-center">I</th>
                    <th class="text-center">A</th>
                    <th class="text-center">D</th>
                    <th class="text-center">H</th>
                    <?php
                }
                ?>

                    <th class="text-center">S</th>
                    <th class="text-center">I</th>
                    <th class="text-center">A</th>
                    <th class="text-center">D</th>
                    <th class="text-center">H</th>
            </tr>
           
            <?php
            $nok=1;
            $queryh=$this->db->query("select * from presensi 
                join detail_kelas_siswa on presensi.id_siswa_fk = detail_kelas_siswa.id_detail 
                join siswa on detail_kelas_siswa.id_siswa = siswa.id_siswa 
                join tahun_ajaran on detail_kelas_siswa.id_tahun_ajaran_fk = tahun_ajaran.id_tahun_ajaran 
                join keterangan_semester on tahun_ajaran.kd_semester = keterangan_semester.kd_semester 
                where siswa.id_siswa IN ($id_siswa) and tahun_ajaran.tahun_ajaran = '$tahun_ajaran2' group by id_siswa_fk")->result();
            foreach ($queryh as $tb) {
                 # code...
             
            $jumlahsakit=0;
            $jumlahizin=0;
            $jumlahabsen=0;
            $jumlahdistan=0;
            $jumlahhadir=0;
                ?>
                <tr>
                <td><?php echo $nok++ ?></td>
                <td><?php echo $tb->nama_siswa ?></td>
                <?php
                $id_siswa_fk=$tb->id_siswa_fk;
                $queryitunghadir=$this->db->query("select * from parameter_laporan_persemester where semester='$semester' order by bulan asc")->result();
                foreach ($queryitunghadir as $tbitunghadir) {
                    # code...
                    $bulan=$tbitunghadir->bulan;
                    $itungsakit=$this->db->query("select count(id_siswa_fk) as itung from view_presensi where id_siswa_fk='$id_siswa_fk' and kd_keterangan_fk='S' and date_format(tgl,'%m')='$bulan' and date_format(tgl,'%Y')='2020'")->first_row();
                    $itungizin=$this->db->query("select count(id_siswa_fk) as itung from view_presensi where id_siswa_fk='$id_siswa_fk' and kd_keterangan_fk='I' and date_format(tgl,'%m')='$bulan' and date_format(tgl,'%Y')='2020'")->first_row();
                    $itungabsen=$this->db->query("select count(id_siswa_fk) as itung from view_presensi where id_siswa_fk='$id_siswa_fk' and kd_keterangan_fk='A' and date_format(tgl,'%m')='$bulan' and date_format(tgl,'%Y')='2020'")->first_row();
                    $itungdistan=$this->db->query("select count(id_siswa_fk) as itung from view_presensi where id_siswa_fk='$id_siswa_fk' and kd_keterangan_fk='D' and date_format(tgl,'%m')='$bulan' and date_format(tgl,'%Y')='2020'")->first_row();
                    $itunghadir=$this->db->query("select count(id_siswa_fk) as itung from view_presensi where id_siswa_fk='$id_siswa_fk' and kd_keterangan_fk='H' and date_format(tgl,'%m')='$bulan' and date_format(tgl,'%Y')='2020'")->first_row();
                    
                    $jumlahsakit=$jumlahsakit+$itungsakit->itung;
                    $jumlahizin=$jumlahizin+$itungizin->itung;
                    $jumlahabsen=$jumlahabsen+$itungabsen->itung;
                    $jumlahdistan=$jumlahdistan+$itungdistan->itung;
                    $jumlahhadir=$jumlahhadir+$itunghadir->itung;
                    ?>
                    <td class="text-center">
                    <?php if($itungsakit->itung == 0 || $itungsakit->itung == '0')
                    {echo '-';}
                    else {echo $itungsakit->itung;}?>   
                    </td>

                    <td class="text-center">
                    <?php if($itungizin->itung == 0 || $itungizin->itung == '0')
                    {echo '-';}
                    else {echo $itungizin->itung;}?>   
                    </td>

                    <td class="text-center">
                    <?php if($itungabsen->itung == 0 || $itungabsen->itung == '0')
                    {echo '-';}
                    else {echo $itungabsen->itung;}?>   
                    </td>

                    <td class="text-center">
                    <?php if($itungdistan->itung == 0 || $itungdistan->itung == '0')
                    {echo '-';}
                    else {echo $itungdistan->itung;}?>   
                    </td>

                      <td class="text-center">
                    <?php if($itunghadir->itung == 0 || $itunghadir->itung == '0')
                    {echo '-';}
                    else {echo $itunghadir->itung;}?>   
                    </td>
         
                    <?php
                }
                ?>

                    <td class="text-center"><?php echo $jumlahsakit ?></td>
                    <td class="text-center"><?php echo $jumlahizin ?></td>
                    <td class="text-center"><?php echo $jumlahabsen ?></td>
                    <td class="text-center"><?php echo $jumlahdistan ?></td>
                    <td class="text-center"><?php echo $jumlahhadir ?></td>
                </tr>
                <?php
            }
            ?>
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
   <br><br>
         <div style="margin-right:2%; margin-top: -50px" class="text-right">
            <h5>Mojokerto,  <?php echo tanggal_indo(date('d-m-Y')); ?></h5>
            <h5><b>Wali Kelas</b></h5><br><br><br>
            <h5><b><?php echo $ttd->nama_guru ?></b></h5>
            <hr style="border:1px solid #000;width: 15%;margin-left:1040px">    
        </div>



    </div>
</html>