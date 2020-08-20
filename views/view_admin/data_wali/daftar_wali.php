
                <div class="x_panel">
			<div class="container">

		<h2 style="color: green " align="center"> DATA WALI KELAS SMAN 2 MOJOKERTO</h2>
		<hr>

		<?= $this->session->flashdata('message'); ?>
      

		 <br><br>


	<form>
		 <table id="datatable" class="table table-striped table-bordered">
		<thead>
			<tr align="center">
				<td>NO</td>
				<td>NAMA WALI</td>
				<td>JK</td>
				<td>NIP</td>
				<td>Alamat</td>
				<td>NO HP</td>
				<td>KELAS</td>
				<td>TAHUN AJARAN</td>
				<td>AKSI</td>
			</tr>
		</thead>
		<tbody>

			<?php 
				$no = 1;
				foreach ($wali_kelas as $wl){
			 ?>
			 <tr>
			 	<td><?php echo $no++ ?></td>
			 	<td><?php echo $wl->nama_guru ?></td>
			 	<td><?php echo $wl->jk ?></td>
			 	<td><?php echo $wl->nip ?></td>
			 	<td><?php echo $wl->alamat; ?></td>
			 	<td><?php echo $wl->no_hp ?></td>
			 	<td><?php echo $wl->nama_kelas; ?></td>
				<td><?php echo $wl->tahun_ajaran; ?></td>	
			 	<td>
			 	
				      <a href="#" data-id="<?php echo $wl->id_wali_fk ?>" class="sa-remove-wt btn btn-sm btn-danger">Hapus</a>
				      
				</td>
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



