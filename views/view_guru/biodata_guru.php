
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
			<div class="container">

		<h2 style="color: #218c74 " align="center"> BIODATA DIRI</h2>
		<hr>

		<?= $this->session->flashdata('message'); ?>

	<form>
		<!-- <?php
				//foreach ($guru as $foto){
			 ?>
	<center><img src="<?php //echo base_url(); ?>foto/guru/<?php// echo $foto->foto; ?>" style="width: 15%;height: 15%"></center>
	<br> -->

	<?php// } ?>

		<table id="datatable" class="table table-striped table-bordered" >
			<thead>
			<tr align="center" style="color: black" >
				<td>NO</td>
				<td>NAMA GURU</td>
				<td>EMAIL</td>
				<td>NUPTK</td>
				<td>JK</td>
				<td>TEMPAT LAHIR</td>
				<td>TANGGAL LAHIR</td>
				<td>NIP</td>
				<td>JENIS PTK</td>
				<td>AGAMA </td>
				<td>ALAMAT</td>
				<td>RT</td>
				<td>RW</td>
				<td>DUSUN</td>
				<td>KELURAHAN</td>
				<td>KECAMATAN</td>
				<td>KODE POS</td>
				<td>NO HP</td>
				<td>AKUN USER</td>
			

			</tr>
		</thead>
		<tbody>


			<?php 
				$no = 1;
				foreach ($guru as $gr){
			 ?>
				<tr align="center">
			 	<td><?php echo $no++ ?></td>
			 	<td><?php echo $gr->nama_guru ?></td>
			 	<td><?php echo $gr->email ?></td>
			 	<td><?php echo $gr->NUPTK ?></td>
			 	<td><?php echo $gr->jk ?></td>
			 	<td><?php echo $gr->tempat_lahir ?></td>
			 	<td><?php echo $gr->tgl_lahir; ?></td>
			 	<td><?php echo $gr->nip; ?></td>
			 	<td><?php echo $gr->jenis_ptk ?></td>
			 	<td><?php echo $gr->agama ?></td>
			 	<td><?php echo $gr->alamat ?></td>
			 	<td><?php echo $gr->RT ?></td>
			 	<td><?php echo $gr->RW ?></td>
			 	<td><?php echo $gr->dusun ?></td>
			 	<td><?php echo $gr->kelurahan ?></td>
			 	<td><?php echo $gr->kecamatan ?></td>
			 	<td><?php echo $gr->kode_pos ?></td>
			 	<td><?php echo $gr->no_hp ?></td>
			 	<td><?php echo $gr->username; ?></td>
			 	
			 	
			 </tr>

			<?php } ?>
			</tbody>
		</table>
		

</form>

</div>
</div>
</div>
</div>
</div>