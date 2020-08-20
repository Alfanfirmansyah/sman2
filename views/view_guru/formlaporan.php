        <div class="x_panel">
			<div class="container">

		 	<h2 style="color: green " align="center"> LAPORAN PRESENSI SISWA KELAS 12</h2>
		    <hr>
		     <br><br>
		           
                 

		
		 <form action="<?php echo base_url(); ?>guru/lihat_laporan_presensi" method ="post"  class="form-horizontal form-label-left" enctype="multipart/form-data" >


 <div class="form-group">
                        <div class="col-md-8 ">
				<label>Masukkan Tanggal</label>
				<input type="date" name="tgl" class="form-control"></div>
			</div>

			<div class="form-group">

                        <div class="col-md-8">
<label>Masukkan Jam Pelajaran</label>
                      <select class="btn btn-default dropdown-toggle form-control" id="jadwal" name="id_jadwal" >

                       <option>Pilih</option>
                        <?php foreach ($jadwalll as $dj) : ?>

                          <option value="<?php echo $dj->id_jadwal ?>"><?php echo $dj->nama_pelajaran ?> - <?php echo $dj->jam_pelajaran ?>
                          </option>
                        <?php endforeach ?>
           
                  		</select>
                  	</div>
                  </div>
					
				

		
			   <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-12">
                        <button id="send" type="submit" class="btn btn-success"><i class="fa fa-print"> </i> Cetak</button>
                          
                        </div>
                      </div>

</form>

</div>
</div>
</div>
</div>
</div>