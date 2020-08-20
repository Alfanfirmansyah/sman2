          <div class="x_panel">
      <div class="container">

      <h2 style="color: #218c74 " align="center"> LAPORAN PRESENSI PERSEMESTER SISWA KELAS <?php echo $kelas; ?></h2> 
        <hr>
         <br><br>
               
                  <?= $this->session->flashdata('messagecetak'); ?>

 <form action="<?php echo base_url(); ?>Wali_kelas/laporan_persemester" method ="post"  class="form-horizontal form-label-left" enctype="multipart/form-data" >   
    
<table>
  <tr>
    <td><h2 style="color: #218c74 " id="tgl"><b>Pilih Semester</b></h2></td>
    <td><h2 style="color: #218c74 " id="tgl"><b> : <select class="btn btn-default dropdown-toggle" required name="semester">
                                  <option value="" selected disabled>Pilih Semester</option>
                            <option value="1">Ganjil</option>
                            <option value="2">Genap</option>
                            
                            
                       
                          </select></b></h2></td>
  </tr>
  

 </table>

  <h5><input type="checkbox" name="checkedAll" id="checkedAll"> CHEKLIST SEMUA </h5>
    <table cellspacing="0" cellpadding="2" border="1" style="width:50%;border-collapse:collapse;font-size:85%">
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