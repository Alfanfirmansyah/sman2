                <div class="x_panel">
			<div class="container">

		<h2 style="color: #218c74 " align="center"> DAFTAR PRESENSI SISWA </h2><br>
		<hr>
		 <br><br>
		 <?= $this->session->flashdata('message'); ?>
		 	<a href="<?php echo base_url(); ?>wali_kelas/daftarkelas_presensi3"> <button type="button" class="btn btn-success btn-lg"  > + INPUTKAN PRESENSI</button> </a>
		 <br><br>
     		
	<form>

		 <table>
                <tr>
                	  <th class="none"></th>
                    <label style="margin-left:1%" for="filter">Filter By Kelas</label>
                    <th class="filterhead"></th>
                   
                </tr>
            </table><br>
		<table id="exampledr" class="table table-striped table-bordered">
			<thead>

			<tr align="center"> 
				<td class="none">KELAS</td>
				<td>NO</td>
				<td>TANGGAL</td>
				<td>NAMA SISWA</td>
				<td>KELAS</td>
         		<td>JADWAL PELAJARAN</td>
         		<td>JAM PELAJARAN</td>
         		<td>MODUL PEMBAHASAN</td>
         		<td>KETERANGAN</td>
         		<td>LAMPIRAN</td>
         		<td>AKSI</td>
			</tr>
			</thead>

			<tbody>

            <?php
            $no = 1; 
            foreach($presensi as $p) { ?>
				<tr>
					<td class="none"><?php 
					echo $p->nama_kelas
					?>	
					</td>
					<td><?php echo $no++ ?></td>
					<td><?php echo $p->tgl  ?></td>
					<td><?php echo $p->nama_siswa  ?></td>
					<td><?php echo $p->nama_kelas ?></td>
                   	<td><?php echo $p->nama_pelajaran ?></td>
                    <td><?php echo $p->jam_pelajaran  ?></td>
                    <td><?php echo $p->modul_pembahasan?></td>
					<td><?php echo $p->nama_keterangan  ?></td>
					<td>
						<?php if ($p->foto == '' || $p->foto==null) { ?>  
						<?php echo "-";?>

						 <?php } else { ?>
						 	<a href="<?php echo base_url('foto/presensi/'.$p->foto);?>" target="_blank">Lihat disini</a>

						<?php } ?>

						
					</td>
						
						

	
					<td>
			 		 	<a href="<?php echo site_url('wali_kelas/edit_presensi12/'.$p->id_presensi); ?>" class="btn btn-sm btn-info">Edit</a>
				
				</td>
					
					
				</tr>
			<?php } 
			
			 ?>
		

			</table>
		</tbody>
</form>

</div>
</div>
</div>
</div>
</div>