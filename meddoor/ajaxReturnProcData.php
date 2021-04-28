<?php

    $host = "localhost";
    $user = "iba11";
    $password = "Student_4282740";
    $dbname = "iba11";
    $connection = mysqli_connect($host, $user, $password, $dbname);
    if(isset($_GET['mainid'])){
        $input = intval($_GET['mainid']);
        $query = "  select procedureName, 
                    round(avg(billedAmount),2 ) as Billed, 
                    ROUND(avg(patientAmount),2) as Patient, 
                    ROUND(stddev(billedAmount),2) as BStd,
                    ROUND(stddev(patientAmount),2) as Pstd
                    from Bills b
                    JOIN Procedures p on b.idProcedures = p.idProcedures
                    JOIN Places pl on b.idPlaces = pl.idPlaces
                    WHERE b.idProcedures = ".$input."
                    GROUP BY procedureName
                ";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        
        while($row = mysqli_fetch_array($result)) {
            $return_arr['proc'] = $row['procedureName'];
            $return_arr['billed'] = $row['Billed'];
            $return_arr['patient'] = $row['Patient'];
            $return_arr['bstd'] = $row['BStd'];
            $return_arr['pstd'] = $row['Pstd'];
        }
        echo json_encode($return_arr);
    }     
?>