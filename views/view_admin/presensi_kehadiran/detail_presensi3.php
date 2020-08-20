
    <div class="x_panel">
		<div class="container">

		<h2 style="color: #218c74" align="center"> DAFTAR PRESENSI SISWA </h2> 
	
		<hr>
		 <br><br>
		 <?= $this->session->flashdata('message2'); ?>
      
		<a href="<?php echo base_url(); ?>admin/daftarkelas_presensi3"> <button type="button" class="btn btn-success btn-lg"  > + INPUTKAN PRESENSI</button> </a>
		 <br><br>
		 <br>

	<form>

		 <table>
                <tr>
                    <label style="margin-left:1%; color:#556B2F;font-style: italic;" for="filter">Filter By Kelas</label>
                    <th class="filterhead "></th>
                     <th class="filterhead" style="display: none" ></th>

                     <label style="margin-left:3%;color:#556B2F;font-style: italic;" for="filter">Filter By Tanggal</label>
                     <th>
                     	<input type="date" class="form-control" id="date_selected_search" style="margin-top:5.5%"></input>
                     </th>
                     <label style="margin-left:3%;color:#556B2F;font-style: italic;" for="filter">Filter By Siswa</label>
                    <th class="filterhead" style="display: none"></th>
                    <th class="filterhead " ></th>
                    <label style="margin-left:3%;color:#556B2F;font-style: italic;" for="filter">Filter By Jadwal</label>
                    <th class="filterhead" style="display: none"></th>
                    <th class="filterhead"></th>
                    
                   
                </tr>
            </table><br>
		<table id="exampledr" class="table table-striped table-bordered">
		<thead>
			<tr> 
				<td class="none">KELAS</td>
				<td>NO</td>
				<td>TANGGAL</td>
				<td>NAMA SISWA</td>
				<td>KELAS</td>
         		<td>JADWAL PELAJARAN</td>
         		<td>JAM PELAJARAN</td>
         		<td>MATERI</td>
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
                    <td><?php echo $p->modul_pembahasan; ?></td>
					<td><?php echo $p->nama_keterangan  ?></td>
					<td>
						<?php if ($p->foto == '' || $p->foto==null) { ?>  
						<?php echo "<p style='text-align:center;'>-</p>";?>

						 <?php } else { ?>
						 	<a href="<?php echo base_url('foto/presensi/'.$p->foto);?>" target="_blank">Lihat disini</a>

						<?php } ?>

						
					</td>
						
						

	
					<td>
			 		<a href="<?php echo site_url('admin/edit_presensi12/'.$p->id_presensi); ?>" class="btn btn-sm btn-info">Edit</a>
				
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

