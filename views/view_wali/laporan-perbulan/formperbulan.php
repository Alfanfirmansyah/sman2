          <div class="x_panel">
      <div class="container">

      <h2 style="color: #218c74 " align="center"> LAPORAN PRESENSI PERBULAN SISWA KELAS <?php echo $kelas; ?></h2> 
        <hr>
         <br><br>
               
                  <?= $this->session->flashdata('messagecetak'); ?>

 <form action="<?php echo base_url(); ?>Wali_kelas/laporan_perbulan" method ="post"  class="form-horizontal form-label-left" enctype="multipart/form-data" >   
    
<table>
  <tr>
    <td><h2 style="color: #218c74 " id="tgl"><b>Pilih Bulan</b></h2></td>
    <td><h2 style="color: #218c74 " id="tgl"><b> : <select class="btn btn-default dropdown-toggle" required name="bulan">
                         
                            <option value="" selected disabled>Pilih Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                            
                       
                          </select></b></h2></td>
  </tr>
  

 </table>

  <h5><input type="checkbox" name="checkedAll" id="checkedAll"> CHEKLIST SEMUA </h5>
<table id="datatable" class="table table-striped table-bordered">
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