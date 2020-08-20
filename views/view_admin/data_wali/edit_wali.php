<div class="right_col" role="main">
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="container">
                  <center><h2 style="color: green "> EDIT WALI</h2></center> <hr>
                  <br> 
            
               <form action="<?php echo base_url(); ?>home/update_wali" method ="post"  class="form-horizontal form-label-left"  >

        
             
        <div class="item form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="id_guru">ID GURU<span class="required">*</span>
            </label>
            <div class="col-md-3 col-sm-6 col-xs-12">
            <input id="id_guru" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="id_guru" placeholder="" required="required" type="text" readonly value="<?php echo $guru->id_guru ?>" >

            </div> 
        </div>

         
   			 <div class="item form-group">
           
                <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_guru">NAMA WALI KELAS<span class="required">*</span>
                    </label>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="nama_guru" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nama_guru" placeholder="" required="required" type="text"  value="<?php echo $guru->nama_guru ?>" >
                        <?php echo form_error('nama_guru', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
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