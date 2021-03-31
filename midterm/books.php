<?php 
    session_start(); 
    include "buildConnection.php";
    $weburl =  "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>
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
  <div id="content">
        <h2>forum/books</h2>
        <?php 
        include 'displayTopics.php';
        display(3, $weburl);
        ?>
    </div>
<div id="footer"></div>
</body>
</html>