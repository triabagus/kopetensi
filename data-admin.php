<div class="card" style="width: 18rem;">
    <div class="card-header">
        Profile
    </div>
    <div class="text-center m-5">
    <img class="img-profile rounded-circle" src="assets/img/admin.png" style="width:200px;heigth:200px;">
    </div>
    <div class="card-body">
      <h5 class="card-title"><?= $_SESSION['username'];?></h5>
      <p class="card-text">
        
      </p>
      <p class="card-text"><small class="text-muted">Last minute update in year, <?= date('Y');?></small></p>
    </div>
  </div>