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

<div class="container mainclass">
<div class="row subclass">


    <h3>Shared Files</h3>
        <table class="table" id="myTable">
        <thead>
            <tr>
            <th scope="col">S.No</th>
            <th scope="col">Shared With</th>
            <th scope="col">ID</th>
            <th scope="col">Files</th>
            <th scope="col">Action</th>
            <th scope="col">Time</th>
            </tr>
        </thead>
        <tbody>
        <?php 
          $query = "SELECT * FROM fileshare Where empname = ? ORDER BY `time` DESC";
          $statement = $conn->prepare($query);
          $statement->execute([$empname]);

          if($statement->rowCount() > 0)
          {
            $sno = 0;
            while($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $sno = $sno + 1;
        ?>
            <tr>
            <th scope='row'><?php echo $sno;?></th>
            <td><?php echo $row['shareempname']?></td>
            <td><?php echo $row['shareempid']?></td>
            <td>
            <?php $file_names = explode(',', $row['name']);
              foreach($file_names as $file_name) 
              { ?>
                <li><?php echo $file_name?></li>
              <?php } ?> 
            </td>

            
            <td>
            <?php $file_names = explode(',', $row['name']);
              foreach($file_names as $file_name) 
              { ?><a href="download.php?file=<?php echo urlencode($file_name); ?>">Download</a>
               <a href="view.php?file=<?php echo urlencode($file_name); ?>">View</a><br>
                <?php } ?>
            </td> 
        
            <td><?php echo $row['time']?></td>       
      <?php
            }
        }else{
            echo "<td colspan=6>No records found</td>";
        }
    ?>
            </tr>

      </tbody>
    </table>
    </div>


       

</div>

<script>
$(document).ready( function () {
$('#myTable').DataTable();
} );
</script>

</body>
</html>
<?php }else {
	header("Location: 02_login.php");
	exit;
} ?>
