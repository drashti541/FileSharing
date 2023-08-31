<?php
  $file_name = $_GET['file'];
  $file_path = 'uploadfile/' . $file_name;
  $file_type = mime_content_type($file_path);
  if (in_array($file_type, array('image/jpeg', 'image/png', 'application/pdf', 'image/webp'))) {
    header('Content-Type: ' . $file_type);
    readfile($file_path);
    exit;
  } else {
    header("Location: 04_home.php?error=You can't view this type of file. Please download it.");
    exit;
  }
?>
