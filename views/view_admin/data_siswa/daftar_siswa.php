
             <div class="x_panel">
				<div class="container">

		<h2 style="color: #218c74 " align="center"> DATA SISWA SMAN 2 MOJOKERTO</h2>
		<hr>

		<?= $this->session->flashdata('message2'); ?>
      
		<a href="<?php echo base_url(); ?>admin/form_siswa"> <button type="button" class="btn btn-success btn-lg"  > + TAMBAH SISWA</button> </a>  <span>*Untuk menambahkan data siswa secara manual</span>
		 <br><br>  <hr>
		 
    <!--
    -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
    -->
		<form method="post" action="<?php echo base_url("admin/form"); ?>" enctype="multipart/form-data">

			<span>*Untuk menambahkan data siswa dengan import excel</span> <br><br>
		 	<font>1. Download Format Excel  >>> </font><a href="<?php echo base_url("templete_import/siswa.xlsx"); ?>" class="btn btn-primary"> 
		 	Download</a> <br>

		 	
    
    <font> 2. Pilih file terlebih dahulu lalu Upload : </font> <input type="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" ID="fileSelect" runat="server">
    <br><input type="submit" value="Upload" name="preview" class="btn btn-primary">
  </form>

      <form method="post" action="<?php echo base_url("admin/import"); ?>" enctype="multipart/form-data">
    <!-- 
    -- Buat sebuah input type file
    -- class pull-left berfungsi agar file input berada di sebelah kiri
    -->
     <br>
    <font>3. Import Ke Database* >>> </font>
<input type="submit" value="Import" class="btn btn-primary">
</form><br>
<p>
* file yang bisa di import adalah .xls (Excel 2003-2007).</p>


    <!-- 
    -- Buat sebuah input type file
    -- class pull-left berfungsi agar file input berada di sebelah kiri
    -->
    
    
    <!--
    -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
    -->
   
  </form>

      </div>

    </div>
<div class="well">

	

</div>

	<form>
		<table id="datatable" class="table table-striped table-bordered">
			<thead>
			<tr align="center">
				<td>NO</td>
				<td>NAMA SISWA</td>
				<td>NIPD</td>
				<td>JK</td>
				<td>NISN</td>
				<td>TEMPAT LAHIR</td>
				<td>TANGGAL LAHIR</td>
				<TD>AGAMA</TD>
				<td>ALAMAT</td>
				<td>RT</td>
				<td>RW</td>
				<td>DUSUN</td>
				<td>KELURAHAN</td>
				<td>KECAMATAN</td>
				<td>KODE POS</td>
				<td>NO HP ORTU</td>
				<td>AKSI</td>
			</tr>
			</thead>

			<tbody>

			<?php 
				$no = 1;
				foreach ($siswa as $sw){
			 ?>
			 <tr>
			 	<td><?php echo $no++ ?></td>
			 	<td><?php echo $sw->nama_siswa ?></td>
			 	<td><?php echo $sw->nipd ?></td>
			 	<td><?php echo $sw->jk ?></td>
			 	<td><?php echo $sw->nisn ?></td>
			 	<td><?php echo $sw->tempat_lahir ?></td>
			 	<td><?php echo $sw->tgl_lahir ?></td>
			 	<td><?php echo $sw->agama ?></td>
			 	<td><?php echo $sw->alamat ?></td>
			 	<td><?php echo $sw->RT ?></td>
			 	<td><?php echo $sw->RW ?></td>
			 	<td><?php echo $sw->dusun ?></td>
			 	<td><?php echo $sw->kelurahan ?></td>
			 	<td><?php echo $sw->kecamatan ?></td>
				<td><?php echo $sw->kode_pos ?></td>
			 	<td><?php echo $sw->no_hp_ortu; ?></td>
		
			 	<td>
			 	<a href="<?php echo site_url('admin/edit_siswa/'.$sw->id_siswa); ?>" class="btn btn-sm btn-info">Edit</a>
				 <a href="#" data-id="<?php echo $sw->id_siswa ?>" class="sa-remove-siswa btn btn-sm btn-danger">Hapus</a> 
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