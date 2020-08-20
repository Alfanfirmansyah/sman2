        <div class="x_panel">
			<div class="container">

		 	<h2 style="color: green " align="center"> LAPORAN PRESENSI SISWA KELAS 12</h2> <?php echo $this->session->userdata('nama_guru'); ?> || <?php echo $this->session->userdata('nip'); ?>
		    <hr>
		     <br><br>
		           
                 

		
		 <form action="<?php echo base_url(); ?>wali_kelas/cetak_tes" method ="post"  class="form-horizontal form-label-left" enctype="multipart/form-data" >


  <div class="form-group">
                        <div class="col-md-8 ">
				<label>Masukkan Tanggal</label>
			
			</div>

			
		
			   <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-12">
                        <button id="send" type="submit" class="btn btn-success" target="_blank"><i class="fa fa-print"> </i> Cetak</button>
                          
                        </div>
                      </div>

</form>

</div>
</div>
</div>
</div>
</div>