<div class="right_col" role="main">
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="container">
      <center><h2 style="color: green "> EDIT DATA PRIBADI</h2></center> <hr>
      <br> 

   <form action="<?php echo base_url(); ?>wali_kelas/update_wali" method ="post"  class="form-horizontal form-label-left"  >
  


 

    <div class="item form-group">
        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nama_guru">NAMA GURU <span class="required">*</span>
        </label>
        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <?php foreach ($guru as $rl):?>

          <input id="nama_guru" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nama_guru" placeholder="masukkan nomer handphone"  type="text" value=" <?php echo $rl->nama_guru ?>"> 
           <?php endforeach ?>
          <?php echo form_error('nama_guru', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

        </div>

      </div>

   <div class="item form-group">
        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="jk">Jenis Kelamin <span class="required">*</span>
        </label>

        <div class="col-md-3 col-sm-6 col-xs-12">

          <select class="btn btn-default dropdown-toggle" name="jk" value="<?php echo $guru->jk ?>">
          
            <option value="laki-laki"> laki-laki</option>
            <option value="perempuan">Perempuan</option>
          </select>
                        
        <?php echo form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                          
        </div>

    </div>

    <div class="item form-group">

          <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nip">NIP <span class="required">*</span>
          </label>

          
          <div class="col-md-3 col-sm-6 col-xs-12">
          <?php foreach ($guru as $rl):?>

          <input id="nip" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nip" placeholder="masukkan nomer nip"  type="text" value=" <?php echo $rl->nip ?>"> 
           <?php endforeach ?>
          <?php echo form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

        </div>


    </div>

    <div class="item form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12" for="alamat">ALAMAT <span class="required">*</span>
          </label>

          <div class="col-md-3 col-sm-6 col-xs-12">

            <select class="btn btn-default dropdown-toggle" name="id_guru" >
                       
                        <?php foreach ($guru as $rl): ?>
                          <option value="<?php echo $rl->id_guru ?>"><?php echo $rl->alamat; ?></option>
                        <?php endforeach ?>
                      </select>
            <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

          </div>

    </div>

    <div class="item form-group">
         <label class="control-label col-md-4 col-sm-3 col-xs-12" for="no_hp"> NO HANDPHONE <span class="required">*</span>
          </label>
        
        <div class="col-md-3 col-sm-6 col-xs-12">
      <?php foreach ($guru as $rl):?>

          <input id="no_hp" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="no_hp" placeholder="masukkan nomer handphone"  type="text" value=" <?php echo $rl->no_hp ?>">
           <?php endforeach ?>
          <?php echo form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

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