<?php
session_start();

  if (isset($_POST['email']) && isset($_POST['password'])) {
    // code...
    print_r($_POST);
  }
  if (empty($_SESSION['user'])) {
   header('Location: login.php');
  }
  
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <br>
    <a href="logout.php">Dsqnb</a>
  </body>
</html>
