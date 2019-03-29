<?php
session_start();
include_once 'function.php';
    $user = new sign(); $id = $_SESSION['id'];
    if (!$user->get_session()){
    header("location:index.php");
    }
    if (isset($_GET['keluar'])){
    $user->user_logout();
    header("location:index.php");
    }
?>
<?php
    $db = new database();
?>
<?php include "auth/auth_header.php";?>

<!-- Page Wrapper -->
  <div id="wrapper">

  <?php include "auth/auth_sidebar.php";?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include "auth/auth_topbar.php";?>
<?php 
  if($_SESSION['roles'] == 0){
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Dashboard <?= $_SESSION['id']; ?></h1>
                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get">
                    <div class="input-group">
                    <input type="text" name="id" class="form-control border-0 small" placeholder="Search NIM mahasiswa ..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                    </div>
                </form>
                <!-- Topbar Search -->
          <?php include "table.php";?>
<?php }else{?>
<!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Nilai Mahasiswa</h1>
                <!-- Topbar Search -->
          <?php include "table-nilai.php";?>
<?php }?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    <!-- Add Mahasiswa Modal-->
    <div class="modal fade" id="addMahasiswaModal" tabindex="-1" role="dialog" aria-labelledby="addMahasiswaModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                <h5 class="modal-title" id="addMahasiswaModal">Tambah Mahasiswa</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="proses.php?aksi=tambahmahasiswa" method="POST" enctype="multipart/form-data">
                   
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name" required>
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
                    <button class="btn btn-primary" type="submit" name="submit">Tambah</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Mahasiswa Modal-->
    <!-- Add SKS Modal-->
    <div class="modal fade" id="addSksModal" tabindex="-1" role="dialog" aria-labelledby="addMahasiswaModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                <h5 class="modal-title" id="addSksModal">Tambah SKS</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="proses.php?aksi=tambahsks" method="POST" enctype="multipart/form-data">
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mata Kuliah</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nama Mata Kuliah" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jumlah SKS</label>
                        <div class="col-sm-10">
                            <input type="text" name="sks" class="form-control" id="sks" placeholder=" Jumlah SKS" required>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit">Tambah</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Mahasiswa Modal-->
<?php
  include "auth/auth_footer.php";
?>