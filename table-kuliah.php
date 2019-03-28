
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Mata Kuliah</th>
                      <th>Jumlah SKS</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php 
                    $no =1;
                    foreach($db->tampil_data_matakuliah() as $x){
                  ?>
                    <tr>
                      <td><?= $no ++;?></td>
                      <td><?= $x['nama_matakuliah']; ?></td>
                      <td><?= $x['jumlah_sks']; ?></td>
                      <td>
                      <a href="#" class="badge badge-warning" data-toggle="modal" data-target="#addEditModal<?= $x['id'];?>">Edit</a> 
                      <a href="#" data-toggle="modal" data-target="#hapusModal<?= $x['id'];?>" class="badge badge-danger">Hapus</a> 
                      </td>
                    </tr>
                     
                    <!-- edit mahasiswa Modal-->

                    <div class="modal fade" id="addEditModal<?= $x['id'];?>" tabindex="-1" role="dialog" aria-labelledby="addMahasiswaModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="addEditModal">Edit Mata Kuliah</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="proses.php?aksi=editmatakuliah" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Mata Kuliah</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="id" class="form-control" id="name" placeholder="Nama Mata Kuliah" required value="<?= $x['id']?>">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Nama Mata Kuliah" required value="<?= $x['nama_matakuliah']?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jumlah SKS</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="sks" class="form-control" id="sks" placeholder=" Jumlah SKS" required value="<?= $x['jumlah_sks']?>">
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
                      
                        <!-- delete mahasiswa Modal-->
                        <div class="modal fade" id="hapusModal<?= $x['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModalModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="hapusModalModal">Warning</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        Apakah anda ingin menghapus mata kuliah , <?php echo $x['nama_matakuliah']; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="proses.php?id=<?php echo $x['id']; ?>&aksi=hapusmatakuliah" class="btn btn-danger">Hapus</a>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add Mahasiswa Modal-->     
                  <?php  }?>
                  </tbody>
                </table>
              </div>
            </div>
