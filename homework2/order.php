<?php
        // creating connection to database
        $host = "localhost";
        $user = "iba11";
        $password = "Student_4282740";
        $dbname = "iba11";
    
        $connection = mysqli_connect($host, $user, $password, $dbname);
        function display_data($data) {
                $display = '<table>';
                foreach($data as $row => $var) {
                    $display .= '<tr>';
                    if ($row === 0) {
                        foreach($var as $col => $value) {
                            $display .= '<td>' . $col . '</td>';
                        }
                        $display .= '</tr>';
                    }
                    foreach($var as $col => $value) {
                            $display .= '<td>' . $value . '</td>';
                        }
                    $display .= '</tr>';
                }
                $display .= '</table>';
                echo $display;
                echo "<hr/>";
            }

            $query = "select * from iba11.WinnieTable3 order by timestamp desc;";
            $result = mysqli_query($connection, $query);
            display_data($result);
            $query = "select * from iba11.WinnieTable3 order by timestamp;";
            $result = mysqli_query($connection, $query);
            display_data($result);
            $query = "select * from iba11.WinnieTable3 order by quantity desc;";
            $result = mysqli_query($connection, $query);
            display_data($result);
        ?>

<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
</head>
<body>
</body>
</html>