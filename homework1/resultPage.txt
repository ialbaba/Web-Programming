<?php
    // at a later point, you can convert it back to array like:
    echo("<h1> Results History </h1>");
    echo("<br><br>");

    $mappedKeys = array("First Name", "Last Name", "Q1", "Q2", "Q3", "Q4", "Q5", "Timestamp","Score");
    $tableSetup = '<table style='.'"'.'width:100%'.'"'.'><tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Q1</th>
                        <th>Q2</th>
                        <th>Q3</th>
                        <th>Q4</th>
                        <th>Q5</th>
                        <th>Timestamp</th>
                        <th>Score</th>
                    </tr>';

    function displayScore($v1, $v2) {
        //echo($v1.": ".$v2."<br>");
        return("<td>".$v2."</td>");
      }

    $data = file_get_contents('results.txt');
    $sep_data= explode(";", $data);
    array_pop($sep_data);
    foreach ($sep_data as $val){
        $sep_input = explode(",", $val);
 
        $tableEntry = array_map("displayScore",$mappedKeys, $sep_input);
        $entryBuilder = "<tr>".implode($tableEntry)."</tr>";
        $tableSetup .= $entryBuilder;
    }
    $tableSetup .= "</table>";
    echo ($tableSetup);

/*     $recoveredData = unserialize($data);
    echo '<pre>'; print_r($recoveredData); echo '</pre>';
    foreach ($recoveredData as $val){
        echo '<pre>'; print_r(unserialized($val)); echo '</pre>';
    } */
?>