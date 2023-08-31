<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/a42162768d.js" crossorigin="anonymous"></script> 

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    
    <title>FileShare</title>


</head>
<body>

<?php
    include "navbar.php"
?>

<div class="container mainclass">
<div class="row subclass">
      <div class="col-lg forms">
      <div class="form signup">
                <h5 style="text-align:center">Registration</h3>

                <form action="03_dbsignup.php" method="post">

                <?php if(isset($_GET['error'])){ ?>
                    <div class="error-msg">
                    <p><i class="fa-solid fa-circle-exclamation"></i> <?php echo $_GET['error']; ?></p>
                    </div>
                <?php } ?>

                <?php if(isset($_GET['success'])){ ?>
                    <div class="success-msg">
                    <p><i class="fa-solid fa-circle-check"></i> <?php echo $_GET['success']; ?></p>
                    </div>
                <?php } ?>

                    <div class="field">
                        <div class="input-field">
                            <input type="text" name="empname" placeholder="Enter your name" 
                            value="<?php echo (isset($_GET['empname']))?$_GET['empname']:"" ?>">
                            <i class="uil uil-user"></i>                       
                        </div>
                    </div>

                    <div class="field">
                        <div class="input-field">
                            <input type="text" placeholder="Enter your Employee ID"  name="empid" 
                            value="<?php echo (isset($_GET['empid']))?$_GET['empid']:"" ?>">
                            <i class="uil uil-envelope icon"></i>
                        </div>
                    </div>

                    <div class="field">
                    <div class="input-field">
                        <input type="password"  name="password" placeholder="Create a password" 
                        value="<?php echo (isset($_GET['password']))?$_GET['password']:"" ?>">
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash show-hide"></i>
                    </div>

                    <span class="error">
                        <p class="error-text">Minimum 8 characters with atleast one Capital letter, Small letter, Number and Special Symbol.</p>
                    </span>
                </div>

                    <div class="field">
                    <div class="input-field">
                        <input type="password" name="cpassword" placeholder="Confirm a password" 
                        value="<?php echo (isset($_GET['cpassword']))?$_GET['cpassword']:"" ?>">
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash show-hide"></i>
                    </div>

                    <span class="error">
                        <p class="error-text">Same as Password</p>
                    </span>
                </div>
                    
                    
                    <div class="input-field button">
                        <input type="submit" name="submit" value="Signup"> 
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="02_login.php" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
        
      </div>

    </div>
    </div>


<script src="userlogin-reg.js"></script>
</body>
</html>