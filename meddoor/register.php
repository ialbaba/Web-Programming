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
        ini_set('display_errors', 1); 
        error_reporting(E_ALL);

        include "buildConnection.php";
        $connection = connection_setup();

        $error_msg = "";

        if(isset($_POST['submit'])){
            $fname = trim($_POST['fname']);
            $lname = trim($_POST['lname']);
            $username = trim($_POST['username']);
            $password = trim($_POST['pass']);
            $confirmpass = trim($_POST['confirmpass']);
            $valid = True;
            if($fname == '' || $lname == '' || $username == '' || $password == '' || $confirmpass == ''){
                $valid = false;
                $error_msg = "Please fill all fields.";
                echo ($error_msg);
              }
            if ($valid && ($password != $confirmpass)){
                $valid = false;
                $error_msg = "Confirm password not matching";
                echo ($error_msg);
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
                    echo ($error_msg);
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
                echo "<strong class= 'un' > Success! New User Created! <strong>";
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
        <form class="form1" method = "post">
        <?php 
            // Display Error message
            if(!empty($error_msg)){
              echo "<strong class= 'un' >Error!</strong> <?= ".$error_msg." ?>";
            }
        ?>
        
            <input class="un " type="text" name = "fname" align="center" placeholder="First Name" required="required" maxlength="80">
            <input class="un " type="text" name = "lname" align="center" placeholder="Last Name" required="required" maxlength="80">
            <input class="un " type="text" name = "username" align="center" placeholder="Username" required="required" maxlength="15">
            <input class="un" type="password" name = "pass" align="center" placeholder="Password" required="required" minlegth = "4" maxlength="12">
            <input class="pass" type="password" name = "confirmpass" align="center" placeholder="Confirm Password" onkeyup='' required="required" minlegth = "4" maxlength="12">
            <input class="un" type = "submit" name = "submit" align="center" value = "Create New Account" >
        </form>
    </div>

</body>
</html>