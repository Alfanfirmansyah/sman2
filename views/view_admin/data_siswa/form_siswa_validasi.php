                <div class="x_panel">
                <div class="container">
                  <center><h2 style="color: #218c74 "> FORM INPUT DATA SISWA </h2></center> <hr>
                  <br> 
   
            <?php if (validation_errors() ) 
             { ?>
            <div  class="alert alert-danger" role="alert">
            <?php echo validation_errors(); ?>
            

            </div>
            <?php } ?>
                      
            <form action="<?php echo base_url(); ?>admin/tambah_siswa" method ="post"  class="form-horizontal form-label-left"  >

              <?= $this->session->flashdata('message'); ?>
          
                      
                  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_siswa">NAMA SISWA <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input id="nama_siswa" class="form-control col-md-7 col-xs-12" name="nama_siswa" placeholder="masukkan nama siswa"  type="text" pattern="[A-Za-z ]+"
                          value="<?php echo set_value('nama_siswa'); ?>" >
                          <input type="hidden" name="id_siswa">
                          <?php echo form_error('nama_siswa', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>

                   
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nipd">NIPD <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nipd" name="nipd" placeholder="masukkan nipd siswa 4 kar" required="required" class="form-control col-md-7 col-xs-12"   pattern="[0-9]{4}" value="<?php echo set_value('nipd'); ?>">
                        </div>
                      </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jk">JENIS KELAMIN <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <select class="btn btn-default dropdown-toggle" name="jk" value="<?php echo $siswa->jk ?>">
                          <?php if($validas_jk->jk == 'laki-laki') {?>
                            <option value="laki-laki" > laki-laki</option>
                            <option value="perempuan" selected>Perempuan</option>
                          <?php } else { ?>
                              <option value="laki-laki" selected> laki-laki</option>
                            <option value="perempuan" >Perempuan</option>
                            <?php } ?>
                          </select>
                          <?php echo form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                          
                        </div>

                    </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nisn">NISN <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nisn" name="nisn" placeholder="masukkan nisn siswa 8 kar"  required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo set_value('nisn'); ?>">
                        </div>
                      </div>
                      
                
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat_lahir">TEMPAT LAHIR <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tempat_lahir" name="tempat_lahir"placeholder="masukkan tempat lahir siswa"  required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12"  value="<?php echo set_value('tempat_lahir'); ?>">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_lahir"> TANGGAL LAHIR <span class="required">*</span>
                        </label>
                       <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class='input-group date' id='myDatepicker4'  name="tgl_lahir">
                            <input type='text' class="form-control" name="tgl_lahir" value="12-12-2008"  readonly="readonly" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div>

                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="agama">AGAMA <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                       

                            <select class="btn btn-default dropdown-toggle" name="agama" value="">
                         
                            <option value="Islam"> Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>


                       
                          </select>
                                        
                          <?php echo form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                          
                        </div>

                        </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">ALAMAT <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="alamat" name="alamat" placeholder="masukkan alamat siswa"  required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12"  value="<?php echo set_value('alamat'); ?>">
                        </div>
                      </div>

                      <div class="item form-group">

                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="RT">RT <span class="required">*</span>
                        </label>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="RT" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="RT" placeholder="masukkan RT "  required="required" type="text" value="<?php echo set_value('RT'); ?>">
                         
                          <?php echo form_error('RT', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>
                    <div class="item form-group">

                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="RW">RW <span class="required">*</span>
                        </label>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="RW" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="RW" placeholder="masukkan RW "  required="required"  type="text" value="<?php echo set_value('RW'); ?>">
                         
                          <?php echo form_error('RW', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>
                    <div class="item form-group">

                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="dusun">DUSUN <span class="required">*</span>
                        </label>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="dusun" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="dusun" placeholder="masukkan dusun "  required="required" type="text" value="<?php echo set_value('dusun'); ?>">
                         
                          <?php echo form_error('dusun', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>

                    <div class="item form-group">

                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="kelurahan">KELURAHAN <span class="required">*</span>
                        </label>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="kelurahan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="kelurahan" placeholder="masukkan kelurahan "  required="required" type="text" value="<?php echo set_value('kelurahan'); ?>">
                         
                          <?php echo form_error('kelurahan', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>
                    <div class="item form-group">

                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="kecamatan">KECAMATAN <span class="required">*</span>
                        </label>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="kecamatan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="kecamatan" placeholder="masukkan kecamatan "  required="required" type="text" value="<?php echo set_value('kecamatan'); ?>">
                         
                          <?php echo form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>
                    <div class="item form-group">

                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="kode_pos">KODE POS <span class="required">*</span>
                        </label>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="kode_pos" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="kode_pos" placeholder="masukkan kode_pos"  required="required"pattern="[0-9]{5}" type="text" value="<?php echo set_value('kode_pos'); ?>">
                         
                          <?php echo form_error('kode_pos', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>


                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_hp_ortu">NO HP ORANG TUA <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="no_hp_ortu" name="no_hp_ortu" placeholder="masukkan no_hp_ortu siswa 10 kar"  required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12"  value="<?php echo set_value('no_hp_ortu'); ?>">
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