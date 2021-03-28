<!DOCTYPE html>
<?php
    // creating connection to database
    $host = "localhost";
    $user = "iba11";
    $password = "Student_4282740";
    $dbname = "iba11";
    $connection = mysqli_connect($host, $user, $password, $dbname);
    if(mysqli_connect_errno()){die("Database connection failed: ".mysqli_connect_error() . " (" . mysqli_connect_errno(). ")");}
    if($_POST){

      $username = $_POST['username'];
      $password = $_POST['password'];
      $query = 'select * from iba11.ForumUsers where username = "'.($username).'"and password = "'.($password).'"';
      echo $query;
      echo "<br>";
      $output = mysqli_query($connection, $query);
      if(!$output)
      {
          echo 'External Error. Try Again later!';
      }
      else
      {
          if(mysqli_num_rows($output) == 0)
          {
              echo 'Username and/or password incorrect! Please enter something new.';
          }
          else
          {
              $_SESSION['is_SignedIn'] = TRUE;
              while($row = mysqli_fetch_assoc($result))
              {
                  $_SESSION['userId']    = $row['isUsers'];
                  $_SESSION['username']  = $row['username'];
              }
                
              echo 'Welcome, ' . $_SESSION['username'];
          }
        }
    }



?>

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
<div id="footer"></div>
<div id="content">
  <?php echo $_SESSION['user']?>
    <h2>sign in</h2>
      <form action="signin.php" method = "post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required="required"<?php if(isset($_POST['user'])) echo "value='$username'";?>>
        <br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required="required" <?php if(isset($_POST['pass'])) echo "value='$password'";?>>
        <br>
        <input type="submit" value = "Sign In"></input>
      </form>

  </div>
</body>
</html>