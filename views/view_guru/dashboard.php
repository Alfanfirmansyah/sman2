<?php $all = $all->total; ?>
<?php 
              if ($hadir->totalhadir != 0 || $hadir->totalhadir != '0') {
              $h = $hadir->totalhadir;
              $percentage = $h / $all * 100;

              }else {
                $percentage = 0;
              }
              
              ?>

<?php
            if($absen->totalabsen != 0 || $absen->totalabsen != '0') {
              $a = $absen->totalabsen;
              $percentage_absen = $a / $all * 100;
                }
              else{
                $percentage_absen = 0;
              }

              ?>

<?php
            if($sakit->totalsakit != 0 || $sakit->totalsakit != '0') {
              $s = $sakit->totalsakit;
              $percentage_sakit = $s / $all * 100;
                }
              else{
                $percentage_sakit = 0;
              }

              ?>

<?php
            if($izin->totalizin != 0 || $izin->totalizin != '0') {
              $z = $izin->totalizin;
              $percentage_izin = $z / $all * 100;
                }
              else{
                $percentage_izin = 0;
              }

              ?>

<?php
            if($dispensasi->totaldispensasi != 0 || $dispensasi->totaldispensasi != '0') {
              $d = $dispensasi->totaldispensasi;
              $percentage_dispensasi = $d / $all * 100;
                }
              else{
                $percentage_dispensasi = 0;
              }

              ?>                         
<div class="x_panel">
      <div class="container">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
            <a href="<?php echo base_url('admin/daftar_User') ?>">
              <span class="count_top"><i class="fa fa-user"></i> Total Pengguna</span>
            </a>
             <?php foreach($users as $r) { ?>
              <div class="count"><?php echo $r->totalcount?></div>
              <?php } ?>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
            <a href="<?php echo base_url('admin/daftar_guru') ?>">
              <span class="count_top"><i class="fa fa-clock-o"></i>Total Guru</span>
            </a>
               <?php foreach($guru as $r) { ?>
              <div class="count"><?php echo $r->totalcount?></div>
              <?php } ?>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
           <a href="<?php echo base_url('admin/daftar_wali') ?>">
              <span class="count_top"><i class="fa fa-user"></i> Total Wali Kelas</span>
            </a>
            
              <div class="count"><?php echo $wali_kelas?></div>
             
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
           <a href="<?php echo base_url('admin/daftar_siswa') ?>">
              <span class="count_top"><i class="fa fa-user"></i> Total Siswa</span>
            </a>
            
              <div class="count"><?php echo $siswa?></div>
             
            </div>
      
          </div>
          <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-9">
                    <h3><i class="fa fa-info"></i> Tentang</h3>
                  </div>
                  
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron">
                      <h1 style="color: #218c74">Hello, <?php echo $this->session->userdata('nama_guru') ?></h1>
                      <p style="font-size: 18px;text-align: justify;">Aplikasi Pengelolaan Presensi adalah sebuah sistem aplikasi yang dapat digunakan untuk keperluan pencatatan kehadiran / ketidakhadiran siswa dengan tambahan fitur Whatsapp Gateway yang dapat mengirim pesan kepada orang tua ketika siswa dicatat dakam kondisi tertentu (Alfa). Selain itu pada aplikasi ini juga dilengkapi fitur untuk melihat laporan presensi siswa dalam kurun waktu tertentu ( per-hari, per-bulan, per-semester, per-jadwal pelajaran). Dua fitur tambahan tersebut hanya terdapat di hak akses sebagai wali kelas.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                  <div class="x_title">
                    <h2>Ringkasan Kehadiran Hari Ini : </h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Siswa hadir : <?php echo $hadir->totalhadir; ?> siswa</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $percentage ?>"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Siswa izin : <?php echo $izin->totalizin; ?> siswa</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $percentage_izin ?>"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Siswa dispen : <?php echo $dispensasi->totaldispensasi; ?> siswa</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $percentage_dispensasi ?>"></div>
                        </div>
                      </div>
                    </div>
             
                  </div>

                   <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Siswa sakit : <?php echo $sakit->totalsakit; ?> siswa</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $percentage_sakit ?>"></div>
                        </div>
                      </div>
                    </div>
             
                  </div>

                   <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Siswa alpha : <?php echo $absen->totalabsen; ?> siswa</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $percentage_absen ?>"></div>
                        </div>
                      </div>
                    </div>
              <hr>
                  <b>Total Siswa<b> : <?php echo $all; ?> siswa
                  </div>



                </div>

                <div class="clearfix"></div>
              </div>
            </div>
          </div>

          <div class="x_panel">
      
 <div id="container">
 </div>



            