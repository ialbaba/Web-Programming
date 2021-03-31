<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="A short description." />
    <meta name="keywords" content="put, keywords, here" />
    <title>PHP-MySQL forum</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
  <?php include 'menu.php';?>
  <hr>
  <br>
  <br>
  <?php echo "Signed out of ".$_SESSION['username'];?>
  <?php 
    setcookie(session_name(), '', 100);
    session_unset();
    session_destroy();
    ?>
</body>
</html>