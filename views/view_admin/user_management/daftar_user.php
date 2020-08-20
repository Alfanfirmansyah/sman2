        <div class="x_panel">
			<div class="container">

		<h2 style="color: #218c74 " align="center"> DAFTAR USER</h2>
		<hr>

		<?= $this->session->flashdata('message2'); ?>
	
		<a href="<?php echo base_url(); ?>admin/tambah_user"> <button type="button" class="btn btn-success btn-lg"  > + TAMBAH USER</button> </a>
		 <br><br>


	


	<form>
		<table id="datatable" class="table table-striped table-bordered">
			<thead>
			<tr align="center">
				<td>No</td>
				<td>Username</td>
				<td>Password</td>
				<td>Nama Level</td>
				
				<td>Opsi Buka Absensi</td>
				<td>Aksi</td>
			</tr>
		</thead>

	
		<tbody>
			<?php 
				$no = 1;
				foreach ($user as $log){
			 ?>
			 <tr>
			 	<td><?php echo $no++; ?></td>
			 	<td><?php echo $log->username; ?></td>
			 	<td><?php echo $log->password; ?></td>
			 	<td><?php echo $log->role; ?></td>

			 	<td class="text-center">
			 	<?php if($log->opsi_buka_absen == 0){ ?>

		<a href="<?php echo site_url('admin/status_on/'.$log->id); ?>" class="btn btn-sm btn-default">OFF</a>
			 	
			 	<?php } else { ?>

			<a href="<?php echo site_url('admin/status_off/'.$log->id); ?>" class="btn btn-sm btn-warning">ON</a>

			 	<?php } ?>
		
				</td>
			 	<td>
			 	<a href="<?php echo site_url('admin/edit_user/'.$log->id); ?>" class="btn btn-sm btn-info">Edit</a>
				 <a href="#" data-id="<?php echo $log->id ?>" class="sa-remove-user btn btn-sm btn-danger">Hapus</a>
				</td>
			 </tr>

			<?php } ?>
		</tbody>

		</table>


</form>

</div>
</div>