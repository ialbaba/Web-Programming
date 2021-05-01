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
        $sucessmsg = "";

        if(isset($_POST['submit'])){
            $fname = mysqli_real_escape_string($connection, trim($_POST['fname']));
            $lname = mysqli_real_escape_string($connection, trim($_POST['lname']));
            $username = mysqli_real_escape_string($connection, trim($_POST['username']));
            $password = mysqli_real_escape_string($connection, trim($_POST['pass']));
            $confirmpass = mysqli_real_escape_string($connection, trim($_POST['confirm']));
            $valid = True;

            if($fname == '' || $lname == '' || $username == '' || $password == '' || $confirmpass == ''){
                $valid = false;
                $error_msg = "Please fill all fields.";
                
              }
            if ($valid && ($password != $confirmpass)){
                $valid = false;
                $error_msg = "Confirm password not matching";
                
            }
            if ($valid){
                $query = "select * FROM iba11.Users where username = ?";
                $stmt1 = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt1, 's', $username);
                mysqli_stmt_execute($stmt1);
                $result = mysqli_stmt_get_result($stmt1);
                if (mysqli_num_rows($result)>0){
                    $error_msg = "Username Already Exists!";
                    $valid = False;
                   
                }
                else{
                    $valid = True;
                }
            }
            if ($valid){
                $query = "insert INTO `iba11`.`Users`
                (`username`,
                `firstname`,
                `lastname`,
                `password`)
                VALUES
                (?,?,?,?);";
                $stmt1 = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt1, 'ssss', $username,$fname,$lname,$password);
                mysqli_stmt_execute($stmt1);
                $sucessmsg = "Success! New User Created!";
            }

        }
    ?>
</head>
<body>
    <?php include "header.php";
          include "optionBar.php";
          display_bar("Register now to add new bills and much more!");
    ?> 

    <div class="bubble">
        <p class="sign" align="center">Register</p>
        <form class="form1" method = "post" action = "register.php">
         <div id="errorMessage">
            <?php 
                if(!empty($error_msg)){
                    echo $error_msg;
                    echo ('<script> document.getElementById("errorMessage").style.display = "block";</script>');
                }
                if(!empty($sucessmsg)){
                    echo $sucessmsg;
                    echo ('<script> document.getElementById("errorMessage").style.display = "block";</script>');
                }
            ?>
            </div>
        
            <input class="un " type="text" name = "fname" align="center" placeholder="First Name" required="required" maxlength="80">
            <input class="un " type="text" name = "lname" align="center" placeholder="Last Name" required="required" maxlength="80">
            <input class="un " type="text" name = "username" align="center" placeholder="Username" required="required" maxlength="15">
            <input class="un" type="password" name = "pass" align="center" placeholder="Password" required="required" minlegth = "4" maxlength="12">
            <input class="pass" type="password" name = "confirm" align="center" placeholder="Confirm Password" required="required" minlegth = "4" maxlength="12">
            <input class="un" type = "submit" name = "submit" align="center" value = "Create New Account" >
        </form>
    </div>

</body>
</html>