<?php 
    session_start(); 
    // creates connection to database
    function connection_setup(){
        $host = "localhost";
        $user = "iba11";
        $password = "Student_4282740";
        $dbname = "iba11";
        $connection = mysqli_connect($host, $user, $password, $dbname);
        $return_msg = '';
        if(mysqli_connect_errno()){
            die("Database connection failed: ".mysqli_connect_error() . " (" . mysqli_connect_errno(). ")");
        }
        return ($connection); 
    }

?>