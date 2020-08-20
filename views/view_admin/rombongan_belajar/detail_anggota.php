
             <div class="x_panel">
        <div class="container">
                <center><h3 style="color: #218c74">Detail Anggota Rombongan Belajar <?php echo $kelas; ?></h3></center>
              </div>

              <?= $this->session->flashdata('message2'); ?>

            
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    
                  


   
                    <div class="clearfix"></div>
                     <font size="3px">Tahun Ajaran <?php echo $this->session->userdata('tahun_ajaran'); ?></font><br>
                    
                 

                    <div class="clearfix"></div>
                     <font size="3px">Wali kelas : <?php echo $wali; ?>
                       

                     </font><br><br>
                   
                      
                  </div><br>

                  <table id="exampledr" cellspacing="0" cellpadding="2" border="1" style="width:100%;border-collapse:collapse;font-size:85%" class="table table-striped table-bordered">
                    <thead>
                      <tr align="center">
                      
                        <td style="text-align:center;font-size:100%">No</td>
                        <td style="text-align:center;font-size:100%">Nama Siswa</td>
                        <td style="text-align:center;font-size:100%">JK</td>
                        <td style="text-align:center;font-size:100%">NIPD</td>
                        <td style="text-align:center;font-size:100%">NISN</td>
                        <td style="text-align:center;font-size:100%">AKSI</td>

                      
                      </tr>
                    </thead>

                    <tbody>

                    <?php 
                      $no = 1;
                      foreach ($siswa as $sw){
                     ?>
                     <tr>
                      <td style="text-align:center;font-size:100%"><?php echo $no++ ?></td>
                      <td style="text-align:center;font-size:100%"><?php echo $sw->nama_siswa ?></td>
                      <td style="text-align:center;font-size:100%"><?php echo $sw->jk ?></td>
                      <td style="text-align:center;font-size:100%"><?php echo $sw->nipd ?></td>
                      <td style="text-align:center;font-size:100%"><?php echo $sw->nisn ?></td>

                      <td ><form action="<?= site_url('Admin/hapus_anggota')?>" method="post">
                        <input type="hidden" name="id_detail" value="<?php echo $sw->id_detail ?>">
                        <input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
                        <input type="hidden" name="id_wali_fk" value="<?php echo $id_guru ?>">
                        <input type="hidden" name="id_tahun_ajaran_fk" value="<?php echo $id_tahun_ajaran ?>">
                        <input type="hidden" name="nama_guru" value="<?php echo $wali; ?>">
                         <input type="hidden" name="nama_kelas" value="<?php echo $kelas; ?>">

                        <button type="submit" onclick="return confirm('Apakah Yakin ingin mengeluarkan siswa ini ?')" class="btn btn-danger">Keluarkan</button>
                      </form></td></td>
                    </tr>

                  <?php } ?>
                  </tbody>
                </table>
                  
                </div>

              </div>

              <div class="col-md-6">

                <div class="x_panel">
                  <div class="x_title">
                   
              <div class="input-group">
                   <h4>Tambahkan Siswa Menjadi Anggota</h4>
                  </div>
                    <div class="clearfix"></div>

                  </div>
                   <table id="datatable" cellspacing="0" cellpadding="2" border="1" style="width:100%;border-collapse:collapse;font-size:80%"  class="table table-striped table-bordered">
                    <thead>
                      <tr align="center">
                        
                        <td style="text-align:center;font-size:97%">Nama Siswa</td>
                        <td style="text-align:center;font-size:97%">Tanggal Lahir</td>
                        <td style="text-align:center;font-size:97%">JK</td>
                        <td style="text-align:center;font-size:97%">NIPD</td>
                        <td style="text-align:center;font-size:97%">NISN</td>
                        <td style="text-align:center;font-size:97%">AKSI</td>


                      
                      </tr>
                    </thead>
                        <tbody>

                    <?php 
                            $ids_2 = array();

                            foreach ($siswa_after as $item2) {
                              $ids_2[] = $item2->id_siswa;
                            }
                           ?>

                    <?php 
                      $no = 1;
                      foreach ($siswa_before as $row){
                     ?>

                     <?php if (!in_array($row->id_siswa, $ids_2)) { ?>
                     <tr>
                     
                      <td><?php echo $row->nama_siswa ?></td>
                      <td><?php echo $row->tgl_lahir ?></td>
                      <td><?php echo $row->jk ?></td>
                      <td><?php echo $row->nipd ?></td>
                      <td><?php echo $row->nisn ?></td>
                      <td><form action="<?= site_url('Admin/insert_siswa_regis')?>" method="post">
                        <input type="hidden" name="id_siswa" value="<?php echo $row->id_siswa ?>">
                        <input type="hidden" name="id_kelas" value="<?php echo $id_kelas ?>">
                        <input type="hidden" name="id_wali_fk" value="<?php echo $id_guru ?>">
                        <input type="hidden" name="id_tahun_ajaran_fk" value="<?php echo $id_tahun_ajaran ?>">
                        <input type="hidden" name="nama_guru" value="<?php echo $wali; ?>">
                         <input type="hidden" name="nama_kelas" value="<?php echo $kelas; ?>">

                        <button type="submit" onclick="return confirm('Apakah Yakin ingin menambahkan siswa ini ?')" class="btn btn-primary">Tambah</button>
                      </form></td>
                    </tr>
                  <?php } ?>

                  <?php } ?>
                  </tbody>
                </table>
                 
                </div>


              </div>
            </div>
          </div>
        </div>