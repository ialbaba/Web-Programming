<!DOCTYPE html>
<html>
<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

html,
body {
    font-family: 'Roboto', sans-serif;
    font-weight: 100;
	height: 100%;
}
.container {

}
table {
    width: -webkit-fill-available;
	border-collapse: collapse;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

th,td {
	padding: 15px;
	background-color: rgba(255,255,255,0.2);
	color: black;
}
th {
	text-align: left;
}
thead th {
        color: white;
		background-color: #A5243D;
	}
td {
    position: relative;
}
</style>
</head>
<body>
<?php
    $host = "localhost";
    $user = "iba11";
    $password = "Student_4282740";
    $dbname = "iba11";
    $connection = mysqli_connect($host, $user, $password, $dbname);
    if(isset($_GET['mainid'])){
        $input = intval($_GET['mainid']);
        $query = '  select 
                    placeName as Place, 
                    procedureName, 
                    count(*) as Count, 
                    round(avg(billedAmount),2) as Billed, 
                    ROUND(avg(patientAmount),2) as PtPayment, 
                    concat(ROUND(avg(patientAmount),2)/round(avg(billedAmount),2)*100,"%") as Percent, 
                    round(avg(rating),2) as Rating 
                    from Bills b
                    JOIN Procedures p on b.idProcedures = p.idProcedures
                    JOIN Places pl on b.idPlaces = pl.idPlaces
                    where b.idProcedures = '.$input.' 
                    GROUP BY procedureName, placeName;
                ';
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

        echo "
        <div class='container'>
            <table>
                <thead>
                    <tr>
                    <th>Place of Service</th>
                    <th>Procedure Name</th>
                    <th>Count</th>
                    <th>Billed Amount</th>
                    <th>Patient Payment</th>
                    <th>Percent Patient Paid</th>
                    <th>Average Rating</th>
                    </tr>
                </thead>
                <tbody>";
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['Place'] . "</td>";
            echo "<td>" . $row['procedureName'] . "</td>";
            echo "<td>" . $row['Count'] . "</td>";
            echo "<td>" . $row['Billed'] . "</td>";
            echo "<td>" . $row['PtPayment'] . "</td>";
            echo "<td>" . $row['Percent'] . "</td>";
            echo "<td>" . $row['Rating'] . "</td>";
            echo "</tr>";
        }
        echo "
        </tbody>
        </table>
        </div>";
        mysqli_close($connection);
    }
?>
</body>
</html>