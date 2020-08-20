                <div class="x_panel">
			<div class="container">

		<h2 style="color: #218c74 " align="center"> DAFTAR PRESENSI SISWA TAHUN AJARAN <?php echo $this->session->userdata('tahun_ajaran'); ?></h2><br>
		<hr>
		 <br><br>
		
     		
	<form>
		 <table>
                <tr>
                    <label style="margin-left:1%" for="filter">Filter Bulan</label>
                    <th class="filterhead"></th>
                   
                </tr>
            </table><br>

		<table id="exampledr" class="table table-striped table-bordered">
			<thead>

			<tr align="center"> 
				<td class="none">BULAN</td>
				<td>NO</td>
				<td>TANGGAL</td>
				<td>NAMA SISWA</td>
				<td>KELAS</td>
         		<td>JADWAL PELAJARAN</td>
         		<td>JAM PELAJARAN</td>
         		<td>MODUL PEMBAHASAN</td>
         		<td>KETERANGAN</td>
         		<td>LAMPIRAN</td>
         
			</tr>
			</thead>
			<tbody>

            <?php
            $no = 1; 
            foreach($presensi as $p) { ?>
				<tr>
					<td class="none"><?php $date=date_create($p->tgl);
echo date_format($date,"F");
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