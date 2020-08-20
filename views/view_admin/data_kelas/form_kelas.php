
      <div class="x_panel">
        <div class="container">
           <center><h2 style="color: #218c74 "> FORM KELAS BARU </h2></center> <hr>
           <br> <br>

           <?php if (validation_errors() ) 
            { ?>
              <div  class="alert alert-danger" role="alert">
                <?php echo validation_errors(); ?>
              </div>
            <?php } ?>


             <form action="<?php echo base_url(); ?>admin/tambah_kelas" method ="post"  class="form-horizontal form-label-left"  >

              <?= $this->session->flashdata('message2'); ?>
  
              <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_kelas">NAMA KELAS <span class="required">*</span>
                   </label>
                   <div class="col-md-2 col-sm-6 col-xs-12">
                    <input id="nama_kelas" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nama_kelas" placeholder="masukkan nama kelas" type="text" value=" <?php echo set_value('nama_kelas'); ?>">


                    <?php echo form_error('nama_kelas', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                  </div> <?php echo "contoh : X IPS 1 "; ?>
              </div>
  
             
               <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tingkat_kelas">TINGKAT KELAS <span class="required">*</span>
                   </label>
             <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="btn btn-default dropdown-toggle" name="tingkat_kelas">
                        
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                           
                          </select> 
                  </div>
              </div>
                <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ruangan">RUANGAN<span class="required">*</span>
                    </label>

                     <div class="col-md-2 col-sm-6 col-xs-12">
                    <input id="ruangan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="ruangan" placeholder="masukkan ruangan" type="text" value=" <?php echo set_value('ruangan'); ?>">

                      </div><?php echo "contoh : X-IPS1 "; ?>
                      

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
