<?php
    function display_bar ($input = "Hello, what would you like to do today?"){
        echo '<div id="optionbar">
        <spans id = "navtext">'.$input.'</span>
        <div id = "navitems">
            <a id="item" href="login.php"><i class="fa fa-search"></i> Browse Procedures</a>
            <div class="vl"></div>
            <a id="item" href="register.php"><i class="fa fa-search"></i> Browse Clinics</a>
            <div class="vl"></div>
            <a id="item" href="post_bill.php"><i class="fa fa-edit"></i> Post A Bill</a>
        </div>
        </div>';
    }
?>