<?php
    // at a later point, you can convert it back to array like:
    $data = file_get_contents('results.txt');
    $filterData = explode(";", $data);
    // unserializing to get actual array
    echo($filterData);
    echo '<pre>'; print_r($filterData); echo '</pre>';
    foreach ($filterData as $val){
        $recoveredArray = unserialize($val);
        echo($val);
        echo($recoveredArray);
        foreach ($recoveredArray as $value){
            echo($value);
        }
    }
?>