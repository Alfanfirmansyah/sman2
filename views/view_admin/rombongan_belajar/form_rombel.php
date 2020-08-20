                <div class="x_panel">
                <div class="container">

                  <center><h2 style="color: #218c74 "> FORM TAMBAH ROMBEL </h2></center> <hr>
                  <br> 
      <?php if (validation_errors() ) 
    { ?>
      <div  class="alert alert-danger" role="alert">
        <?php echo validation_errors(); ?>
        

      </div>
    <?php } ?>
                  
          <form action="<?php echo base_url(); ?>admin/tambah_rombel" method ="post"  class="form-horizontal form-label-left"  >

					<?= $this->session->flashdata('message2'); ?>
      
    
   					<div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="kelas">kelas <span class="required">*</span>
                        </label>
                        <div class="btn-group col-md-3 col-sm-6 col-xs-12">
                        <select  class="js-example-basic-single col-md-5" name="id_kelas" required >
                        <option value="">Pilih Kelas </option>
                        <?php foreach ($kelas as $r): ?>
                          <option value="<?php echo $r->id_kelas ?>"> <?php echo $r->nama_kelas; ?> 
                          </option>
                        <?php endforeach ?>
                      </select>

                    <?php echo form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                      </div>

                    </div>


   					<div class="item form-group">
   						<label class="control-label col-md-4 col-sm-3 col-xs-12" for="wali_kelas">Wali Kelas<span class="required">*</span>
              </label>
                   <div class="btn-group col-md-5 col-sm-6 col-xs-12">
                      <select  class="js-example-basic-single col-md-4" name="nip" required>
                        <option value="">Pilih Wali Kelas</option>
                        <?php foreach ($wali as $r): ?>
                          <option value="<?php echo $r->id_guru ?>"> 
                            <?php echo $r->nama_guru; ?>                          
                        </option>
                        <?php endforeach ?>
                      </select>

                    <?php echo form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                      </div>
             
                  </div>

                  
            <div class="item form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="tahun_ajaran">Tahun Ajaran<span class="required">*</span>
              </label>
                   <div class="btn-group col-md-5 col-sm-6 col-xs-12">
                      <select class="js-example-basic-single col-md-4" name="id_tahun_ajaran" required>
                        <option value="">Pilih Tahun Ajaran</option>
                        <?php foreach ($tahun as $r): ?>
                          <option  value="<?php echo $r->id_tahun_ajaran ?>" > 
                            <?php echo $r->tahun_ajaran; ?>  <?php echo $r->semester; ?>                         
                        </option>
                        <?php endforeach ?>
                      </select>

                    <?php echo form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
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



