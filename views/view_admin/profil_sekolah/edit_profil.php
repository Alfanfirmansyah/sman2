  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="container">
      <center><h2 style="color: #218c74 "> EDIT PROFIL SEKOLAH </h2></center> <hr>
      <br> 

   <form action="<?php echo base_url(); ?>admin/update_profil" method ="post"  class="form-horizontal form-label-left" enctype="multipart/form-data" >


                <center><img src="<?php echo base_url(); ?>public/images/<?php echo $profil_sekolah->foto ?> " alt="..."  width=10%></center>
                <hr>

    <div class="item form-group">

            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nama_sekolah">NAMA SEKOLAH : <span class="required"></span>
            </label>
            <div class="col-md-3 col-sm-6 col-xs-12">

              <input id="nama_sekolah" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
              name="nama_sekolah" placeholder="" required="required" type="text" value="<?php echo $profil_sekolah->nama_sekolah ?>"> 

          
              <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?> <br><br><br>

             

            </div>  
      </div>

       <div class="item form-group">
        
           <label class="control-label col-md-4 col-sm-3 col-xs-12" for="foto">LOGO : <span class="required"></span>
            </label>
             <div class="col-md-3 col-sm-6 col-xs-12">
                 <input type="file" name="gambar">  
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