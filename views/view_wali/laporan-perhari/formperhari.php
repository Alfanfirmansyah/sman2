	        <div class="x_panel">
			<div class="container">

		 	<h2 style="color: #218c74 " align="center"> LAPORAN PRESENSI PERHARI SISWA KELAS <?php echo $kelas; ?></h2> 
		    <hr>
		     <br><br>
		           
                 
		<?= $this->session->flashdata('messagecetak'); ?>

 <form action="<?php echo base_url(); ?>Wali_kelas/laporan_perhari" method ="post"  class="form-horizontal form-label-left" enctype="multipart/form-data" >		
		
<table>
 	<tr>
 		<td>
 		  <label class="control-label col-md-6 col-sm-3 col-xs-12" for="tgl" style="color: #218c74">Pilih Tanggal Cetak <span class="required">*</span>
                  </label>

                  <div class="col-md-3 col-sm-6 col-xs-12">

                    
                     <input type="text" name="datefilter" autocomplete="off" value="" required placeholder="Choose Date Report"/> <br>  
                                    
                  </div>
        </td>

               <input type="hidden" id="dateawal" value="" name="tgl_awal" placeholder="Date awal"/>
               <input type="hidden" id="dateakhir" value="" name="tgl_akhir" placeholder="Date awal"/>

 	</tr>
 	

 </table>

	<h5><input type="checkbox" name="checkedAll" id="checkedAll"> CHEKLIST SEMUA </h5>
		<table class="table table-striped table-bordered">
			<thead>
			<tr align="center">
				<td rowspan="2"  style="width:3%">NO</td>
				<td rowspan="2"  style="width:5%">NIPD</td>
				<td rowspan="2"  style="width:6%">NAMA SISWA</td>
				<td rowspan="2"  style="width:2%">JK</td>
			
				
				<td rowspan="2"  style="width:2%">CHEKLIST</td>
			</tr>
			</thead>

			<tbody>

			<?php 
				$no = 1;
				foreach ($siswa as $sw){
			 ?>
			 <tr align="center">
			 	
				<td ><?php echo $no++ ?></td>
				<td><?php echo $sw->nipd ?></td>
			 	<td><?php echo $sw->nama_siswa ?></td>
			 	<td><?php echo $sw->jk ?></td>
			 	<td><input type="checkbox" class="checkSingle" name="id[]" value="<?php echo $sw->id_siswa ?>"></td>
			 	
			 </tr>

			<?php } ?>
			</tbody>
		</table>
<hr>
		
                      <div class="form-group">
                    
                        <button id="send" type="submit" class="btn btn-success"><i class="fa fa-print"></i> Cetak Laporan</button>
                  
                          
                     
                      </div>
</form>

</div>
</div>