  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="container">
      <center><h2 style="color: #218c74 "> EDIT DATA TAHUN AJARAN</h2></center> <hr>
      <br> 

   <form action="<?php echo base_url(); ?>admin/update_tahun" method ="post"  class="form-horizontal form-label-left"  >



	<div class="item form-group">

            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="tahun_ajaran">tahun_ajaran <span class="required">*</span>
            </label>
            <div class="col-md-3 col-sm-6 col-xs-12">

              <input id="tahun_ajaran" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
              name="tahun_ajaran" placeholder="" readonly required="required" type="text" value="<?php echo $tahun_ajaran->tahun_ajaran ?>">

          
              <?php echo form_error('tahun_ajaran', '<small class="text-danger pl-3">', '</small>'); ?> <br>  

            </div>
  </div>
  <input type="hidden" name="kode" value="<?php echo $tahun_ajaran->id_tahun_ajaran ?>">

        <div class="item form-group">
        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="semester">Semester <span class="required">*</span>
        </label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="hidden" name="semester_awal" value="<?php echo $tahun_ajaran->kd_semester ?>">
                     <select name="semester" class="form-control">
                    <?php foreach ($semester as $r): ?>
                      <option value="<?php echo $r->kd_semester ?>" <?php echo ($r->kd_semester== $tahun_ajaran->kd_semester)?'selected="selected"':''?>><?php echo $r->semester?></option>
                    <?php endforeach ?>
                    </select>
                                  
                  <?php echo form_error('status', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                                    
                  </div>
 
           </div>
          
    <div class="item form-group">
        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
        </label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="hidden" name="status_awal" value="<?php echo $tahun_ajaran->status ?>">

                    <select class="btn btn-default dropdown-toggle" name="status" >
                    
                    <?php if($tahun_ajaran->status == 'On') {?>
                      <option value="On" selected> On</option>
                      <option value="Off">Off</option>
                    <?php } else { ?>
                        <option value="On">On</option>
                      <option value="Off" selected>Off</option>
                      <?php } ?>
                    </select>
                                  
                  <?php echo form_error('status', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                                    
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