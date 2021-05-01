
<?php  
    include "buildConnection.php";
    $connection = connection_setup();
?> 
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="A short description." />
    <meta name="keywords" content="put, keywords, here" />
    <title>PHP-MySQL forum</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php

    $msg = "";
    if(isset($_POST['submit'])){
        if ($_SESSION['is_SignedIn'] === True)
        {
            $name = mysqli_real_escape_string($connection, $_POST['name']);
            $address = mysqli_real_escape_string($connection, $_POST['address']);
            $statecode = $_POST['state'];
            $city = mysqli_real_escape_string($connection, $_POST['city']);
            $zip = intval($_POST['zip']);

            $query = "
                INSERT INTO `iba11`.`Places`
                    (`placeName`,
                    `address`,
                    `state`,
                    `city`,
                    `zipcode`)
                VALUES
                    ('".$name."',
                    '".$address."',
                    '".$statecode."',
                    '".$city."',
                    ".$zip.");";
            
            $result = mysqli_query($connection, $query);
            if(!$result)
            {
                die('External Error. Try Again later!');
            }
            else
            {
                $msg = "Place Of Service Added";
            }
                
        }
        else{
            header("Location: http://pacu.cs.pitt.edu/~iba11/meddoor/login.php");
        }
        
    } 
?>

</head>
<body>
    <?php include "header.php";
          include "optionBar.php";
          display_bar("CrowdSourcing is Fun! Add a Place of Service!");
    ?> 
    <div class="bill">
        <p class="sign" align="center">Add Service Place</p>
        <form class="form1" method = "post" action="addPlace.php">
            <div id="errorMessage">
            <?php 
                if(!empty($msg)){
                    echo $msg;
                    echo ('<script> document.getElementById("errorMessage").style.display = "block";</script>');
                }
            ?>
            </div>
            <input class="un " type="text" name="name"  align="center" required="required" placeholder="Service Place Name">
            <input class="un " type="text" name="address"  align="center" required="required" placeholder="Address">
            <div class = "un" align="center"> 
                <label style = "color: rgb(118,118,118)" for="procedures">State:</label>
                <select style = "border-radius: 20px;height: 25;border-color: #a3a5ab;"name="state" id="state" required="required">
                    <?php
                        $query = "select * from States";
                        $result = mysqli_query($connection, $query);
                        if ($result){
                            while($row = mysqli_fetch_assoc($result)) 
                            {     
                                $code =  $row['stateCode']; 
                                $name =  $row['stateName']; 
                                $output = "<option value='".$code."'>".$name."</option>";
                                echo ($output);
                            }
                        }
                        else{
                            echo ('Database Retrieval Failure!');
                        }
                    ?>
                </select>
            </div>
            <input class="un " type="text" name="city"  align="center" required="required" placeholder="City">
            <input class="un " type="number" name="zip" maxlength="5" align="center" required="required" placeholder="Zip Code">
            <input class="submit" type = "submit" name = "submit" align="center" value = "Submit"></a>
        </form>
    </div>
</div> 
</body>
</html>