<?php 
    session_start();
    $_SESSION['category'] = 1;
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
  <h2>forum/pets</h2>
  <div id="topic">
        <div id="topicBlock">
            <span id = "metadata"> @iba11 | March 22, 2021 | 11:16 PM </span>
            <h3> Cats are actually better than dogs -my take </h3>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae nulla quisquam saepe distinctio accusamus, odio laudantium similique omnis eius rerum recusandae facere facilis quod inventore dignissimos voluptates aliquam porro atque? <p>
        </div>
        <div id="reply">
            <span id = "metadata"> @iba11 | March 22, 2021 | 11:16 PM </span>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae nulla quisquam saepe distinctio accusamus, odio laudantium similique omnis eius rerum recusandae facere facilis quod inventore dignissimos voluptates aliquam porro atque? <p>
        </div>
        <div id="reply">
            <span id = "metadata"> @iba11 | March 22, 2021 | 11:16 PM </span>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae nulla quisquam saepe distinctio accusamus, odio laudantium similique omnis eius rerum recusandae facere facilis quod inventore dignissimos voluptates aliquam porro atque? <p>
        </div>
        <div id="comment">
            <form action = "comment.php">
                <input type = "input" name = "comment" value = "comment"></input>
                <br>
                <input type = "submit" name = "submit" value = 'Tea'></input>
            </form>
        </div>
    </div>
  
    <div id="topic">
        <div id="topicBlock">
            <span id = "metadata"> @iba11 | March 27, 2021 | 11:59 PM </span>
            <h3> Dogs are actually better than dogs -my take </h3>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae nulla quisquam saepe distinctio accusamus, odio laudantium similique omnis eius rerum recusandae facere facilis quod inventore dignissimos voluptates aliquam porro atque? <p>
        </div>
    </div>
  </div>
<div id="footer"></div>
</body>
</html>