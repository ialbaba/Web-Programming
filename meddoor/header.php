<?php

session_start();
if ($_SESSION['is_SignedIn']  === TRUE){
    echo ('<div id="wrapper">
    <div id="menubar">
        <span><a href="index.php">meddoor</a></span>
        <div id = "items">
            <a class="item" href="profile.php"> @'.$_SESSION['username'].' <i class="fa fa-user-circle-o"></i> |</a>
            <a href="signout.php">sign out </a>
        </div>
    </div>');
}
else{
    echo ('<div id="wrapper">
    <div id="menubar">
        <span><a href="index.php">meddoor</a></span>
        <div id = "items">
            <a class="item" href="login.php">sign in |</a>
            <a class="item" href="register.php">sign up</a>
        </div>
    </div>');
}

?>
