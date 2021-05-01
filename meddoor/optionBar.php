<?php
    function display_bar ($input = "Hello, what would you like to do today?"){
        echo '<div id="optionbar">
        <span id = "navtext">'.$input.'</span>
        <div id = "navitems">
            <a id="item" href="browseProcedures.php"><i class="fa fa-search"></i> Browse Procedures</a>
            <div class="vl"></div>
            <a id="item" href="addPlace.php"><i class="fa fa-plus-square"></i> Add A Place Of Service</a>
            <div class="vl"></div>
            <a id="item" href="post_bill.php"><i class="fa fa-edit"></i> Post A Bill</a>
        </div>
        </div>';
    }
?>