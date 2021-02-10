
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

echo("<h1> $fname $lname's Results: <h1>");

echo("Q1: Australia is wider than the moon:");

if ($trueFalse == "True") {
    echo("CORRECT. Austrialia is wider than the Moon!");
    $score++;
}
else{
    echo("FALSE. Austrialia is wider than the Moon!");
}
echo("Q2: Select all true statements");

if ($statements == "madonna") {
    echo("CORRECT. Madonna's real name is Madonna");
    $score++;
}
else {
    echo("FALSE. K is worth four points in Scrabble! AND The only letter not in the periodic table is the letter J");
}

echo("Q3: What major is not offered in the SCI School");

if ($statements == "madonna") {
    echo("CORRECT. Biology is not offered!");
    $score++;
}
else {
    echo("FALSE. Biology is not offered");
}

echo("Q4: 2^6 is equal to...");

if ($statements == "64") {
    echo("CORRECT.");
    $score++;
}
else {
    echo("FALSE. Correct answer is 64");
}


echo("Q5: Log(1) is equal to...")

if ($statements == "0") {
    echo("CORRECT.");
    $score++;
}
else {
    echo("FALSE. Correct answer is 0");
}

echo("<h2>Total score : $score / 5 <h2>");

exit;

?>



