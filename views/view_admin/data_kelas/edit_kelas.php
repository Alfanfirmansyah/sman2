     <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="container">
      <center><h2 style="color: #218c74 "> EDIT DATA KELAS</h2></center> <hr>
      <br> 

   <form action="<?php echo base_url(); ?>admin/update_kelas" method ="post"  class="form-horizontal form-label-left"  >



              <?= $this->session->flashdata('message2'); ?>
      
  
              <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_kelas">NAMA KELAS <span class="required">*</span>
                   </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="nama_kelas" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nama_kelas" placeholder="masukkan nama kelas" type="text" value="<?php echo $kelas->nama_kelas ?>" readonly>


                    <?php echo form_error('nama_kelas', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                  </div>
              </div>


                    <input type="hidden" name="id_kelas" value=" <?php echo $kelas->id_kelas ?> ">

             
          
           
              <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tingkat_kelas">TINGKAT KELAS <span class="required">*</span>
                   </label>
             <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="btn btn-default dropdown-toggle" name="tingkat_kelas">
                          <?php if($kelas->tingkat_kelas == '10') {?>
                            <option value="10" selected>10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                          
                           <?php  } else if ($kelas->tingkat_kelas == '11') { ?>
                            <option value="10">10</option>
                            <option value="11" selected>11</option>
                            <option value="12">12</option>

                          <?php  } else if ($kelas->tingkat_kelas == '12') { ?>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12"selected>12</option>

                          <?php } ?>

                      </select> 
                  </div>
              </div>
              <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ruangan">RUANGAN<span class="required">*</span>
                    </label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                    
                        
                             <input type="text" name="ruangan" value="<?php echo $kelas->ruangan ?> ">
                       
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