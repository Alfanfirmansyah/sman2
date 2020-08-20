               <div class="x_panel">
                <div class="container">
                  <center><h2 style="color: #218c74 "> FORM TAHUN AJARAN BARU</h2></center> <hr>
                  <br> 
                <?php if (validation_errors() ) 
        { ?>
          <div  class="alert alert-danger" role="alert">
            <?php echo validation_errors(); ?>
            

          </div>
        <?php } ?>
                  
          <form action="<?php echo base_url(); ?>admin/tambah_tahun" method ="post"  class="form-horizontal form-label-left"  >
        <?= $this->session->flashdata('message2'); ?>
      
         
   					<div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="tahun_ajaran">Tahun Ajaran <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
            <select name="tahun1" id="tahun1">
                <option value="">Please Select</option>
                <?php
                $thn_skr = date('Y');
                for ($x = $thn_skr; $x <= 2025; $x++) {
                ?>
                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                <?php
                }
                ?>
            </select> 
            /
             <select name="tahun2" id="tahun2">
                <option value="">Please Select</option>
                <?php
                $thn_skr = date('Y');
                for ($x = $thn_skr; $x <= 2025; $x++) {
                ?>
                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                <?php
                }
                ?>
            </select> 
            </div><?php echo "Contoh : 2019/2020 "; ?>
            </div>
           

            <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="semester">Semester <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">

                        <select name="semester" class="form-control">
                          <?php foreach ($semester as $r): ?>
                            <option value="<?php echo $r->kd_semester ?>"> <?php echo $r->semester; ?>
                            </option>
                          <?php endforeach ?>
                        </select>
                        </div>
            </div>

   					<div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
                        </label>
                        <div class="btn-group col-md-6 col-sm-6 col-xs-12">
	           
                  	    <select class="btn btn-default dropdown-toggle" name="status" >
                        <option>On</option>
                        <option>Off</option>
           
                    </select>
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