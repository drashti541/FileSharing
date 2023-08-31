<?php 
session_start();

if(isset($_POST['empid']) && 
   isset($_POST['password'])){

    include "_dbconnect.php";

    $empid = $_POST['empid'];
    $pass = $_POST['password'];

    $data = "empid=".$empid;
    
    if(empty($empid)){
    	$em = "Employee ID is required";
    	header("Location: 02_login.php?error=$em&$data");
	    exit;
    }else if(empty($pass)){
    	$em = "Password is required";
    	header("Location: 02_login.php?error=$em&$data");
	    exit;
    }else {

    	$sql = "SELECT * FROM employees WHERE empid = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$empid]);

      if($stmt->rowCount() == 1){
          $user = $stmt->fetch();

          $empid1 =  $user['empid'];
          $password =  $user['password'];
          $empname =  $user['empname'];
         //  $id =  $user['empid'];
          if($empid1 === $empid){
             if(password_verify($pass, $password)){
                 $_SESSION['empid'] = $empid;
                 $_SESSION['empname'] = $empname;

                 //header("Location: 04_welcom.php");
                 header("Location: 04_home.php");
                 exit;
             }else {
               $em = "Incorect User name or password";
               header("Location: 02_login.php?error=$em&$data");
               exit;
            }

          }else {
            $em = "Incorect User name or password";
            header("Location: 02_login.php?error=$em&$data");
            exit;
         }

      }else {
         $em = "Incorect User name or password";
         header("Location: 02_login.php?error=$em&$data");
         exit;
      }
    }


}else {
	header("Location: 02_login.php?error=error");
	exit;
}