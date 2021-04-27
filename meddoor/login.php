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
</head>
<body>
    <?php include "header.php";
          include "optionBar.php";
          display_bar("Login to access our amazing featues!");
    ?> 
    <div class="login">
        <p class="sign" align="center">Sign in</p>
        <form class="form1">
          <input class="un " type="text" align="center" placeholder="Username">
          <input class="pass" type="password" align="center" placeholder="Password">
          <a class="submit" align="center">Login</a>
    </div>

</body>
</html>