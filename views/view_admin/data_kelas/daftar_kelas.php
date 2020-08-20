
        <div class="x_panel">
			<div class="container">

		<h2 style="color: #218c74 " align="center"> DATA MASTER KELAS DI SMAN 2 MOJOKERTO</h2>
		<hr>
		<a href="<?php echo base_url(); ?>admin/form_kelas"> <button type="button" class="btn btn-success btn-lg"> + TAMBAH KELAS </button> </a><br><br>

			<?= $this->session->flashdata('message2'); ?>
		
		<form>

		<table id="datatable" class="table table-striped table-bordered">
			<thead>
			<tr> 
				<td>NO</td>
				<td>NAMA KELAS </td>
				<td>TINGKAT KELAS</td>
				<td>RUANGAN</td>
			
				<td>AKSI</td>
				
			</tr>
			</thead>
			<tbody align="center">
			<?php 

			$no = 1;
			foreach($kelas as $row) {

			?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $row->nama_kelas ?></td>
					<td><?php echo $row->tingkat_kelas ?></td>
					<td><?php echo $row->ruangan ?></td>
				
			

					<td>
			 	<!--  -->
				<a href="<?php echo site_url('admin/edit_kelas/'.$row->id_kelas); ?>" class="btn btn-sm btn-info">Edit</a>
				 <a href="<?php echo site_url('admin/hapus_kelas/'.'?id_kelas='.$row->id_kelas);?>" class="sa-remove-siswa btn btn-sm btn-danger">Hapus</a> 

				</td>
					
				
				</tr>
		<?php } ?>
		</tbody>
		</table>
		</form>
</div>
</div>