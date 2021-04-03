<?php session_start(); 
    // creating connection to database
    $host = "localhost";
    $user = "iba11";
    $password = "Student_4282740";
    $dbname = "iba11";
    $connection = mysqli_connect($host, $user, $password, $dbname);
    $return_msg = '';
    if(mysqli_connect_errno()){die("Database connection failed: ".mysqli_connect_error() . " (" . mysqli_connect_errno(). ")");
    }
    if($_POST){
        $category = (int) $_POST['category'];
        $subject = mysqli_real_escape_string($connection, $_POST['subject']);
        $message = mysqli_real_escape_string($connection, $_POST['message']);
        $query =    "insert into `iba11`.`ForumTopics`
                    (`timestamp`,
                    `subject`,
                    `message`,
                    `userID`,
                    `categoryID`)
                    VALUES
                    (CURRENT_TIMESTAMP,
                    '".$subject."',
                    '".$message."',
                    ".$_SESSION['userId'].",
                    ".$category.");";

        $output = mysqli_query($connection, $query);
        if(!$output)
        {
            $return_msg .= 'External Error. Try Again later!';
        }
        else
        {
            $return_msg .= "Topic Post Success!";
        }

    }
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
      <h2>create a topic.</h2>
        <div id = "createTopic">
            <form action = "topic.php" method = "post">
                <label for="category">Select A Category:</label>
                <br>
                <select name="category" id="category">
                    <option value="1">Pets</option>
                    <option value="2">Movies</option>
                    <option value="3">Books</option>
                </select>
                <br>
                <label for = "subject">Subject</label>
                <br>
                <input type = "text" name = "subject" required="required" id = "subjectBox" ></input>
                <br>
                <label for = "message">Message</label>
                <br>
                <textarea id="msgBox" name="message" rows="5" required="required"> </textarea>
                <br>
                <input type ="submit" value = "Post Topic">
            </form>
            <?php
                echo $return_msg;
            ?>
        </div>
  </div>
<div id="footer"></div>
</body>
</html>