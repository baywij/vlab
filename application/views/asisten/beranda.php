 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <!-- <h1>
            Jadwal Jaga Asisten
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> Beranda</li>
          </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
      <div class="row">
          <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#Senin" data-toggle="tab">Senin</a></li>
                  <li><a href="#Selasa" data-toggle="tab">Selasa</a></li>
                  <li><a href="#Rabu" data-toggle="tab">Rabu</a></li>
                  <li><a href="#Kamis" data-toggle="tab">Kamis</a></li>
                  <li><a href="#Jumat" data-toggle="tab">Jumat</a></li>
                  <li><a href="#Sabtu" data-toggle="tab">Sabtu</a></li>
                  <li><a href="#Minggu" data-toggle="tab">Minggu</a></li>
                </ul>
                <div class="tab-content">
        <?php 
          $hari="";
          $aktif="";
          for($l=1;$l<=7;$l++){
            switch($l){
              case 1:$hari="Senin";$aktif="active";break;
              case 2:$hari="Selasa";$aktif="";break;
              case 3:$hari="Rabu";$aktif="";break;
              case 4:$hari="Kamis";$aktif="";break;
              case 5:$hari="Jumat";$aktif="";break;
              case 6:$hari="Sabtu";$aktif="";break;
              case 7:$hari="Minggu";$aktif="";break;
            }
        ?>
                  <div class="tab-pane <?php echo $aktif; ?>" id="<?php echo $hari; ?>">
                    <h4 class="page-header">Jadwal Jaga <?php echo $hari; ?></h4>
                    <table class="table table-striped">
                    <tr>
            <th>#</th>
                      <th>Shift 1</th>
                      <th>Shift 2</th>
                      <th>Shift 3</th>
                      <th>Shift 4</th>
                      <th>Shift 5</th>
                    </tr>
                    <?php
            $tugas="";
            for($i=1;$i<=10;$i++){
              switch($i){
                case 1:$tugas="KP";break;
                case 2:$tugas="TO";break;
                case 3:$tugas="Arsip";break;
                case 4:$tugas="Asbar 1";break;
                case 5:$tugas="Asbar 2";break;
                case 6:$tugas="Asbar 3";break;
                case 7:$tugas="Asbar 4";break;
                case 8:$tugas="Asbar 5";break;
                case 9:$tugas="Asbar 6";break;
                case 10:$tugas="Asbar 7";break;
              }
             
              echo "<tr>";
              echo "<td>$tugas</td>";
              $jadwaljaga = $this->db->query("SELECT nama_asisten from tbjadwal where tugas='$tugas' and hari='$hari'");
              foreach($jadwaljaga->result() as $row){
                echo "<td>".$row->nama_asisten."</td>";
              }
              echo "</tr>";
            }
          ?>
                  </table>
                  </div><!-- /.tab-pane -->
          <?php } ?>
                  
                </div><!-- /.tab-content -->
              </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->
      </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->