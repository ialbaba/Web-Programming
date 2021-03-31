<?php
  // this signs you in
    session_start();
    include "buildConnection.php";

    if($_POST){
      $username = $_POST['username'];
      $password = $_POST['password'];
      // heres the check to see if user/pass combo is in the database
      $query = 'select * from iba11.ForumUsers where username = "'.($username).'"and password = "'.($password).'"';
      $output = mysqli_query($connection, $query);

      if(!$output)
      {
          echo 'External Error. Try Again later!';
      }
      else
      {
          if(mysqli_num_rows($output) == 0)
          {
              $return_msg .= 'Username and/or password incorrect! Please enter something new.';
          }
          else
          {
              // makes session var signedIN true so that the rest of the website can act accordingly
              $_SESSION['is_SignedIn'] = TRUE;
              while($row = mysqli_fetch_assoc($output))
              {
                  $_SESSION['userId']    = $row['idUsers'];
                  $_SESSION['username']  = $row['username'];
              }
              $return_msg .= "Login Success! Welcome ";
              $return_msg .= $_SESSION['username'];
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
     <p><?php echo $return_msg?></p>

  </div> 
</body>
</html>