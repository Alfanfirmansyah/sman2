        <div class="x_panel">
			<div class="container">

		<h2 style="color: #218c74 " align="center"> DAFTAR TAHUN AJARAN</h2>
		<hr>

		<?= $this->session->flashdata('message2'); ?>
	
		<a href="<?php echo base_url(); ?>admin/form_tahun"> <button type="button" class="btn btn-success btn-lg"  > + TAMBAH TAHUN AJARAN</button> </a>
		 <br><br>


	


	<form>
		<table id="datatable" class="table table-striped table-bordered">
			<thead>
			<tr align="center">
				<td>No</td>
				<td>Tahun Ajaran</td>
				<td>Semester</td>
				<td>Status</td>
				<td>Aksi</td>  
			</tr>
		</thead>

	
		<tbody align="center">
			<?php 
				$no = 1;
				foreach ($tahun_ajaran as $row){
			 ?>
			 <tr>
			 	<td><?php echo $no++ ?></td>
			 	<td><?php echo $row->tahun_ajaran ?></td>
			 	<td><?php echo $row->semester ?></td>
			 	<td><?php echo $row->status ?></td>
			 	<td>
			 	<a href="<?php echo site_url('admin/edit_tahun/'.$row->id_tahun_ajaran); ?>" class="btn btn-sm btn-info">Edit</a>
		
				</td>
			 </tr>

			<?php } ?>
		</tbody>

		</table>


</form>

</div>
</div>