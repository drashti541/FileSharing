<?php 
include "_dbconnect.php";
session_start();
if (isset($_SESSION['empname'])) {
    $empname = $_SESSION['empname'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css.css">  
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
   

    <script src="https://kit.fontawesome.com/a42162768d.js" crossorigin="anonymous"></script> 

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    
    <title>FileShare</title>


</head>
<body>

<?php
    include "navbar.php"
?>

<div class="container-fluid mainclass">
<div class="row subclass">
<div class="form">
      <form action="04_dbhome.php" method="POST" enctype="multipart/form-data">

<?php if(isset($_GET['success'])){ ?>
<div class="success" >
<p><i class="fa-solid fa-circle-check"></i> <?php echo $_GET['success']; ?></p>
</div>
<?php } ?>

<?php if(isset($_GET['error'])){ ?>
<div class="error" >
<p><i class="fa-solid fa-circle-check"></i> <?php echo $_GET['error']; ?></p>
</div>
<?php } ?>

    <h4>Share file with others</h4>

    <div class="tag">
        <input type="text" class="forminput" name="shareempname" placeholder="Employee Name">
    </div>

    <div class="tag">
        <input type="text" class="forminput" name="shareempid" placeholder="Employee ID">
    </div>

    
        <input type="file" class="forminput" name="files[]" multiple>
    

    <div class="tag">
        <button type="submit" name="submit">Share</button>
    </div>

</form>
</div>
</div>
</div>


</body>
</html>
<?php }else {
	header("Location: 02_login.php");
	exit;
} ?>
