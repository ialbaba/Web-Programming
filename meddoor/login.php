<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="A short description." />
    <meta name="keywords" content="put, keywords, here" />
    <title>PHP-MySQL forum</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php 
        include "buildConnection.php";
        $connection = connection_setup();

        $error_msg = "";
        $success_msg = "";

        if(isset($_POST['submit']))
        {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $valid = True;
            
            if ($username == '' || $password == '')
            {
                $error_msg = "Please Fill all field";
                $valid = False;
            }
            
            if ($valid)
            {
                $query = "select * from Users where username = ? and password = ?";
                $stmt1 = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt1, 'ss', $username, $password);
                mysqli_stmt_execute($stmt1);
                $result = mysqli_stmt_get_result($stmt1);
                if ($result === false)
                {
                    die("Database Retrieval Failure");
                }
                elseif (mysqli_num_rows($result)>0)
                {
                    $success_msg = "Signed in as ".$username;
                    while($row = mysqli_fetch_assoc($result)){
                        $_SESSION['userid'] = $row['idusers'];
                    }  
                    $_SESSION['username']  = $username;
                    $_SESSION['is_SignedIn'] = True;
                    echo $_SESSION['userid'];
                }
                else
                {
                    $error_msg = "Username and/or Password Incorrect";
                    $valid = False;
                }                    
            }

        }
    ?>
</head>
<body>

    <?php include "header.php";
          include "optionBar.php";
          display_bar("Login to access our amazing featues!");
    ?> 
    <div class="bubble">
		<p class="sign" align="center">Sign in</p>
		<form class="form1" method = "post" action = "login.php">
            <div id="errorMessage">
                <?php 
                    if(!empty($error_msg)){
                        echo "Error <br>";
                        echo $error_msg;
                        echo ('<script> document.getElementById("errorMessage").style.display = "block";</script>');
                      }
                    if(!empty($success_msg)){
                        echo $success_msg;
                        echo ('<script> document.getElementById("errorMessage").style.display = "block";</script>');
                    }
                ?>
            </div>
			<input class="un" name = "username" type="text" align="center" placeholder="Username" required="required" >
			<input class="pass" name= "password" type="password" align="center" placeholder="Password" required="required" >
            <input class="submit" type = "submit" name = "submit" align="center" value = "Sign In" >
		</form>
    </div>

</body>
</html>