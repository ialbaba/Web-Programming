<?php
    // at a later point, you can convert it back to array like:
    $recoveredData = file_get_contents('results.txt');
    // unserializing to get actual array
    $recoveredArray = unserialize($recoveredData);
    echo($recoveredArray)
?>