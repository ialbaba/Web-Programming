<?php   
    // function that displays topic and comments
    // most important aspect of the build                     
    function display ($catID, $weburl){
        // creates connection
        $host = "localhost";
        $user = "iba11";
        $password = "Student_4282740";
        $dbname = "iba11";
        $connection = mysqli_connect($host, $user, $password, $dbname);
        
        // query for finding all topics, joining on username

        $query = "select idTopics, (select username from iba11.ForumUsers WHERE userID = idUsers) as username, timestamp, subject, message FROM iba11.ForumTopics WHERE categoryID = ".$catID.";";
        $result = mysqli_query($connection, $query);
        if(!$result){echo 'External Error. Try Again later!'; exit();}
        while($row = mysqli_fetch_assoc($result))
            {
            // builds out the frame of the html code and loops through every topic there is in DB
            $returnTopic = 
            '<div id="topic">
            <div id="topicBlock">
                <span id = "metadata"> @'.$row['username'].' | '.$row['timestamp'].' </span>
                <h3> '.$row['subject'].'</h3>
                <p> '.$row['message'].' </p>
            </div>';
            // query for finding all comments
            $query = "select * FROM iba11.ForumReplies JOIN iba11.ForumUsers ON userid = idUsers WHERE topicID = ".$row['idTopics'].";";
            $result2 = mysqli_query($connection, $query);
            if(!$result){echo 'External Error 2. Try Again later!'; exit();}
            // looping through all comments 
            while($row2 = mysqli_fetch_assoc($result2))
                {
                    $returnTopic .=  '<div id="reply">
                                        <span id = "metadata"> @'.$row2['username'].' | '.$row2['timestamp'].'</span>
                                        <p> '.$row2['message'].' </p>
                                        </div>';
                }
            // this is the html code for the actualy posting a comment. 
            // its a form. th hidden form types are meant to POST the weburl for redirecting purposes and the topicID for querying
            $returnTopic .= '<div id="comment">
                                <form action = "comment.php" method = "post">
                                    <input type = "input" name = "comment" value = "comment"></input>
                                    <br>
                                    <input type = "hidden" name = "topicID" value = '.$row['idTopics'].'>
                                    <input type = "hidden" name = "url" value = '.$weburl.'>
                                    <input type = "submit" name = "submit" value = "comment"></input>
                                </form>
                            </div>';
            $returnTopic .= '</div>';
            echo ($returnTopic);
         }
    }
?>