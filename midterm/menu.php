<?php
// this builds out the menu bar which is included in everypage.
// if signed in it displays the signout button and displays username
session_start();
if ($_SESSION['is_SignedIn'] == TRUE){
    echo '<div id="wrapper">
    <h1 font>the forum.</h1>
        <div id="menubar">
            <ul>
            <li><div id = "items">
                <a class="item" href="index.php">Home</a> -
                <a class="item" href="topic.php">Create a topic</a> -</div>
            </li>             
            <li><div id="userlogin"> <a class="item" href="signin.php">Signed in as @'.$_SESSION['username'].'</a></div></li>
            <li><a href="signout.php">Sign Out</a></li>
            </ul>
    </div>';
}
else{
    echo '<div id="wrapper">
            <h1 font>the forum.</h1>
                <div id="menubar">
                    <ul>
                    <li><div>
                        <a class="item" href="index.php">Home</a> -
                        <a class="item" href="signin.php">Create a topic</a> -</div>
                    </li>             
                    <li><div id="userlogin"> <a class="item" href="signin.php">Sign in</a></div></li>
                    </ul>
            </div>';
}
?>