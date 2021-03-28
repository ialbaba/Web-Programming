<?php
    // creating connection to database
    $host = "localhost";
    $user = "iba11";
    $password = "Student_4282740";
    $dbname = "iba11";

    $connection = mysqli_connect($host, $user, $password, $dbname);
    
    if($_POST){
        $name = $_POST['name'];
        $fname = explode(" ", $name)[0];
        $lname = explode(" ", $name)[1];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
        $zipCode = $_POST['zipCode'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $size = $_POST['size'];
        $quantity = $_POST['quantity'];
        $state = $_POST['state'];
        $timestamp = date('Y-m-d H:i:s');
        $error_msg = '';

        if(is_numeric($name) == true){
            $error_msg = 'Invalid Name Entry!<br>';
        }
        if(is_numeric($phoneNumber) == false){
            $error_msg .= 'Invalid Phone Entry! Match Format!<br>';
        }
        if(strlen((string)$phoneNumber) != 10){
            $error_msg .= 'Invalid Phone Entry! U.S.A Phone Numbers are 10 digits long.<br>';
        }
        if(is_numeric($zipCode) == False){
            $error_msg .= 'Invalid Zip Code!<br>';
        }
        if(strlen((string)$zipCode) != 5){
            $error_msg .= 'Invalid Zip Code! Zip has to be 5 Digits longs.<br>';
        }
        if ($error_msg == ''){
            $insert_statment = "insert into `iba11`.`WinnieTable3`
                (
                `timestamp`,
                `size`,
                `quantity`,
                `firstName`,
                `lastName`,
                `phoneNumber`,
                `address`,
                `city`,
                `zip`,
                `state`)
                VALUES(";
            $insert_statment .=  '"'.$timestamp.'"'.",";
            $insert_statment .= '"'.$size.'"'.",";
            $insert_statment .= $quantity.",";
            $insert_statment .= '"'.$fname.'"'.",";
            $insert_statment .= '"'.$lname.'"'.",";
            $insert_statment .= '"'.$phoneNumber.'"'.",";
            $insert_statment .= '"'.$address.'"'.",";
            $insert_statment .= '"'.$city.'"'.",";
            $insert_statment .= $zipCode.",";
            $insert_statment .= '"'.$state.'"'.")";     
            }
            $insert_command = mysqli_query($connection, $insert_statment);

    }  
?>
<!DOCTYPE html>
<html>
<head>

    <title>Homework 1</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">

</head>
<body>
    <h1>Winnie the Pooh Shop</h1>
    <img src="winnie.jpg" alt="Winnie Sweater" width="300" height="400">
    <h3>Fill out purchase form below to order a sweater today!</h3>

    <form action="homework2b.php" method = "post">
        <?php
            if ($error_msg != ''){
                echo('<p>'.$error_msg.'</p>');
            }
        ?>
        <div class = "blocks">
        <ul>
            <li>
                <div class = "inputContainers">
                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name"<?php  if(isset($_POST['name'])) echo "value='$name'";?>>
                </div>
            </li>
            <li>
                <div class = "inputContainers">
                    <label for="phoneNumber">Phone Number: (no dashes, just numbers)</label><br>
                    <input type="number" id="phoneNumber" name="phoneNumber" maxlength="10" <?php  if(isset($_POST['phoneNumber'])) echo "value='$phoneNumber'";?>>
                </div>
            </li>
            
            <li>
                <div class = "inputContainers">
                    <label for="address">Address:</label><br>
                    <input type="text" id="address" name="address" <?php  if(isset($_POST['address'])) echo "value='$address'";?>><br>
                </div>
            </li>
            <li>
                <div class = "inputContainers">
                    <label for="zipCode">Zip Code:</label><br>
                    <input type="number" id="zipCode" name="zipCode" maxlength="5" <?php  if(isset($_POST['zipCode'])) echo "value='$zipCode'";?>><br>
                </div>
            </li>
            <li>
                <div class = "inputContainers">
                    <label for="city">City:</label><br>
                    <input type="text" id="city" name="city" <?php  if(isset($_POST['city'])) echo "value='$city'";?>><br>
                </div>
            </li>
            <li>
                <div class = "inputContainers">
                    <label for="state">State:</label><br>
                    <select name="state" id="state">
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select><br>		
                </div>
            </li>
        </ul>
        </div>
        <div class="blocks">
            <ul>
                <li>
                    <div class = "inputContainers">
                        <p>Select Sweater Size:</p>
                        <input type="radio" name="size" value="s">
                        <label for="small">Small</label><br>
                        <input type="radio" name="size" value="m">
                        <label for="medium">Medium</label><br>
                        <input type="radio" name="size" value="l">
                        <label for="large">Large</label><br><br>
                    </div>
                </li>
                <li>
                    <div class = "inputContainers">
                        <label for="quantity">Quantity:</label><br>
                        <input type="number" id="quantity" name="quantity" maxvalue="4" value = 1><br>
                    </div>
                </li>
            </ul>
        </div>
       <br>
       <input type="submit" value="Submit">
       <button><a href = 'order.php'>Order History</a></button>
</body>
</html>