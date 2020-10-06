
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nim</th>
                      <th>Nama Mahasiswa</th>
                      <th>option</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php 
                    $no =1;
                    foreach($db->tampil_data_mahasiswa() as $x){
                  ?>
                    <tr>
                      <td><?= $x['nim'];?></td>
                      <td><?= $x['nama']; ?></td>
                      <td>
                      <a href="#" class="badge badge-primary" data-toggle="modal" data-target="#ambilSks<?= $x['nim'];?>">Pilih SKS</a> 
                      <a href="#" class="badge badge-secondary" data-toggle="modal" data-target="#mataKuliah<?= $x['nim'];?>">Mata Kuliah</a> 
                      <a href="#" class="badge badge-success" data-toggle="modal" data-target="#nilaiSks<?= $x['nim'];?>">Penilaian</a> 
                      <a href="#" class="badge badge-warning" data-toggle="modal" data-target="#addEditModal<?= $x['nim'];?>">Edit</a> 
                      <a href="#" data-toggle="modal" data-target="#hapusModal<?= $x['nim'];?>" class="badge badge-danger">Hapus</a> 
                      </td>
                    </tr>
                     <!-- edit mahasiswa Modal-->

                    <div class="modal fade" id="mataKuliah<?= $x['nim'];?>" tabindex="-1" role="dialog" aria-labelledby="addMahasiswaModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="addEditModal"><?= $id= $x['nama'];?> , mengambil mata kuliah</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <?php 
                                        $id= $x['nim'];
                                        foreach($db->tampil_data_sks_mahasiswa($id) as $z){
                                            if($z['nama_matakuliah']):
                                     ?>
                                        <span><?= $z['nama_matakuliah']; ?></span><br>
                                    <?php 
                                            else:
                                    ?>
                                        <span>Data Mata Kuliah tidak ada , Segera ambil :)</span>
                                    <?php 
                                            endif;
                                        }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- edit Mahasiswa Modal-->
                    <!-- edit mahasiswa Modal-->

                    <div class="modal fade" id="addEditModal<?= $x['nim'];?>" tabindex="-1" role="dialog" aria-labelledby="addMahasiswaModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="addEditModal">Edit Mahasiswa</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="proses.php?aksi=editmahasiswa" method="POST" enctype="multipart/form-data">
                                        
                                                <input type="hidden" name="nim" class="form-control" id="nim" placeholder="Enter Your NIM" value="<?= $x['nim'];?>" required >
                                            
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name" value="<?= $x['nama'];?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="username" class="form-control" id="username" placeholder="Enter Your Username" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your Password" required>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- edit Mahasiswa Modal-->
                        <!-- nilai mahasiswa Modal-->

                    <div class="modal fade" id="nilaiSks<?= $x['nim'];?>" tabindex="-1" role="dialog" aria-labelledby="addMahasiswaModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="addEditModal">Nilai Mahasiswa <?= $x['nama'];?></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="proses.php?aksi=nilaimahasiswa" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            
                                                <input type="hidden" name="nim" class="form-control" id="nim" placeholder="Enter Your NIM" value="<?= $x['nim'];?>" required >
                                        
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Mata Kuliah</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="matakuliah">
                                            <?php foreach($db->tampil_data_sks_mahasiswa($id) as $d){?>
                                                    <option value=<?= $d['id']?>><?= $d['nama_matakuliah']?></option>
                                            <?php }?>
                                                </select> 
                                            </div>   
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nilai</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nilai" class="form-control" id="nilai" placeholder="Enter Your Nilai"  required>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit" name="submit">Kirim</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add Mahasiswa Modal-->
                        <!-- delete mahasiswa Modal-->
                        <div class="modal fade" id="hapusModal<?= $x['nim']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModalModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="hapusModalModal">Warning</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        Apakah anda ingin menghapus data <?php echo $x['nama']; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="proses.php?nim=<?php echo $x['nim']; ?>&aksi=hapusmahasiswa" class="btn btn-danger">Hapus</a>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add Mahasiswa Modal-->
                        <!-- Add ambil SKS Modal-->
                    <div class="modal fade" id="ambilSks<?= $x['nim'];?>" tabindex="-1" role="dialog" aria-labelledby="addMahasiswaModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="addEditModal">Ambil SKS</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="proses.php?aksi=addsksmahasiswa" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="nim" class="form-control" id="nim" placeholder="Enter Your NIM" value="<?= $x['nim'];?>" required >
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Mata Kuliah</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="matakuliah">
                                            <?php foreach($db->tampil_data_matakuliah() as $x){ ?>
                                                    <option value=<?= $x['id']?>><?= $x['nama_matakuliah']?></option>
                                            <?php }?>
                                                </select> 
                                            </div>   
                                        </div>
                                        <button class="btn btn-primary" type="submit" name="submit">Pilih SKS</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                  <?php  }?>
                  </tbody>
                </table>
              </div>
            </div>
