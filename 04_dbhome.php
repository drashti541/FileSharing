<?php 
include "_dbconnect.php";
session_start();
if (isset($_SESSION['empname']) && isset($_SESSION['empid'])){
    $empname = $_SESSION['empname'];
    $empid = $_SESSION['empid'];
 
if(isset($_POST['submit'])){

    $shareempname = $_POST['shareempname'];
    $shareempid = $_POST['shareempid'];

    $image = $_FILES["files"];
    $file_name = $_FILES["files"]["name"];
    $location ="uploadfile/";
    $image_name = implode(",",$file_name);

    if(!empty($file_name)){
        foreach($file_name as $key => $val){
            $targetpath = $location .$val;
            move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetpath);
        }
    }
   
        $query = "INSERT INTO `fileshare` (`empname`,`empid`,`shareempname`, `shareempid`, `name`) VALUES (?,?,?,?,?)";
        $statement = $conn->prepare($query);
        $statement->execute([$empname, $empid, $shareempname, $shareempid,$image_name]);
        $_SESSION['shareempname'] = $shareempname;

        header("Location: 04_home.php?success=Files shared successfully");
        exit;
    

}


}

?>