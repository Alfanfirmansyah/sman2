    <div class="x_panel">
    <div class="container">
      <center><h2 style="color: #218c74 "> EDIT DATA USER</h2></center> <hr>
      <br> 

   <form action="<?php echo base_url(); ?>wali_kelas/update_pass" method ="post"  class="form-horizontal form-label-left"  >



	<div class="item form-group">

            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="username">Username <span class="required">*</span>
            </label>
            <div class="col-md-3 col-sm-6 col-xs-12">

              <input id="username" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
              name="username" placeholder="" required="required" type="text" readonly value="<?php echo $login->username ?>">

          
              <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?> <br>  

            </div>
  </div>
  <input type="hidden" name="id" value="<?php echo $login->id ?>">


      
   <div class="item form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
            </label>
            <div class="col-md-3 col-sm-6 col-xs-12">

              <input id="password" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
              name="password" placeholder="" required="required" type="password" value="">
            
              <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
              
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