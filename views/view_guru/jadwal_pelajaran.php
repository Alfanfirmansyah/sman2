<div class="right_col" role="main">
<div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
           
            <div class="x_panel">
			<div class="container">

	<h2 style="color: green " align="center"> DAFTAR JADWAL PELAJARAN SMAN 2 </h2>
		<hr>
		


	<form>
		<table class="table table-striped table-bordered table-hover table-condensed" >
			<tr align="center">
				
				<td>Hari</td>
				<td>Jam Mulai</td>
				<td>Jam Selesai</td>
				<td>Mata Pelajaran</td>
				<td>Kelas</td>
			
			
			</tr>
			<?php 

			//$no = 1;
			foreach($jadwal_pelajaran as $jd) {

			?>
				<tr>
				
					<td><?php echo $jd->hari ?></td>
					<td><?php echo $jd->jam_mulai ?></td>
					<td><?php echo $jd->jam_selesai ?></td>
					<td><?php echo $jd->nama_pelajaran ?></td>
					<td><?php echo $jd->nama_kelas ?></td>
				
			

		
				
				</tr>
		<?php } ?>


		</table>
</form>

</div>
</div>
</div>
</div>
</div>