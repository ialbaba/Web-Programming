<?php
    include "menu.php";
    session_start();
    echo ($_SESSION['category']);
    // checking if user is signed in
    if ($_SESSION['is_SignedIn'] == TRUE){
        // creating connection to database
        $host = "localhost";
        $user = "iba11";
        $password = "Student_4282740";
        $dbname = "iba11";
        $connection = mysqli_connect($host, $user, $password, $dbname);
        $return_msg = '';
        if(mysqli_connect_errno()){die("Database connection failed: ".mysqli_connect_error() . " (" . mysqli_connect_errno(). ")");
        } else {echo "connection success";}

        if($_POST){
            $category = (int) $_SESSION['category'];
            // sanitize
            $comment = mysqli_real_escape_string($connection, $_POST['comment']);
            $topicID = $_POST['topicID'];
            echo ($comment);
            // creating query
            $query =    "insert into `iba11`.`ForumReplies`
                        (`message`,
                        `timestamp`,
                        `userid`,
                        `topicid`) VALUES
                        (
                        '".$comment."',
                        CURRENT_TIMESTAMP,
                        ".$_SESSION['userId'].",
                        ".$topicID.");";
            
            $output = mysqli_query($connection, $query);
            if(!$output)
            {
                $return_msg .= 'External Error. Try Again later!';
            }
            else
            {
                $return_msg .= "Topic Post Success!";
            }
            echo $output;
    
            echo "<p>".$query."</p>";
            $return = '"Location: '.$_POST['url'].'"';
            echo ($return);
            header("Location: ".$_POST['url']);
            exit();
        }
    }
    else{
        // sends person back to sign in link if theyre not signed in
        header("Location: http://pacu.cs.pitt.edu/~iba11/midterm/signin.php");
    }
?>