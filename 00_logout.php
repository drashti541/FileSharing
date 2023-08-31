<?php  
session_start();

session_unset();
session_destroy();

header("Location: 01_index.php");
exit;
?>