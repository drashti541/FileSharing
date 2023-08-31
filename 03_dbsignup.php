<?php

if(isset($_POST['empname']) && 
   isset($_POST['empid']) && 
   isset($_POST['password']) &&
   isset($_POST['cpassword'])){

        include "_dbconnect.php";
  
        $empname = $_POST['empname'];
        $empid = $_POST['empid'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $data = "empname=".$empname."&empid=".$empid."&password=".$password."&cpassword=".$cpassword;

        if(empty($empname)) {
            $em = "Name is required";
            header("Location: 03_signup.php?error=$em&$data");
            exit;

        }else if (!preg_match("/^[a-zA-Z-' ]*$/",$empname)){
            $em = "Enter valid Name";
            header("Location: 03_signup.php?error=$em&$data");
            exit;
        
        }else if(empty($empid) == true){
            $em = "Employee ID is required";
            header("Location: 03_signup.php?error=$em&$data");
            exit;

        }else if(empty($password)){
            $em = "password is required";
            header("Location: 03_signup.php?error=$em&$data");
            exit;

        }else if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password)){
            $em = "Please enter atleast 8 character with number, symbol, small and capital letter.";
            header("Location: 03_signup.php?error=$em&$data");
            exit;

        }else if(empty($cpassword)) {
            $em = "Confirm password is required";
            header("Location: 03_signup.php?error=$em&$data");
            exit;

        }else if($cpassword != $password){
            $em = "Confirm password should be same as password";
            header("Location: 03_signup.php?error=$em&$data");
            exit;
        }

        else{

            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO employees(empname, empid, password) 
            VALUES(?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$empname, $empid, $password]);
            header("Location: 03_signup.php?success=Account Created");
            exit;
        }
    
    }else {
    header("Location: 03_signup.php?error=error");
    exit;
}
?>

