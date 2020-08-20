                <div class="x_panel">
                <div class="container">

                  <center><h2 style="color: #218c74 "> FORM TAMBAH GURU </h2></center> <hr>
                  <br> 
      <?php if (validation_errors() ) 
    { ?>
      <div  class="alert alert-danger" role="alert">
        <?php echo validation_errors(); ?>
        

      </div>
    <?php } ?>
                  
          <form action="<?php echo base_url(); ?>admin/tambah_guru" method ="post"  class="form-horizontal form-label-left" enctype="multipart/form-data" >

					<?= $this->session->flashdata('message'); ?>
      
    
   					        <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nama_guru">NAMA GURU <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="nama_guru" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="nama_guru" placeholder="masukkan nama guru" pattern="[A-Za-z ]+" type="text" value=" <?php echo set_value('nama_guru'); ?>">
                          <input type="hidden" name="id_guru">
                          <?php echo form_error('nama_guru', '<small class="text-danger pl-3">', '</small>'); ?> <br>	

                        </div>

                    </div>
                   <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="email">EMAIL<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="email" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="email" placeholder="masukkan email guru"  type="text" value="<?php echo set_value('email'); ?>">
                        
                          <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="NUPTK">NUPTK <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="NUPTK" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="NUPTK" placeholder="masukkan nuptk guru 16 angka" pattern="[0-9]{16}" type="text" value="<?php echo set_value('NUPTK'); ?>">
                          
                          <?php echo form_error('NUPTK', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="jk">Jenis Kelamin <span class="required">*</span>
                        </label>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <select class="btn btn-default dropdown-toggle" name="jk">
                            <option value="L"> L</option>
                            <option value="P">P</option>
                          </select>
                        
                          <?php echo form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                          
                        </div>

                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="tempat_lahir">TEMPAT LAHIR <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="tempat_lahir" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="tempat_lahir" placeholder="masukkan tempat lahir" pattern="[A-Za-z ]+" required  type="text" value="<?php echo set_value('tempat_lahir'); ?>">
                         
                          <?php echo form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="tgl_lahir"> TANGGAL LAHIR <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class='input-group date' id='guru'>
                            <input type='text' class="form-control" name="tgl_lahir" readonly="readonly" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div> 

                    <div class="item form-group">

                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nip">NIP <span class="required">*</span>
                        </label>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="nip" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="nip" placeholder="masukkan nip guru  18 angka" pattern="[0-9]{18}" required="required"  type="text" value="<?php echo set_value('nip'); ?>">
                         
                          <?php echo form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>
                    <div class="item form-group">

                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="jenis_ptk">JENIS PTK <span class="required">*</span>
                        </label>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="jenis_ptk" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="jenis_ptk" placeholder="masukkan jenis_ptk guru"  type="text" value="<?php echo set_value('jenis_ptk'); ?>">
                         
                          <?php echo form_error('jenis_ptk', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>
                    <div class="item form-group">

                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="agama">agama <span class="required">*</span>
                        </label>

                        <div class="col-md-3 col-sm-6 col-xs-12">

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
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="alamat">ALAMAT <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="alamat" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="alamat" placeholder="masukkan alamat"  type="text" value="<?php echo set_value('alamat'); ?>">
                        
                          <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>
                    <div class="item form-group">

                        <label class="control-label col-md-5 col-sm-3 col-xs-12" for="RT">RT <span class="required">*</span>
                        </label>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="RT" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="RT" placeholder="masukkan RT guru"  required="required" pattern="[0-9]{1,2}" type="text" value="<?php echo set_value('RT'); ?>">
                         
                          <?php echo form_error('RT', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>
                    <div class="item form-group">

                        <label class="control-label col-md-5 col-sm-3 col-xs-12" for="RW">RW <span class="required">*</span>
                        </label>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="RW" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="RW" placeholder="masukkan RW guru"   required="required" pattern="[0-9]{1,2}" type="text" value="<?php echo set_value('RW'); ?>">
                         
                          <?php echo form_error('RW', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>
                    <div class="item form-group">

                        <label class="control-label col-md-5 col-sm-3 col-xs-12" for="dusun">DUSUN <span class="required">*</span>
                        </label>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="dusun" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="dusun" placeholder="masukkan dusun guru" pattern="[A-Za-z]{3,30}" type="text" required value="<?php echo set_value('dusun'); ?>">
                         
                          <?php echo form_error('dusun', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>

                    <div class="item form-group">

                        <label class="control-label col-md-5 col-sm-3 col-xs-12" for="kelurahan">KELURAHAN <span class="required">*</span>
                        </label>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="kelurahan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="kelurahan" placeholder="masukkan kelurahan guru" pattern="[A-Za-z]{3,30}" required  type="text" value="<?php echo set_value('kelurahan'); ?>">
                         
                          <?php echo form_error('kelurahan', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>
                    <div class="item form-group">

                        <label class="control-label col-md-5 col-sm-3 col-xs-12" for="kecamatan">KECAMATAN <span class="required">*</span>
                        </label>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="kecamatan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="kecamatan" placeholder="masukkan kecamatan guru" pattern="[A-Za-z]{3,30}" required  type="text" value="<?php echo set_value('kecamatan'); ?>">
                         
                          <?php echo form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>
                    <div class="item form-group">

                        <label class="control-label col-md-5 col-sm-3 col-xs-12" for="kode_pos">KODE POS <span class="required">*</span>
                        </label>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="kode_pos" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="kode_pos" placeholder="masukkan kode_pos guru"pattern="[0-9]{5}"  type="text" value="<?php echo set_value('kode_pos'); ?>">
                         
                          <?php echo form_error('kode_pos', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="no_hp"> NO HANDPHONE <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="no_hp" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="no_hp" placeholder="masukkan nomer handphone"  type="text" value="<?php echo set_value('no_hp'); ?>">
                         
                          <?php echo form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>
   
                  <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-3 col-md-offset-4">
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


