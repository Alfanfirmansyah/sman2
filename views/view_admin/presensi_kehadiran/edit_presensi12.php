
                <div class="x_panel">
			<div class="container">

		 	<h2 style="color: green " align="center"> EDIT DAFTAR PRESENSI SISWA </h2>
		    <hr>
		     <br><br>
		           <?php if (validation_errors() ) 
				    { ?>
				      <div  class="alert alert-danger" role="alert">
				        <?php echo validation_errors(); ?>
				        

				      </div>
				    <?php } ?>
                 
		    
			
		      

 
		
		 <form action="<?php echo base_url(); ?>admin/update_presensi12" method ="post"  class="form-horizontal form-label-left"  enctype="multipart/form-data">

		 	
		    <br><br>


         <?= $this->session->flashdata('message2'); ?>

		<table class="table" >
			<tr> 
				<td>NO</td>
				<td>NAMA SISWA</td>
				<td>KELAS</td>
				<td>JADWAL PELAJARAN</td>
         		<td>JAM PELAJARAN</td>
         		<td width="15%">KETERANGAN</td>
         		<td>LAMPIRAN</td>	
         		
			</tr>
            <?php 
            $no=1;
            foreach($siswa as $data) { ?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $data->nama_siswa ?></td>
					<td><?php echo $data->nama_kelas ?></td>
					<td>
						<input type="text" value="<?php echo $data->nama_pelajaran ?>" readonly>
                  	</td>
					<td>
						<input type="text" value="<?php echo $data->jam_pelajaran ?>" readonly >
					</td>

			
					<td>
						<div class="col-md-12 col-sm-6 col-xs-12">
                       
                        	<?php foreach ($keterangan_presensi as $kj): ?>
	                        	<input type="radio" name="kd_keterangan" value="<?php echo $kj->kd_keterangan ?>" 
									<?php if($kj->kd_keterangan==$data->kd_keterangan_fk) echo "checked" ?>>
									<?php echo $kj->kd_keterangan ?>
	                        <?php endforeach ?>
                      	</div>
					</td>
					<td>
						<input type="file" id="file" name="gambar">
						<?php echo "file jpeg max 3 mb"; ?>
					</td>

				

					<input type="hidden" name="id_presensi" value="<?php echo $data->id_presensi?>">

					<input type="hidden" name="id_siswa" value="<?php echo $data->id_siswa?>">
					
					
					
					
				</tr>

						
		<?php } ?>

		

			</table>
			   <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-8 col-md-offset-3">
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