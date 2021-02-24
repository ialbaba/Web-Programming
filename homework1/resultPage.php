<?php
    // at a later point, you can convert it back to array like:
    $data = file_get_contents('results.txt');
    $sep_data = explode(";", $data);
    echo '<pre>'; print_r($sep_data); echo '</pre>';

/*     $recoveredData = unserialize($data);
    echo '<pre>'; print_r($recoveredData); echo '</pre>';
    foreach ($recoveredData as $val){
        echo '<pre>'; print_r(unserialized($val)); echo '</pre>';
    } */
?>