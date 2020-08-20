 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  <thead>
      <tr align="center" style="color: black" >
        <td>NIPDN</td>
        <td>NAMA SISWA</td>
        <td>KETERANGAN</td>
        <td>SEND WHATSAPP ORTU</td>
        <td>TERKIRIM</td>  

      </tr>
</thead>
<tbody>
 <?php foreach($siswa as $row) { ?>
     <tr align="center" >
       <td><?php echo $row->nipd?></td>
       <td><?php echo $row->nama_siswa?></td>
       <td><?php echo $row->nama_keterangan?></td> 
       <td>
          <form action="<?php echo base_url(); ?>wali_kelas/wa_message" method="post"  class="form-horizontal form-label-left" >
            <input type="hidden" name="message" value="Yth.Bpk/Ibu orang tua dari '<?php echo $row->nama_siswa?>' Diberitahukan bahwa hari ini anak anda tidak masuk sekolah dengan keterangan '<?php echo $row->nama_keterangan?>'. Demikian pemberitahuan kami, Terima kasih. ---- <?php echo 'Ketik NIPD siswa untuk info lebih lanjut' ?> ----">
            <input type="hidden" name="id_presensi" value="<?php echo $row->id_presensi?>">
             <input type="hidden" name="no_hp_ortu" value="<?php echo $row->no_hp_ortu?>">
             <input type="hidden" name="nipd" value="<?php echo $row->nipd?>">
            <button type="submit" class="btn btn-success" onclick="return confirm('Klik Ok untuk Kirim Pesan')">Send</button>
          </form>
       </td>
        <?php if ($row->jam_terkirim == "" || $row->jam_terkirim == null) { ?>  
          <td>-</td>
        <?php } else { ?> 
        <td><i class="fa fa-clock"></i> <?php echo $row->jam_terkirim?><b> WIB</b></td>
        <?php } ?> 
     </tr>
 <?php } ?>
 </tbody>
    </table>