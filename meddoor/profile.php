<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="jquery-3.6.0.min.js"></script>
	<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<head>
    <?php
    include "buildConnection.php";
    $connection = connection_setup();
    include "header.php";
    include "optionBar.php";
    display_bar("@".$_SESSION['username']."'s Profile. Browse Through Your Submissions!"); 
    if ($_SESSION['is_SignedIn'] === True){
       
        $userid = $_SESSION['userid'];
        $query = "
                    SELECT 
                        b.idBills, 
                        billedAmount, 
                        round(patientAmount, 2) as patientAmount,
                        rating,
                        p.procedureName,
                        pl.placeName,
                        u.username,
                        date(billDate) as billDate,
                        entryDate
                    FROM iba11.Bills b
                    JOIN Users u on u.idUsers = b.idUsers
                    JOIN Procedures p on p.idProcedures = b.idProcedures
                    JOIN Places pl on pl.idPlaces = b.idPlaces
                    WHERE b.idUsers = ".$userid."
                    ORDER BY entryDate DESC
                    LIMIT 10;
                ";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    }
    else{
        header("Location: http://pacu.cs.pitt.edu/~iba11/meddoor/login.php");
    }

    ?>
	<div class = 'billContain'>
        <?php
             while($row = mysqli_fetch_array($result)){
                 ?>
                 <div id = "bill">
                 <p1>submitted on <?php echo $row['entryDate'];?></p>
                 <h2><?php echo $row['placeName'];?></h2>
                    <div id = "billDataContain">
                        <h3>Procedure Date</h3>
                        <p><?php echo $row['billDate'];?></p>
                        <hr style="margin: 3px 0px">
                        <h3>Procedure</h3>
                        <p><?php echo $row['procedureName'];?></p>
                        <hr style="margin: 3px 0px">
                        <h3>Rating</h3>
                        <p><?php echo $row['rating'];?></p>
                        <hr style="margin: 3px 0px">
                        <h3>Billed Amount</h3>
                        <p>$<?php echo $row['billedAmount'];?></p>
                        <hr style="margin: 3px 0px">
                        <h3>Patient Payment</h3>
                        <p>$<?php echo $row['patientAmount'];?></p>
                        <form method="post" action="delete.php" style="justify-content: center;display: flex;">
                            <input type="hidden" value= '<?php echo $row['idBills'];?>' name="id">
                            <input id="delete" type="submit" value="Delete" name ="submit">
                        </form>
                    </div>
                </div>
                <?php
             }
        ?>
	</div>
</body>
</html>