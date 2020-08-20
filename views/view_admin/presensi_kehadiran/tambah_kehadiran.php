<div class="right_col" role="main">
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
			<div class="container">

		<h2 style="color: green " align="center"> REKAM KEHADIRAN <?php echo $kelas1 ?></h2>
		<hr>



		<div class="cari" style="float: right;">

		<input type="text"name="cari" placeholder="cari"> <input type="submit"class="btn btn-success" name="submit" value="cari" ><br><br><br>

		</div><br><br>

		<h3 style="color: red">Input Absensi tanggal = <input type="date" name=""></h3><br>

			<form>
		<table class="table table-striped table-bordered table-hover table-condensed" >
			<tr align="center">
				<td>ID</td>
				<td>Nama</td>
				<td>NIPD</td>
				<td>Datang</td>
				<td>Pulang</td>
				<td>Keterangan</td>
				<td>Upload File</td>
			</tr>
			<tr align="center">
				<td>001</td>
				<td>Debby Melisha</td>
				<td>9002</td>
				<td>07.00</td>
				<td>09.00</td>
				<td>
					<input type="radio" name="h">H 
					&nbsp;
					<input type="radio" name="s">S
					&nbsp;
					<input type="radio" name="i">I
					&nbsp;
					<input type="radio" name="D">D
					&nbsp;
					<input type="radio" name="A">A
				</td>
				<td><input type="file" name="file"></td>
			</tr>
			<tr align="center">
				<td>002</td>
				<td>Debby Melisha</td>
				<td>9002</td>
				<td>07.00</td>
				<td>09.00</td>
				<td>
					<input type="radio" name="h">H 
					&nbsp;
					<input type="radio" name="s">S
					&nbsp;
					<input type="radio" name="i">I
					&nbsp;
					<input type="radio" name="D">D
					&nbsp;
					<input type="radio" name="A">A
				</td>
				<td><input type="file" name="file"></td>
			</tr>
		</table>

		<br>
		<div class="ln_solid"></div>
        <div class="form-group">
        <div class="col-md-3 col-md-offset-4">
             <button id="send" type="submit" class="btn btn-success">Submit</button>
             <button type="reset" class="btn btn-primary">Cancel</button>

         </div>
         </div>
	</form>

</div>
</div>
</div>
</div>
</div>