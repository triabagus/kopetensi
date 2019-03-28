<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
  <div class="sidebar-brand-icon">
    <i class="fas fa-user-graduate"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Data</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="dashboard.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-database"></i>
    <span>Master Data</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Mahasiswa:</h6>
      <a class="collapse-item" href="data-mahasiswa.php" >Daftar Mahasiswa</a>
      <a class="collapse-item" href="#" data-toggle="modal" data-target="#addMahasiswaModal">Tambah Mahasiwa</a>
      <h6 class="collapse-header">Mata Kuliah:</h6>
      <a class="collapse-item" href="data-matakuliah.php" >Daftar Mata Kuliah</a>
      <a class="collapse-item" href="#" data-toggle="modal" data-target="#addSksModal">Tambah Mata Kuliah</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
    <i class="fas fa-fw fa-sign-out-alt"></i>
    <span>Logout</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
