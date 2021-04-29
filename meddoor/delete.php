<?php
    include "buildConnection.php";
    $connection = connection_setup();
    echo "here";
    if(isset($_POST['submit'])){

        $idBill = intval($_POST['id']);

        $query = "
                    DELETE FROM `iba11`.`Bills`
                    WHERE idBills = ".$idBill.";
                ";
        echo $query;
        $result = mysqli_query($connection, $query) or die("Error!");
        if ($result){
            header("Location: http://pacu.cs.pitt.edu/~iba11/meddoor/profile.php");
        }

    }
?>