
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $judul; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>public/Login_v8/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/Login_v8/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/Login_v8/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/Login_v8/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/Login_v8/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/Login_v8/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/Login_v8/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/Login_v8/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/Login_v8/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/Login_v8/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="<?php echo base_url("register/tambah"); ?> "method = "post" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
					<span class="login100-form-title">
						REGISTRASI AKUN
					</span>
					<?= $this->session->flashdata('message'); ?>

					<div class="wrap-input100">
						<input class="input100" type="text" name="username" placeholder="Username" value="<?php echo set_value('username'); ?>">
						<?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?> <br>	

					</div>

					<div class="wrap-input100">
						<input class="input100" type="password" name="password" placeholder="password" >
						<?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?> <br>	

					</div>
	

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							submit
						</button>
					</div>

					<div class="flex-col-c p-t-170 p-b-40">
			
				</form>
				<a href="<?php echo base_url(); ?>loginbaru">Kembali ke halaman Sebelumnya</a>
			</div>
		</div>
	</div>
		<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>public/Login_v8/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>public/Login_v8/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>public/Login_v8/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>public/Login_v8/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>public/Login_v8/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>public/Login_v8/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>public/Login_v8/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>public/Login_v8/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>public/Login_v8/js/main.js"></script>

</body>
</html>