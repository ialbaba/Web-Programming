<?php
session_start();
$username = '';
$_SESSION['user'] = '';
$_SESSION['is_SignedIn'] = False;

echo '<div id="wrapper">
<h1 font>the forum.</h1>
    <div id="menubar">
        <ul>
        <li><div>
            <a class="item" href="index.php">Home</a> -
            <a class="item" href="topic.php">Create a topic</a> -</div>
        </li>             
        <li><div id="userlogin"> <a class="item" href="signin.php">Sign in</a></div></li>
        </ul>
</div>';
?>