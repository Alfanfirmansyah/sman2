<div class="right_col" role="main">
<div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
           
            <div class="x_panel">
			<div class="container">

		<h2 style="color: green " align="center"> DAFTAR JADWAL PEMBELAJARAN SMAN 2 </h2>
		<hr>
		



	<form>
		<table class="table table-striped table-bordered table-hover table-condensed" >
			<tr align="center">
				
				<td>Hari</td>
				<td>Jam Mulai</td>
				<td>Jam Selesai</td>
				<td>Mata Pelajaran</td>
				<td>Kelas</td>
				<td>Nama Guru</td>
				<td>Aksi</td>
			</tr>
			<?php 

			//$no = 1;
			foreach($jadwalpelajaran as $jd) {

			?>
				<tr>
				
					<td><?php echo $jd->hari ?></td>
					<td><?php echo $jd->jam_mulai ?></td>
					<td><?php echo $jd->jam_selesai ?></td>
					<td><?php echo $jd->nama_pelajaran ?></td>
					<td><?php echo $jd->nama_kelas ?></td>
					<td><?php echo $jd->nama_guru ?></td>
			

					<td>
			 	<?php echo anchor('home/edit_jadwal/'.$jd->id_jadwal,'<i class="fas fa-edit"></i>'); ?>
				<?php echo anchor('home/hapus_jadwal/'.'?id_jadwal='.$jd->id_jadwal ,'<i class="fas fa-trash-alt"></i>'); ?> 
				</td>
					
				
				</tr>
		<?php } ?>


		</table>
</form>

</div>
</div>
</div>
</div>
</div>