
      <div class="container">

        

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style="color: #218c74">History Guru Mengajar</h2>
                
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12 mail_list_column">
                        <span class="btn btn-sm btn-success btn-block" >LIST DATA GURU YANG TIDAK  HADIR DI KELAS</span>
                        <?php foreach($pemberitahuan_detail as $row) {?>
                          <div class="mail_list">
                           
                           
                            <div class="right">
                              <h3> <i class="fa fa-circle"></i> <?php echo $row->nama_guru ?> <small><i class="fas fa-clock"></i> <b><i><?php echo tanggal_indo($row->tgl) ?></b></i> </small></h3>
                              <p> Saat dimulainya pembelajaran pada mata pelajaran <?php echo $row->nama_pelajaran; ?>
                              <?php echo $row->jam_pelajaran; ?> 
                                di kelas <?php echo $row->nama_kelas; ?> Keterangan Guru tersebut 
                          <?php echo $row->keterangan_guru;?> Dikarenakan <?php echo $row->keterangan; ?></p>
                            </div>

                          </div>

                             <?php } ?>
                       
                      </div>
                      <!-- /MAIL LIST -->

                      <!-- CONTENT MAIL -->
                     
                      <!-- /CONTENT MAIL -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>