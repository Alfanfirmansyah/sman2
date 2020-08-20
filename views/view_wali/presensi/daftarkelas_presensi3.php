   <div class="x_panel">
      <div class="container">

  
   <h2 style="color: #218c74 " align="center"> DAFTAR KELAS </h2>
        <hr>


    <table class="table table-striped table-bordered table-hover table-condensed"  >
      <tr> 
        <td>NO</td>
        <td>NAMA KELAS </td>
        <td>AKSI</td>

        
      </tr>
            <?php
            $no = 1; 
           foreach($rombel as $r) { ?>
        <tr>
          
          <td><?php echo $no++ ?></td>
          <TD><?php echo $r->nama_kelas  ?> </TD>
          <td>
               <?php echo anchor('Wali_kelas/input_presensi12/'.$r->id_kelas.'/'.$r->nama_kelas,'<i class="fas fa-plus-square"></i>'); ?>
              
            </td>
       
         
        

          
        </tr>
   
      <?php } 
    // $no++;
       ?>
    

      </table>
</form>                    
                      <div class="ln_solid"></div>
                      
                    </form>
                  </div>
                </div>
              </div>
            </div>
</div>