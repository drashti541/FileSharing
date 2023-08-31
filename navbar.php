<?php 
include "_dbconnect.php";
?>

<div class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="">FileShare</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <?php
if (isset($_SESSION['empname'])) {
    $empname = $_SESSION['empname'];
 ?>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="04_home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="05_fileshare.php">Shared File</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="05_filereceive.php">Received File</a>
        </li>
      </ul>

      
        <a class="nav-link" aria-current="page" style="color:white;margin-right:1%">Welcome, <?=ucfirst($_SESSION['empname'])?></a>
        <a href="00_logout.php"><button type="button" class="btn btn-secondary">Logout</button></a>

<?php
  }else{ ?>
    <a class="nav-link" aria-current="page" href="02_login.php" style="color:white" >Login</a>
    <a class="nav-link" aria-current="page" href="03_signup.php" style="color:white">SignUp</a>
 <?php }
?>
    </div>
  </div>
</nav>
</div>