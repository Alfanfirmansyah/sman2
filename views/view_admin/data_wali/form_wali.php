
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="container">
                  <center><h2 style="color: green "> FORM WALI</h2></center> <hr>
                  <br> 
                <?php if (validation_errors() ) 
        { ?>
          <div  class="alert alert-danger" role="alert">
            <?php echo validation_errors(); ?>
            

          </div>
        <?php } ?>
                  
          <form action="<?php echo base_url(); ?>admin/tambah_wali" method ="post"  class="form-horizontal form-label-left"  >
      
    
          <div class="item form-group">
           
                <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_guru">NAMA WALI KELAS<span class="required">*</span>
                    </label>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="id_guru" class="form-control">
                        <?php foreach ($guru as $w ): ?>
                          <option value="<?php echo $w->id_guru ?>"> <?php echo $w->nama_guru; ?></option>
                        <?php endforeach ?>
                      </select>

                        <?php echo form_error('id_guru', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
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