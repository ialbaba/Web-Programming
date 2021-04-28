<!DOCTYPE html>
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
    <?php 
        session_start();
        include "header.php";
        include "optionBar.php";
        display_bar();
    ?> 
	<div class = "content">
		<div id = "container">
        <h1>what is meddoor?</h1>
        <p>Meddoor is a webapplication that crowdsources medical and dental bill data. 
            Meddoor affords prospective patients greater transparancy when traversing the often
            complicated process of choosing the right provider for the job. 
        </p>
        <h1>our services.</h1>
        <p>Click on the browse procedures tab and you'll find you self on our Procedure Data Analysis Tool.
            For right now, we only offer data on the most common dental procedures. We also only have data 
            on like 4 places. And no, you can not add data to more places. Yes, I understand that defeats the purpose
            but this is simply a project to prove a proof-of-concept. 
		</p>
		</div>
    </div> 
</body>
</html>