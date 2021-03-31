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
  <div id="content">
    <!-- displaying main page and all categories -->
    <h2>click a category</h2>
      <div id="cat">
        <img src="images/pets.png" alt="Snow"">
        <div id = "centered"><a href = "pets.php">pets</a> </div>
      </div>
      <div id="cat">
        <img src="images/movies.jpg" alt="Snow"">
        <div id = "centered"><a href = "movies.php">movies</a> </div>
      </div>
      <div id="cat">
        <img src="images/books.png" alt="Snow">
        <div id = "centered"><a href = "books.php">books</a> </div>
      </div>
  </div>
<div id="footer"></div>
</body>
</html>