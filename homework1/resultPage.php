<?php
    // at a later point, you can convert it back to array like:

    $mappedKeys = array("FirstName", "LastName", "Q1", "Q2", "Q3", "Q4", "Q5", "Timestamp","Score");

    function displayScore($v1, $v2) {
        echo($v1.": ".$v2);
      }

    $data = file_get_contents('results.txt');
    $sep_data = explode(";", $data);
    $sep_data = array_pop($sep_data)
    foreach ($sep_data as $val){
        $sep_input = explode(",", $val);
        array_map(displayScore($v1, $v2), $mappedKeys, $sep_input;
    }
 

/*     $recoveredData = unserialize($data);
    echo '<pre>'; print_r($recoveredData); echo '</pre>';
    foreach ($recoveredData as $val){
        echo '<pre>'; print_r(unserialized($val)); echo '</pre>';
    } */
?>