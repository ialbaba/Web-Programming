<?php

session_start();
if ($_SESSION['is_SignedIn']  === TRUE){
    echo ('<div id="wrapper">
    <div id="menubar">
        <span><a href="index.php">meddoor</a></span>
        <div id = "items">
            <a class="item" href=""> welcome @'.$_SESSION['username'].' |</a>
            <a href="signout.php">sign out </a>
        </div>
    </div>');
}
else{
    echo ('<div id="wrapper">
    <div id="menubar">
        <span><a href="index.php">meddoor</a></span>
        <div id = "items">
            <a class="item" href="login.php">login |</a>
            <a class="item" href="register.php">regiser |</a>
            <a href="signout.php">sign out </a>
        </div>
    </div>');
}

?>
