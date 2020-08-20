<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../public/images/favicon.ico" type="image/ico" />

    <title> Halaman Siswa Admin </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('public') ?>/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('public') ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('public') ?>/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url('public') ?>/iCheck/skins/flat/green.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url('public') ?>/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url('public') ?>/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url('public') ?>/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('public') ?>/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('public') ?>/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('public') ?>/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('public') ?>/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url('public') ?>/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
   
    
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('public') ?>/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </head>


<body class="nav-md">
    <div class="container body" >
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;" >
              <a class="site_title" href=" <?php echo base_url(); ?>siswa_admin/index">

             
                  <i class="fas fa-school"></i>
                  
                </i> <span>SMAN 2 MJK</span>

              </a>
            </div>


            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic"><br>
              <center><img src="<?php echo base_url(); ?>public/images/sman2.png " alt="..."  width=95% ></center>
              </div>
              <div class="profile_info">
                <font size="3px" color="white" style="font-family: arial ">Nama akun user : </font>
                <font size="3px" color="white" style="font-family: calibri "><?php echo $this->session->userdata('username')  ?></font><br>
              
               
                
              
              </div>
            </div>


             <br />

          </div>
        </div>

         
     


        <!-- top navigation -->

        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                    <li> <a href="<?php echo base_url(); ?>index/logout" onclick="return confirm('Apakah Anda Yakin ?')" class="user-profile "aria-expanded="false">
                    <img src="<?php echo base_url('foto') ?>/logout.png" alt="">
                    
                    <b>LOGOUT</b>
                  </a>
                  </li>
                  <li style="margin-top: 20px"> 
                   <b> <button style="background-color: #218c74"> <font style="color: white; font-size: 15px; font-family: arial; ">
                    Tahun Ajaran :  <?php echo $this->session->userdata('tahun_ajaran'); ?> 
                  <?php echo $this->session->userdata('semester'); ?></b><br>
                  </font>
                  </button>
                </li>

              </ul>
                  
              </ul>
            </nav>
          </div>
        </div>
      
        <div class="right_col" role="main">
          <?= $this->session->flashdata('hehe'); ?>
          <?php $this->load->view($content); ?>
        </div>
        
        <!-- /page content -->
      </div>
    </div>


                  <!--Footer-->
  <footer id="footer" class="footer">
    <div class="container text-center">

      <font  style=" color: white">
        © 2017 SMAN 2 Mojokerto <br>
       The first R-SBI in Mojokerto
      </font>
      <div class="credits">
      
        
      </div>
    </div>
  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
    <!-- jQuery -->
 
    <script src="<?php echo base_url('public') ?>/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('public') ?>/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('public') ?>/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url('public') ?>/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url('public') ?>/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url('public') ?>/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('public') ?>/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url('public') ?>/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url('public') ?>/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url('public') ?>/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url('public') ?>/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url('public') ?>/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url('public') ?>/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url('public') ?>/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url('public') ?>/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url('public') ?>/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url('public') ?>/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url('public') ?>/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo base_url('public') ?>/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url('public') ?>/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('public') ?>/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url('public') ?>/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo base_url('public') ?>/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('public') ?>/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url('public') ?>/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url('public') ?>/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url('public') ?>/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url('public') ?>/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url('public') ?>/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url('public') ?>/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url('public') ?>/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url('public') ?>/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url('public') ?>/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url('public') ?>/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('public') ?>/js/custom.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
        $('#jadwal').change(function(){
        
          var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>siswa_admin/get_jadwalpresensi",
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id_jadwal+'>'+data[i].jam_pelajaran+'</option>';
                    }
                    $('.jam_pelajaran').html(html);
                     
                }
            });
        });
    });
</script>
 <script type="text/javascript">
 
$(function(){
  $('#container').highcharts({
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false
    },
    title: {
      text: 'Data Presensi Hari Ini'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %',
          style: {
            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
          }
        }
      }
    },
    series: [{
      type: 'pie',
      name: 'Persentase Penduduk',
      data: [
          <?php 
          // data yang diambil dari database
          if(count($graph)>0)
          {
             foreach ($graph as $data) {
             echo "['" .$data->nama_keterangan . "'," . $data->jumlah ."],\n";
             }
          }
          ?>
      ]
    }]
  });
});
 
</script>


<script type="text/javascript">
  $(document).ready(function() {
  $("#checkedAll").change(function(){
    if(this.checked){
      $(".checkSingle").each(function(){
        this.checked=true;
      })              
    }else{
      $(".checkSingle").each(function(){
        this.checked=false;
      })              
    }
  });

  $(".checkSingle").click(function () {
    if ($(this).is(":checked")){
      var isAllChecked = 0;
      $(".checkSingle").each(function(){
        if(!this.checked)
           isAllChecked = 1;
      })              
      if(isAllChecked == 0){ $("#checkedAll").prop("checked", true); }     
    }else {
      $("#checkedAll").prop("checked", false);
    }
  });
});
</script>

  
  </body>
</html>