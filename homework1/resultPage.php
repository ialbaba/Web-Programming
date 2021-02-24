<?php
    // at a later point, you can convert it back to array like:
    $data = file_get_contents('results.txt');
    $filterData = explode(";", $$data);
    // unserializing to get actual array
    $recoveredArray = unserialize($recoveredData);
    foreach ($filterData as $val){
        $recoveredArray = unserialize($val);
        foreach ($recoveredArray as $value){
            echo($value);
    }
?>