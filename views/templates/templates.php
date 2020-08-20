<?php 
  $row =$this->db->query("select * from profil_sekolah ")->row();
  $nama_sekolah = $row->nama_sekolah;
  $foto = $row->foto; 
                
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../public/images/favicon.ico" type="image/ico" />

    <title> ini aplikasi sman2 </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('public') ?>/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('public') ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('public') ?>/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url('public') ?>/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="<?php echo base_url('public') ?>/sweetalert/dist/sweetalert.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url('public') ?>/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url('public') ?>/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url('public') ?>/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- bootstrap-datetimepicker -->
    <link href="<?php echo base_url('public') ?>/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('public') ?>/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="<?php echo base_url('public') ?>/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('public') ?>/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('public') ?>/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('public') ?>/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('public') ?>/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

  </head>


<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;" >
              <a class="site_title" href=" <?php echo base_url(); ?>admin/index">

             
                  <i class="fas fa-school"></i>
                  
                </i> <span> <?php echo $nama_sekolah; ?>  </span>

              </a>
            </div>
                        <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic" >

                <center><img src="<?php echo base_url(); ?>public/images/<?php echo $foto ?> " alt="..."  width=95% > </center> <br><br>
              </div>
              <div class="profile_info" style="margin-top: -20px">
                <font size="3px" color="white" style="font-family: calibri ">Nama akun user : </font>
                <font size="2px" color="white" style="font-family: calibri "><?php echo $this->session->userdata('username')  ?> </font><br>

                <font size="3px" color="white" style="font-family: calibri ">Tahun Ajaran : </font>
                 <font size="2px" color="white" style="font-family: calibri "><?php echo $this->session->userdata('tahun_ajaran')  ?>  </font>
              
              </div>
            </div>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url(); ?>admin/index"><i class="fa fa-home"></i> Beranda </span></a>
                  </li>
                  <li><a href="<?php echo base_url(); ?>admin/edit_profil"><i class="fa fa-home"></i> Profil Sekolah </span></a>
                  </li>


                  <li><a> <i class="fas fa-user"></i> &nbsp;&nbsp;  User Management<span class="fa fa-chevron-down"> </span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>admin/daftar_user"> Daftar User </a></li>
                    </ul>
                    
                  </li>
                <!--  -->
                 <li><a> <i class="fas fa-calendar-alt"></i></i> &nbsp;&nbsp;  Tahun Ajaran<span class="fa fa-chevron-down"> </span></a>
                                    <ul class="nav child_menu">
                                      <li><a href="<?php echo base_url(); ?>admin/daftar_tahunajaran"> Tahun Ajaran Sekolah </a></li>
                                    </ul>
                                    
                                  </li>
                <!--  -->

                   <li><a><i class="fas fa-chalkboard-teacher"></i>&nbsp;&nbsp;  &nbsp; Data Guru Pengajar<span class="fa fa-chevron-down"></span></a>
            
                  
                      <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>admin/daftar_guru"> Daftar Guru Pengajar</a></li>
                    
                      </ul>
              
                  </li>
                

                  <li><a><i class="fas fa-graduation-cap"></i>&nbsp;&nbsp;  &nbsp;&nbsp;   Data Siswa <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      
                      <li><a href="<?php echo base_url(); ?>admin/daftar_siswa"> Daftar Data Siswa </a></li>
                     
                      
                    </ul>
                  </li>

                  <!--  -->
                 <li><a> <i class="fas fa-users"></i> &nbsp;&nbsp;  Kelas <span class="fa fa-chevron-down"> </span></a>
                     <ul class="nav child_menu">
                        <li><a href="<?php echo base_url(); ?>admin/daftar_kelas"> Daftar Kelas </a></li>
                     </ul>
                     
                </li>
                <!--  -->


                 <li><a> <i class="fas fa-users"></i> &nbsp;&nbsp; Rombongan Belajar <span class="fa fa-chevron-down"> </span></a>
                                    <ul class="nav child_menu">
                                      <li><a href="<?php echo base_url(); ?>admin/daftar_rombel"> Daftar Kelas Siswa </a></li>
                                    </ul>
                                    
                                  </li>
                <!--  -->
        
               


                  <li><a><i class="fa fa-table"></i>&nbsp;&nbsp;   Jadwal Pelajaran <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      <li><a href="<?php echo base_url(); ?>admin/daftar_jadwal12">Daftar Jadwal Pelajaran kelas</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i>&nbsp;&nbsp;    Data Presensi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     
                    
                      <li><a href="<?php echo base_url();?>admin/lihat_presensi12 ">Data Presensi</a></li>
                        <li><a href="<?php echo base_url(); ?>admin/daftar_siswa"> Daftar Data Siswa </a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
           
            <!-- /menu footer buttons -->
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


                  <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge bg-green"><?php echo $count_pemberitahuan; ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <?php 

                  $no = 1;
                  foreach($pemberitahuan as $row) {

                  ?>
                    <li>
                      <a href="<?php echo site_url('admin/update_notif/'.$row->id_history_guru) ?>">
                        <span class="image"><img src="<?php echo base_url('public') ?>/images/sman2.png" alt="Profile Image" /></span>
                        <span>

                          <span><?php echo $row->nama_guru ?></span>
                          <span class="time"><?php echo $row->tgl ?></span>
                        </span>
                        <span class="message"> Saat Mata Pelajaran :
                          <?php echo $row->nama_pelajaran; ?>
                        </span>
                         <span class="message" style="margin-left: 15%"> Keterangan Guru :
                          <?php echo $row->keterangan_guru; ?>
                        </span>
                      </a>
                    </li>
                    <?php } ?>
                  
                    <li>
                      <div class="text-center">
                        <a href="<?php echo site_url('admin/detail_pemberitahuan') ?>">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
                
              </ul>
              

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <div class="right_col" role="main">
         
          <?php $this->load->view($content); ?>
           <?= $this->session->flashdata('message'); ?>

        </div>

        <!-- page content -->
        
        <!-- /page content -->
      </div>
    </div>
        <!-- footer content -->
          <footer id="footer" class="footer">
            <div class="container text-center">

              <font  style=" color: green">
                © 2017 SMAN 2 Mojokerto <br>
               The first RSBI in Mojokerto
              </font>
              <div class="credits">   
              </div>
            </div>
          </footer>
        <!-- /footer content -->
      </div>
    </div>

      
         
     


        <!-- top navigation -->
       

         <!-- /top navigation -->

        <!-- page content -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
    <!-- jQuery -->
 
    <!-- Bootstrap -->
    <script src="<?php echo base_url('public') ?>/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('public') ?>/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('public') ?>/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url('public') ?>/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url('public') ?>/gauge.js/dist/gauge.min.js"></script>
    <script src="<?php echo base_url('public') ?>/sweetalert/dist/sweetalert.min.js"></script>
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
    <!-- bootstrap-datetimepicker -->    
    <script src="<?php echo base_url('public') ?>/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('public') ?>/js/custom.min.js"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

     <!--Footer-->

    <script type="text/javascript">
      $(document).ready(function() {
       $('.js-example-basic-single').select2();
        });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
        $('#jadwal').change(function(){
        
          var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>admin/get_jadwalpresensi",
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
  function bacaGambar(input) {
   if (input.files && input.files[0]) {
      var reader = new FileReader();
 
      reader.onload = function (e) {
          $('#gambar_nodin').attr('src', e.target.result);
      }
 
      reader.readAsDataURL(input.files[0]);
   }
}
$("#preview_gambar").change(function(){
   bacaGambar(this);
});
</script>

<script type="text/javascript">
        
  $('.sa-remove-wt').click(function () {
     var postId = $(this).data('id');
                swal({
                title: "Apakah anda yakin?",
                text: "Data ini akan dihapus",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger waves-effect waves-light',
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
                closeOnConfirm: true,
                closeOnCancel: true
                },
                function(){
                    window.location.href = "hapus_wali/?id="+ postId;
                });
            });

    </script>

     <script type="text/javascript">

      var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = mm + '/' + dd + '/' + yyyy;
 
$(function(){
  $('#container').highcharts({
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false
    },
    title: {
      text: 'Grafik Presensi Hari ini.'
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
      name: 'Persentase Presensi tanggal '+today,
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
        
  $('.sa-remove-user').click(function () {
     var postId = $(this).data('id');
                swal({
                title: "Apakah anda yakin?",
                text: "Data ini akan dihapus",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger waves-effect waves-light',
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
                closeOnConfirm: true,
                closeOnCancel: true
                },
                function(){
                    window.location.href = "hapus_user/?id="+ postId;
                });
            });

    </script>

    <script type="text/javascript">
        
  $('.sa-remove-guru').click(function () {
     var postId = $(this).data('id');
                swal({
                title: "Apakah anda yakin?",
                text: "Data ini akan dihapus",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger waves-effect waves-light',
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
                closeOnConfirm: true,
                closeOnCancel: true
                },
                function(){
                    window.location.href = "hapus_guru/?id="+ postId;
                });
            });

    </script>
    <script type="text/javascript">
        
  $('.sa-remove-siswa').click(function () {
     var postId = $(this).data('id');
                swal({
                title: "Apakah anda yakin?",
                text: "Data ini akan dihapus",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger waves-effect waves-light',
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
                closeOnConfirm: true,
                closeOnCancel: true
                },
                function(){
                    window.location.href = "hapus_siswa/?id="+ postId;
                });
            });

    </script>

    <script type="text/javascript">
        
  $('.sa-remove-jadwal').click(function () {
     var postId = $(this).data('id');
                swal({
                title: "Apakah anda yakin?",
                text: "Data ini akan dihapus",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger waves-effect waves-light',
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
                closeOnConfirm: true,
                closeOnCancel: true
                },
                function(){
                    window.location.href = "hapus_jadwal12/?id="+ postId;
                });
            });

    </script>
    <!--Rentang tahun-->
 <script>
    $('#myDatepicker').datetimepicker();
    
    $('#gg').datetimepicker({
        format: 'DD.MM.YYYY'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
    
    $('#myDatepicker4').datetimepicker({
              format: 'DD/MM/YYYY',
        ignoreReadonly: true,
        allowInputToggle: true,
        maxDate: new Date('2008/12/30'),
        minDate: new Date('2003/01/01'),
    });

    $('#guru').datetimepicker({
              format: 'DD/MM/YYYY',
        ignoreReadonly: true,
        allowInputToggle: true,
        maxDate: new Date('2000/12/30'),
        minDate: new Date('1960/01/01'),
    });


    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>

<script type="text/javascript">
   $(document).ready(function() {
          var table=$('#exampledr').DataTable({
             "order": [[1, "asc" ]],
            initComplete: function () {
            }
       });

          ///ini untuk filter siswa ,jadwal,kelas

       $(".filterhead").each(function (i) {
                 if (i != 15  && i != 16 ) {
                     var select = $('<select class="form-control" style="margin-top:10px"><option value="">All Data</option></select>')
                         .appendTo($(this).empty())
                         .on('change', function () {
                             var term = $(this).val();
                             table.column(i).search(term, false, false).draw();
                         });
                     table.column(i).data().unique().sort().each(function (d, j) {
                         select.append('<option value="' + d + '">' + d + '</option>')
                     });
                 } else {
                    $(this).empty();
                 }
             });
       //ini untuk filter tanggal

  $('#date_selected_search').on( 'change', function () {
 
    var v =$(this).val();  // getting search input value
 
    table.columns(2).search(v).draw();
} );
    } );

</script>

<script type="text/javascript">
   $(document).ready(function() {
          var table=$('#exampledr2').DataTable({
             "order": [[1, "asc" ]],
            initComplete: function () {
            }
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
<script>  
$(document).ready(function(){

  if($("#role").val() == '2' || $("#role").val() == '3') {
$("#siswa").hide();
  $("#guruwali").show();
  }

  else if($("#role").val() == '4'){
$("#siswa").show();
  $("#guruwali").hide();
  }


  else{
    $("#siswa").hide();
  $("#guruwali").hide();
  }

    $('#role').on('change', function() {
      if ( this.value == '4')
      {
        $("#siswa").show();
        $("#guruwali").hide();
      }
      else if (this.value == '2' || this.value == '3')
      {
  
        $("#siswa").hide();
        $("#guruwali").show();
      }else{
          $("#siswa").hide();
          $("#guruwali").hide();
      }

    });
});
</script>

<!--alert input max file keterangan presensi -->
<script type="text/javascript">
  var uploadField = document.getElementById("file");

uploadField.onchange = function() {
    if(this.files[0].size > 307200){
       alert("File foto terlalu besar!");
       this.value = "";
    };
};
</script>

<!--mengambil nama depan sebagai username -->
<script type="text/javascript">
  $('#guru').on('change', function() {
    var skillsSelect = document.getElementById("guru");
    var selectedText = skillsSelect.options[skillsSelect.selectedIndex].text;

    var values = selectedText.split(" ");
    var f_name = values[0].toLowerCase();

    if(values.length == 1){

   document.getElementById("username").value = f_name

    }

    else{
    var l_name = values[1].toLowerCase();
    var l_nametrim = l_name.substring(0, 3);
    document.getElementById("username").value = f_name+l_nametrim

    }

 
    });
</script>

<script type="text/javascript">
  $('#ketua_kelas').on('change', function() {
    var skillsSelect2 = document.getElementById("ketua_kelas");
    var selectedText2 = skillsSelect2.options[skillsSelect2.selectedIndex].text;

   var values = selectedText2.split(" ");
    var f_name = values[0].toLowerCase();

    if(values.length == 1){

   document.getElementById("username").value = f_name

    }

    else{
    var l_name = values[1].toLowerCase();
    var l_nametrim = l_name.substring(0, 3);
    document.getElementById("username").value = f_name+l_nametrim

    }
    });


  </script>
  <script>
var auto_refresh = setInterval(
function()
{
$('#data').load('/sman2app/admin/wa_siswa');
}, 3000);
</script>
  </body>
</html>
       
  