
            <div class="card-body">
            <?php 
            $id = $_SESSION['nim'];
              foreach($db->tampil_mahasiswa($id) as $r){
            ?>
            <p>Nim            : <?= $r['nim']; ?></p>
            <p>Nama Mahasiswa : <?= $r['nama']; ?></p>
            <?php  }?>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Mata Kuliah</th>
                      <th>Nilai Angka</th>
                      <th>Nilai Huruf</th>
                      <th>SKS</th>
                      <th>Nilai Komulatif</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php 
                    $no =1;
                    foreach($db->tampil_data_nilai_mahasiswa($id) as $x){
                  ?>
                    <tr>
                      <td><?= $no ++;?></td>
                      <td><?= $x['nama_matakuliah']; ?></td>
                      <td><?= $x['nilai']; ?></td>
                      <td>
                        <?php 
                          if($x['nilai'] >= 3.6 && $x['nilai'] < 4.0){
                            echo "A";
                          }elseif($x['nilai'] >= 3.0 && $x['nilai'] < 3.6){
                            echo "B";
                          }elseif($x['nilai'] >= 2.0 && $x['nilai'] < 3.0){
                            echo "C";
                          }elseif($x['nilai'] > 0 && $x['nilai'] < 2.0){
                            echo "D";
                          }elseif($x['nilai'] == 0){
                            echo "E";
                          } 
                        ?>
                      </td>
                      <td><?= $x['jumlah_sks']; ?></td>
                      <td><?php 
                            $nilai = $x['nilai']; 
                            $sks   = $x['jumlah_sks'];
                            $nilai_komulatif  = $nilai * $sks;

                            echo $nilai_komulatif;
                          ?>
                      </td>
                    </tr>
                  <?php  }?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-6 mb-5">
              <div class="card">
                  <div class="card-header bg-dark" style="color:#fff;">
                      Nilai Keseluruhan
                  </div>
                  <div class="card-body">
                      <p class="card-text">
                          Jumlah SKS :
                          <?php
                          foreach($db->tampil_jumlah_sks($id) as $x){
                              echo $x['total'];
                          }
                          ?>
                      </p>
                      <p class="card-text">
                          Total Nilai Komulatif :
                          <?php
                          foreach($db->tampil_nilai_komulatif($id) as $x){
                              echo round($x['total']);
                          }
                          ?>
                      </p>
                      <p class="card-text">
                          IPK :
                          <?php
                          foreach($db->tampil_nilai_ipk($id) as $x){
                              echo round($x['total']);
                          }
                          ?>
                      </p>
                  </div>
              </div>
            </div>