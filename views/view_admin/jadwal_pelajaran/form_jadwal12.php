
                <div class="x_panel">
                <div class="container">
                  <center><h2 style="color: #218c74 "> TAMBAH JADWAL PELAJARAN KELAS 12</h2></center> <hr>
                  <br> 
   
      
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form action="<?php echo base_url(); ?>admin/tambah_jadwal12" method="post" class="form-horizontal form-label-left" harivalidate>
                    <?= $this->session->flashdata('message2'); ?>

  
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hari">Hari <span class="required">*</span>
                        </label>
                        <div class="btn-group col-md-6 col-sm-6 col-xs-12">
             
                        <select class="js-example-basic-single" required style="width: 100px;" name="hari" >
                        <option value="">Pilih Hari</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
           
                         </select>
                    </div>
                    </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jam_pelajaran"> JAM PELAJARAN <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
<!--         -->                     
                        <select class="js-example-basic-single col-md-3" required name="jam_pelajaran[]" multiple style="width: 150px;">
                        <option value="">Pilih Jam Pelajaran</option>
                        <option value="jam ke-1">jam ke-1</option>
                        <option value="jam ke-2">jam ke-2</option>
                        <option value="jam ke-3">jam ke-3</option>
                        <option value="jam ke-4">jam ke-4</option>
                        <option value="jam ke-5">jam ke-5</option>
                        <option value="jam ke-6">jam ke-6</option>
                        <option value="jam ke-7">jam ke-7</option>
                        <option value="jam ke-8">jam ke-8</option>
                        <option value="jam ke-9">jam ke-9</option>
                        <option value="jam ke-10">jam ke-10</option>
                        <option value="jam ke-11">jam ke-11</option>
           
                         </select>
                           </div>
                           
                      </div>

            
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kd_mapel">MATA PELAJARAN <span class="required">*</span>
                        </label>
                        <div class="btn-group col-md-6 col-sm-6 col-xs-12">
             
                        <select class="js-example-basic-single col-md-3" required style="width: 150px;" name="kd_mapel" >
                        <option value="">Pilih Mata Pelajaran</option>
                        <?php foreach ($mata_pelajaran as $dj): ?>
                         
                          <option value="<?php echo $dj->kd_mapel ?>"><?php echo $dj->nama_pelajaran; ?></option>
                        <?php endforeach ?>
           
                    </select>
                    <?php echo form_error('kd_mapel', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                      </div>
                      </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_kelas">NAMA KELAS <span class="required">*</span>
                        </label>
                        <div class="btn-group col-md-6 col-sm-6 col-xs-12">
             
                        <select class="js-example-basic-single" required name="id_kelas" style="width: 100px;" >
                        <option value="">Pilih Kelas</option>
                        <?php foreach ($kelas as $rl): ?>
                       
                          <option value="<?php echo $rl->id_kelas ?>"><?php echo $rl->nama_kelas; ?></option>
                        <?php endforeach ?>
           
                    </select>
                    <?php echo form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                      </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_guru">Nama Guru <span class="required">*</span>
                        </label>
                       <div class="btn-group col-md-6 col-sm-6 col-xs-12">
             
                        <select class="js-example-basic-single" required name="id_guru" >
                        <option value="">Pilih Nama Guru Pengajar</option>
                        <?php foreach ($guru as $gru): ?>
                         
                          <option value="<?php echo $gru->id_guru ?>"><?php echo $gru->nama_guru; ?></option>
                        <?php endforeach ?>
           
                    </select>
                    <?php echo form_error('id_guru', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                      </div>
                      </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_ajaran">Tahun Ajaran<span class="required">*</span>
              </label>
                   <div class="btn-group col-md-6 col-sm-6 col-xs-12">
                      <select  class="js-example-basic-single" style="width: 150px;" required name="id_tahun_ajaran">
                        <option value="">Pilih Tahun Ajaran</option>
                        <?php foreach ($tahun as $r): ?>
                          <option value="<?php echo $r->id_tahun_ajaran ?>"> 
                            <?php echo $r->tahun_ajaran; ?><?php echo $r->semester; ?>                          
                        </option>
                        <?php endforeach ?>
                      </select>

                    <?php echo form_error('id_tahun_ajaran', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                      </div>
                
                      </div>
     
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-primary">Cancel</button>
                          
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
</div>