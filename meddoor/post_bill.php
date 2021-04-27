
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
</head>
<body>
    <?php include "header.php";
          include "optionBar.php";
          display_bar("Input information about your last dental visit!");
    ?> 
    <div class="bill">
        <p class="sign" align="center">Post A Bill</p>
        <form class="form1">
            <div class = "un" align="center"> 
                <label style = "color: rgb(118,118,118);" for="procDate">Date of Procedeure:</label>
                <input style = "width: -webkit-fill-available;border-width: thin;
                border-radius: 30px;font: -webkit-mini-control;" type="date" id="start" name="procDate">
            </div>
            <div class = "un" align="center"> 
                    <label style = "color: rgb(118,118,118)" for="places">Place Of Service:</label>
                    <select style = "border-radius: 20px;height: 25;border-color: #a3a5ab;"name="places" id="places">
                        <?php
                            $query = "select * from iba11.Places";
                            $result = mysqli_query($connection, $query);
                            if ($result){
                                while($row = mysqli_fetch_assoc($result)) 
                                {     
                                    $id =  $row['idPlaces']; 
                                    $proc =  $row['placeName']; 
                                    $output = "<option value='".$id."'>".$proc."</option>";
                                    echo ($output);
                                }
                            }
                            else{
                                echo ('Database Retrieval Failure!');
                            }
                        ?>
                    </select>
            </div>
            <div class = "un" align="center"> 
                <label style = "color: rgb(118,118,118)" for="procedure">Choose a procedure:</label>
                <select style = "border-radius: 20px;height: 25;border-color: #a3a5ab;"name="procedures" id="procedures">
                    <?php
                        $query = "select * from Procedures";
                        $result = mysqli_query($connection, $query);
                        if ($result){
                            while($row = mysqli_fetch_assoc($result)) 
                            {     
                                $id =  $row['idProcedures']; 
                                $proc =  $row['procedureName']; 
                                $output = "<option value='".$id."'>".$proc."</option>";
                                echo ($output);
                            }
                        }
                        else{
                            echo ('Database Retrieval Failure!');
                        }
                    ?>
                </select>
            </div>
            <div class = "un" align="center"> 
                <p id="rangeValue" style="margin: auto; color: rgb(118,118,118);">0</p>
                <input style="width: -webkit-fill-available;" type="range" value="0" min="1" max="5" onChange="rangeSlide(this.value)" onmousemove="rangeSlide(this.value)"></Input>
                    <script type="text/javascript">
                        function rangeSlide(value) {
                            document.getElementById('rangeValue').innerHTML = value;
                        }
                    </script>
                <p style="margin: auto; color: rgb(118,118,118)">Rate the quality of your experience</p>
            </div>
            <input class="un " type="number" min="0.01" step="0.01" align="center" placeholder="Billed Amount ($)">
            <input class="un " type="number" min="0.01" step="0.01" align="center" placeholder="Patient Payment ($)">
            <input class="submit" type = "submit" align="center" value = "Submit"></a>
        </form>
    </div>
</div> 
</body>
</html>