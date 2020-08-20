<!DOCTYPE html>
<html lang="zxx" class="no-js">
<title></title>
  
<head>

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="codepixer">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>ABSENSI SMAN 2 MOJOKERTO</title>

	<!--
			Google Font
			============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500i" rel="stylesheet">

	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css">
	<link rel="stylesheet" href="<?php echo base_url('asset') ?>/css/linearicons.css">
	<link rel="stylesheet" href="<?php echo base_url('asset') ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url('asset') ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url('asset') ?>/css/magnific-popup.css">
	<link rel="stylesheet" href="<?php echo base_url('asset') ?>/css/nice-select.css">
	<link rel="stylesheet" href="<?php echo base_url('asset') ?>/css/animate.min.css">
	<link rel="stylesheet" href="<?php echo base_url('asset') ?>/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url('asset') ?>/css/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" media="all">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.jqueryui.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body>

	<!-- Start Header Area -->
	<header id="header" >
		<div class="container">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<a href="index.html"><img src="<?php echo base_url('asset') ?>/img/sman2.png" alt="" title="" width="70px" /><h4 style="margin-top: -50px;margin-left: 90px;color: aqua">Absensi SMA Negeri 2 Mojokerto</h4></a>
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li class="menu-active"><a href="Loginuser/index"><b style="border: solid 2px #000;background: white; padding: 15px; margin: 0; text-align: justify; line-height: 23px;"  >LOGIN</b></a></li>
					</ul>
				</nav><!-- #nav-menu-container -->
			</div>
		</div>
	</header>
	<!-- End Header Area -->


	<!-- Start Banner Area -->
	<section class="home-banner-area relative">
		<div class="container" >
			<div class="row fullscreen d-flex align-items-center justify-content-center">
				<div class="banner-content col-lg-9 col-md-12" style="margin-top: 120px">
					
					<b><p style="font-size: 22px;margin-top: 70px;color: black">
						Statistik kehadiran siswa tanggal <?php echo  date('d-M-Y'); ?>
					</p></b>
				 <div style="background-color: #E0FFFF	;margin-top: 20px;height: 800px;">
                    <?php $all = $all->total; ?>
				    <div>
				    	<?php 
				    	if ($hadir->totalhadir != 0 || $hadir->totalhadir != '0') {
				    	$h = $hadir->totalhadir;
				    	$percentage = $h / $all * 100;

				    	}else {
				    		$percentage = 0;
				    	}
				    	
				    	?>
				    	
				    	<br>
				        <h6 style="text-align: left;margin-left: 5%;">Hadir (<?php echo $percentage ?>%)</h6>
				        <div class="col-md-5" style="margin-left: 3%">
				
						<div class="w3-light-grey">
						  <div class="w3-container w3-green w3-center" style="width:<?php echo $percentage ?>%">
						  	<?php echo $percentage ?>%
						  </div>
						</div>
						</div>

						<?php
 						if($absen->totalabsen != 0 || $absen->totalabsen != '0') {
				    	$a = $absen->totalabsen;
				    	$percentage_absen = $a / $all * 100;
				        }
					    else{
					    	$percentage_absen = 0;
					    }

				    	?>
				        <h6 style="text-align: left;margin-left: 5%">absen (<?php echo $percentage_absen ?>%)</h6>
				        <div class="col-md-5" style="margin-left: 3%">
				
						<div class="w3-light-grey">
						  <div class="w3-container w3-blue w3-center" style="width:<?php echo $percentage_absen ?>%">
						  <?php echo $percentage_absen ?>%
						  </div>
						</div>
				   	</div>
 						<?php
 						if($sakit->totalsakit != 0 || $sakit->totalsakit != '0') {
				    	$s = $sakit->totalsakit;
				    	$percentage_sakit = $s / $all * 100;
				        }
					    else{
					    	$percentage_sakit = 0;
					    }

				    	?>
				        <h6 style="text-align: left;margin-left: 5%">Sakit (<?php echo $percentage_sakit ?>%)</h6>
				        <div class="col-md-5" style="margin-left: 3%">
				
						<div class="w3-light-grey">
						  <div class="w3-container w3-red w3-center" style="width: <?php echo $percentage_sakit ?>%">
						  <?php echo $percentage_sakit ?>%
						  </div>
						</div>
						</div>

						<?php
 						if($izin->totalizin != 0 || $izin->totalizin != '0') {
				    	$z = $izin->totalizin;
				    	$percentage_izin = $z / $all * 100;
				        }
					    else{
					    	$percentage_izin = 0;
					    }

				    	?>
				        <h6 style="text-align: left;margin-left: 5%">Izin (<?php echo $percentage_izin ?>%)</h6>
				        <div class="col-md-5" style="margin-left: 3%">
				
						<div class="w3-light-grey">
						  <div class="w3-container w3-red w3-center" style="width: <?php echo $percentage_izin ?>%">
						  <?php echo $percentage_izin ?>%
						  </div>
						</div>
						</div>
						<?php
 						if($dispensasi->totaldispensasi != 0 || $dispensasi->totaldispensasi != '0') {
				    	$d = $dispensasi->totaldispensasi;
				    	$percentage_dispensasi = $d / $all * 100;
				        }
					    else{
					    	$percentage_dispensasi = 0;
					    }

				    	?>
				        <h6 style="text-align: left;margin-left: 5%">dispensasi (<?php echo $percentage_dispensasi ?>%)</h6>
				        <div class="col-md-5" style="margin-left: 3%">
				
						<div class="w3-light-grey">
						  <div class="w3-container w3-red w3-center" style="width: <?php echo $percentage_dispensasi ?>%">
						  <?php echo $percentage_dispensasi ?>%
						  </div>
						</div>
						</div>
				    <div style="float:right;margin-top: -280px">
				          <p style="text-align: left;margin-left: -15%;font-size: 15px">Jumlah Siswa Yang Hadir : <?php echo $hadir->totalhadir; ?> siswa</p><br>
				          <p style="text-align: left;margin-left: -15%;font-size: 15px">Jumlah Siswa Yang absen  : <?php echo $absen->totalabsen; ?> siswa</p><br>
				          <p style="text-align: left;margin-left: -15%;font-size: 15px">Jumlah Siswa Yang Sakit &nbsp;: <?php echo $sakit->totalsakit; ?> siswa</p><br>
				          <p style="text-align: left;margin-left: -15%;font-size: 15px">Jumlah Siswa Yang Izin &nbsp;&nbsp; : <?php echo $izin->totalizin; ?> siswa</p><br>
				         
				          <p style="text-align: left;margin-left: -15%;font-size: 15px">Jumlah Siswa Yang dispen : <?php echo $dispensasi->totaldispensasi; ?> siswa</p>
				    </div>

				

				
					<div style="margin-top: 60px">
						<h5>ABSENSI SISWA HARI INI</h5> <br>
						<div style="float: left; margin-left: 20px">
							<?php echo  date('l, d-m-Y'); ?>
						</div>

					<!--  <table id="example" class="table table-striped table-bordered" style="width:80%;margin-left: 50px;padding-right: -50px;position: static;" > -->

		    <div class="col-md-12" style="">  
		    <table id="example" class="display">
		        <thead>
		            <tr>
		                <th>KELAS</th>
		                <th>NAMA</th>
		                <th>KETERANGAN</th>
		            </tr>
		        </thead>
		        <tbody>
		 		<?php
         
            	foreach($siswa as $p) { ?>
				<tr>
					
				
					<td><?php echo $p->nama_siswa  ?></td>
					<td><?php echo $p->nama_kelas ?></td>
       				<td><?php echo $p->nama_keterangan  ?></td>
				</tr>
			<?php } 
			
		?>
			 </tbody>
           </table>
       
      
		    
		    <p style="font-size:11px;float: left;">*Data yang ditampilkan merupakan siswa yang memiliki catatan ketidakhadiran</p>
		</div>


		</div>
		</div>
		</div>		
		</div>
		</div>
						
		</section>

	
	<!-- End Footer Area -->


	<!-- End Footer Area -->

	<!-- ####################### Start Scroll to Top Area ####################### -->
	<div id="back-top">
		<a title="Go to Top" href="#"></a>
	</div>

	<!-- ####################### End Scroll to Top Area ####################### -->

	<section class="home-banner-area static" style="margin-top: -10px">
		<div class="container" >
			<div class="row fullscreen d-flex align-items-center justify-content-center">


	<script src="<?php echo base_url('asset') ?>/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	 crossorigin="anonymous"></script>
	<script src="<?php echo base_url('asset') ?>/js/vendor/bootstrap.min.js"></script>

	<script src="<?php echo base_url('asset') ?>/js/easing.min.js"></script>
	<script src="<?php echo base_url('asset') ?>/js/hoverIntent.js"></script>
	<script src="<?php echo base_url('asset') ?>/js/superfish.min.js"></script>
	<script src="<?php echo base_url('asset') ?>/js/jquery.ajaxchimp.min.js"></script>
	<script src="<?php echo base_url('asset') ?>/js/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo base_url('asset') ?>/js/owl.carousel.min.js"></script>
	<script src="<?php echo base_url('asset') ?>/js/owl-carousel-thumb.min.js"></script>
	<script src="<?php echo base_url('asset') ?>/js/jquery.sticky.js"></script>
	<script src="<?php echo base_url('asset') ?>/js/jquery.nice-select.min.js"></script>
	<script src="<?php echo base_url('asset') ?>/js/parallax.min.js"></script>
	<script src="<?php echo base_url('asset') ?>/js/waypoints.min.js"></script>
	<script src="<?php echo base_url('asset') ?>/js/wow.min.js"></script>
	<script src="<?php echo base_url('asset') ?>/js/jquery.counterup.min.js"></script>
	<script src="<?php echo base_url('asset') ?>/js/mail-script.js"></script>
	<script src="<?php echo base_url('asset') ?>/js/main.js"></script>
 <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
 -->

<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.jqueryui.min.js"></script>
 <script type="text/javascript">
        $(document).ready(function() {
     $('#example').DataTable({
         "Width": 800
    });
         $(".dataTables_wrapper").css("width","100%");
} );
    </script>


	<!-- <script type="text/javascript">
		$(document).ready(function () {
		  $('#dtBasicExample').DataTable({
		    "pagingType": "simple" // "simple" option for 'Previous' and 'Next' buttons only
		  });
		  $('.dataTables_length').addClass('bs-select');
		});

		$(document).ready(function () {
		  $('#dtBasicExample').DataTable();
		  $('.dataTables_length').addClass('bs-select');
		});
</script> -->

<!-- 

<script type="text/javascript">
 $(document).ready(function() {
    $('#example').DataTable();
} );
</script> -->
</div>
</div>
</section>
	<!-- Start Footer Area -->
	<footer class="footer-area section-gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Top Products</h4>
					<ul>
						<li><a href="#">Managed Website</a></li>
						<li><a href="#">Manage Reputation</a></li>
						<li><a href="#">Power Tools</a></li>
						<li><a href="#">Marketing Service</a></li>
					</ul>
				</div>
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Quick Links</h4>
					<ul>
						<li><a href="#">Jobs</a></li>
						<li><a href="#">Brand Assets</a></li>
						<li><a href="#">Investor Relations</a></li>
						<li><a href="#">Terms of Service</a></li>
					</ul>
				</div>
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Features</h4>
					<ul>
						<li><a href="#">Jobs</a></li>
						<li><a href="#">Brand Assets</a></li>
						<li><a href="#">Investor Relations</a></li>
						<li><a href="#">Terms of Service</a></li>
					</ul>
				</div>
				<div class="col-lg-2 col-md-6 single-footer-widget">
					<h4>Resources</h4>
					<ul>
						<li><a href="#">Guides</a></li>
						<li><a href="#">Research</a></li>
						<li><a href="#">Experts</a></li>
						<li><a href="#">Agencies</a></li>
					</ul>
				</div>
				<div class="col-lg-4 col-md-6 single-footer-widget">
					<h4>Newsletter</h4>
					<p>You can trust us. we only send promo offers,</p>
					<div class="form-wrap" id="mc_embed_signup">
						<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
						 method="get" class="form-inline">
							<input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
							 required="" type="email">
							<button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
							<div style="position: absolute; left: -5000px;">
								<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
							</div>

							<div class="info"></div>
						</form>
					</div>
				</div>
			</div>
			<div class="footer-bottom row align-items-center">
				<p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				<div class="col-lg-4 col-md-12 footer-social">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-dribbble"></i></a>
					<a href="#"><i class="fa fa-behance"></i></a>
				</div>
			</div>
		</div>
	</footer>

</body>

</html>