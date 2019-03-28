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
<?php include "auth/auth_header.php"; ?>
  <!-- Page Wrapper -->
  <div id="wrapper">

   <?php include "auth/auth_sidebar.php";?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include "auth/auth_topbar.php";?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- 404 Error Text -->
          <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Page Not Found</p>
            <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
            <a href="dashboard.php">&larr; Back to Dashboard</a>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php include "auth/auth_footer.php";?>