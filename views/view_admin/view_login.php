<!DOCTYPE html>
<html>
<head>
	<title>Login </title>
</head>
<body >
<table align="center">

		<center>	<h3>Login</h3>
	<tr>
	<td>
		<?= form_open('loginbaru/login_val'); ?>

			<label for="username" >Username</label>
			
			<?= form_input('username'); ?>  
	</td>


	</tr>	
	<tr>
	<td>


		<label for="password" >Password</label>
		&nbsp;&nbsp;<?= form_input('password'); ?>
		<br><br>

		<center><?=form_submit('submit', 'Login'); ?> </center>

		
	
		</td>
	</tr>
</table>


</body>
</html>
		

