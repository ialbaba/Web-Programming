<!DOCTYPE html>
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
    <script src="jquery-3.6.0.min.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
<body>
    <?php 
    include "header.php";
    include "optionBar.php";
    display_bar("Select a Procedure to get some insight!");
    ?>
    
    <form style="margin: 1.5em;>
        <label style = "color: rgb(118,118,118)" for="procedure">Choose a procedure:</label>
        <select style="border-radius: 20px;border-color: #a3a5ab;font-size: medium;padding: 2px 8px;" name="procedures" id="procedures" onchange="display(this.value)">
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
    </form>
    <div class = "selectedProcedure"> <div>

<script>   
    function display_pie(str) {
        if (str == "") {
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var myObj = JSON.parse(this.responseText);
                try {
                    var insurance_payment = (myObj.billed) - (myObj.patient);
                }
                catch (e) {
                    alert(e.stack);
                    alert(e.name);
                    alert(e.message);
                    }
                    var data = [{
                    values: [insurance_payment, myObj.patient],
                    labels: ['Insurance Payment', 'Patient Payment'],
                    type: 'pie'
                }];
                var layout = {
                    height: 300,
                    width: 300,
                    title: {
                        text: myObj.proc,
                        font: {
                        family: 'Roboto, sans-serif',
                        size: 16
                        },
                        xref: 'paper',
                        x: -.5
                    },
                    legend: {
                    x: 0.0,
                    y: -0.5,
                    size: 40,
                    font: {
                        family: 'Roboto, sans-serif',
                        size: 10,
                        color: '#000'
                    }
                    },
                    colorway : ['#A5243D', '#E9E9EC'],
                    plot_bgcolor:"rgba(0,0,0,0)",
                    paper_bgcolor:"rgba(0,0,0,0)"

                };
                try{
                    Plotly.newPlot('graphedData', data, layout);
                }
                catch (e) {
                    alert(e.stack);
                    alert(e.name);
                    alert(e.message);
                    }
                var billLow = myObj.billed -  myObj.bstd;
                var billHigh = parseFloat(myObj.billed) + parseFloat(myObj.bstd);
                var ptLow = parseFloat(myObj.patient) -  parseFloat(myObj.pstd);
                var ptHigh = parseFloat(myObj.patient) + parseFloat(myObj.pstd);
                
                
                document.getElementById("Blow").innerHTML = billLow.toFixed(2);
                document.getElementById("Bhigh").innerHTML = billHigh.toFixed(2);
                document.getElementById("Plow").innerHTML = ptLow.toFixed(2);
                document.getElementById("Phigh").innerHTML = ptHigh.toFixed(2);

            }
            };
            xmlhttp.open("GET","ajaxReturnProcData.php?mainid="+str,true);
            xmlhttp.send();
        }
    }

    function display(str) {
        if (str == "") {
            display(1);
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
                display_pie(str);
            }
            };
            xmlhttp.open("GET","displayProcs.php?mainid="+str,true);
            xmlhttp.send();
        }
    }
    display(1);   
    </script>
    
    <div id="data_container">
        <div id="demo">
            <h3>Average Billed Amount</h3> 
            <div style = "display: flex; flex-direction: row; justify-content: space-around; width: 100%" class = "outerContainer">
                <div id="item1">
                    <span id = "Blow">$</span>
                    <p style =  "font-size: xx-small; margin: 0; text-align: center;">Low</p>
                </div>
                <div id="item1">
                    <span id = "Bhigh">$</span>
                    <p style =  "font-size: xx-small; margin: 0; text-align: center;">High</p>
                </div>
            </div>
            <h3>Average Patient Payment</h3> 
            <div style = "display: flex; flex-direction: row; justify-content: space-around; width: 100%" class = "outerContainer">
                <div id="item1">
                    <span id = "Plow">$</span>
                    <p style =  "font-size: xx-small; margin: 0; text-align: center;">Low</p>
                </div>
                <div id="item1">
                    <span id = "Phigh">$</span>
                    <p style =  "font-size: xx-small; margin: 0; text-align: center;">High</p>
                </div>
            </div>
            <div id = "graphedData" align="center"></div>
        </div>
        <div id="txtHint"></div>
    </div>


</body>
</html>