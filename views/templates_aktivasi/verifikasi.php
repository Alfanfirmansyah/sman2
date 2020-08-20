 <!DOCTYPE html>
<html lang="en">
<head>
	<title> <?php echo  $judul; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href=" <?php echo base_url('public')?>/Login_v8/images/icons/favicon.ico">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url('public')?>/Login_v8/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url('public')?>/Login_v8/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url('public')?>/Login_v8/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url('public')?>/Login_v8/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url('public')?>/Login_v8/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url('public')?>/Login_v8/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url('public')?>/Login_v8/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url('public')?>/Login_v8/css/util.css">
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url('public')?>/Login_v8/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">


				<form action="<?php echo base_url('aktivasi_user/aktiv_val') ?>" method="post" class="login100-form validate-form p-l-55 p-r-55 p-t-178">  
					<span class="login100-form-title">
						AKTIVASI AKUN
					</span>
					<?= $this->session->flashdata('message'); ?>
						<div class="wrap-input100 ">
		   				
		    				<input class="input100"  type="text" class="form-control" id="exampleInputnisn" aria-describedby="emailHelp" placeholder="Masukkan nip" name="nip" value="<?php echo set_value('nip'); ?>">
		   					<?php echo form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?> <br>	
		 			 </div>
		 			 <input type="hidden" name="id" value="<?php echo $id ?>">
					<div class="wrap-input100 ">
		   				 
		    				<input class="input100" type="date" class="form-control" id="exampleInputtgl_lahir" aria-describedby="emailHelp"  name="tgl_lahir" value="<?php echo set_value('tgl_lahir'); ?>">
		   					<?php echo form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?> <br>	
		 			 </div>



					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							SUBMIT
						</button>
					</div><br>
			
				</form>
				<a href="<?php echo base_url(); ?>loginbaru"><b style="color: green">  &nbsp; <- Kembali ke Halaman Sebelumnya</b></a><br><br>
			</div>
		</div>
	</div>
	
	