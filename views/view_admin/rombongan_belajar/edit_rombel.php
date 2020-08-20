  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="container">
      <center><h2 style="color: #218c74 "> EDIT DATA ROMBONGAN BELAJAR</h2></center> <hr>
      <br> 

   <form action="<?php echo base_url(); ?>admin/update_rombel" method ="post"  class="form-horizontal form-label-left"  >



	       <div class="item form-group">

            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="id_kelas">Kelas <span class="required">*</span>
            </label>
            <div class="col-md-3 col-sm-6 col-xs-12">

               <select name="id_kelas" class="form-control">
                    <?php foreach ($kelas as $r): ?>
                      <option value="<?php echo $r->id_kelas ?>" <?php echo ($r->id_kelas == $rombel->id_kelas)?'selected="selected"':''?>><?php echo $r->nama_kelas?></option>
                     <?php endforeach ?>
               </select>

            </div>
          </div>
           <input type="hidden" name="id" value="<?php echo $rombel->id_detail ?>">


      
        <div class="item form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="id_siswa">Nama Siswa <span class="required">*</span>
            </label>
            <div class="col-md-3 col-sm-6 col-xs-12">

                <select name="id_siswa" class="form-control">
                    <?php foreach ($siswa as $r): ?>
                      <option value="<?php echo $r->id_siswa ?>" <?php echo ($r->id_siswa == $rombel->id_siswa)?'selected="selected"':''?>><?php echo $r->nama_siswa?></option>
                  <?php endforeach ?>
                 </select>
            
                <?php echo form_error('id_siswa', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
              
            </div>

        </div>

        <div class="item form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nip">Wali Kelas <span class="required">*</span>
            </label>
            <div class="btn-group col-md-6 col-sm-6 col-xs-12">
  
                <select name="nip" class="form-control">
                    <?php foreach ($wali as $r): ?>
                      <option value="<?php echo $r->nip ?>" <?php echo ($r->nip== $rombel->id_wali_fk)?'selected="selected"':''?>><?php echo $r->nama_guru?></option>
                    <?php endforeach ?>
                </select>

                <?php echo form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
            </div>
 
        </div>

        <div class="item form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="id_tahun_ajaran">Tahun Ajaran<span class="required">*</span>
              </label>
              <div class="btn-group col-md-6 col-sm-6 col-xs-12">

                  <select name="id_tahun_ajaran" class="form-control">
                    <?php foreach ($tahun as $r): ?>
                      <option value="<?php echo $r->id_tahun_ajaran ?>" <?php echo ($r->id_tahun_ajaran== $rombel->id_tahun_ajaran_fk)?'selected="selected"':''?>><?php echo $r->tahun_ajaran?></option>
                    <?php endforeach ?>
                  </select>

                  <?php echo form_error('id_tahun_ajaran', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
              </div>
             
          </div>

      <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-3 col-md-offset-4">
            <button type="submit" class="btn btn-success">Submit</button>
              <button type="reset" class="btn btn-primary">Cancel</button>

            </div>
          </div>

 
</form>
          <?php //echo form_close(); ?>
     

  </div>
</div>
</div>
</div>
</div>