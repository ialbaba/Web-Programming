
<?php

$fname = $_GET["firstName"];
$lname = $_GET["lastName"];
$trueFalse = $_GET["trueFalse"];
$statements = $_GET["statements"];
$majors = $_GET["majors"];
$math1 = $_GET["mathQuestion1"];
$math2 = $_GET["mathQuestion2"];


#score tracker -368
$score = 0;

echo("<h1> $fname $lname's Results: </h1>");

echo("Q1: Australia is wider than the moon:");

echo("<br>");


if ($trueFalse == "True") {
    echo("CORRECT. Austrialia is wider than the Moon!");
    $score++;
}
else{
    echo("FALSE. Austrialia is wider than the Moon!");
}

echo("<br><br>");

echo("Q2: Select all true statements");

echo("<br>");

if ($statements == "madonna") {
    echo("CORRECT. Madonna's real name is Madonna");
    $score++;
}
else {
    echo("FALSE. K is worth four points in Scrabble! AND The only letter not in the periodic table is the letter J");
}

echo("<br>");
echo("<br>");

echo("Q3: What major is not offered in the SCI School");

echo("<br>");

if ($statements == "madonna") {
    echo("CORRECT. Biology is not offered!");
    $score++;
}
else {
    echo("FALSE. Biology is not offered");
}

echo("<br>");
echo("<br>");

echo("Q4: 2^6 is equal to...");

echo("<br>");

if ($statements == 64) {
    echo("CORRECT.");
    $score++;
}
else {
    echo("FALSE. Correct answer is 64");
}

echo("<br>");
echo("<br>");

echo("Q5: Log(1) is equal to...");

if ($statements == 0) {
    echo("CORRECT.");
    $score++;
}
else {
    echo("FALSE. Correct answer is 0");
}

echo("<br>");
echo("<br>");

echo("<h2>Total score : $score / 5 </h2>");

$filePath = "results.txt";
$time  = new DateTime();
$timeStamp = $time->format('Y-m-d H:i');

$blob = $fname + ',' +$lname + ',' + $trueFalse+ ','  + $statements+ ','  + $majors + ','  + $math1+ ','  + $math2 + ',' + $timeStamp + ',' + $score + ';';
file_put_contents($filePath, $blob, FILE_APPEND);
/* $arr = array("FirstName"=>$fname, "LastName"=>$lname, "Q1"=>$trueFalse, "Q2"=>$statements, "Q3"=>$majors, "Q4"=>$math1, "Q5"=>$math2, "Timestamp"=>$timeStamp);

$blob = file_get_contents('results.txt');
$blob_arr = unserialize($blob);
if (empty($blob_arr)) {
    $blob_arr = [];
    array_push($blob_arr, serialize($arr));
}
else{
    array_push($blob_arr, serialize($arr));
}
echo '<pre>'; print_r($blob_arr); echo '</pre>';
file_put_contents($filePath, serialize($blob_arr)); */

?>



