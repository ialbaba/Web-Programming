<!DOCTYPE html>
<html>
<head>

    <title>Homework 1</title>
    <link rel="stylesheet" href="styles.css">

</head>
</head>
<body>
    <h1>HOMEWORK 1</h1>
    <h2>Quiz</h2>

    <form action="result.php" method="GET">
        
        <label for="firstName">First name:</label>
        <input type="text" id="firstName" name="firstName"><br>
        <label for="lastName">Last name:</label>
        <input type="text" id="lastName" name="lastName"><br>
        
        <h3>Question 1:</h3>
        <label for="Q1">Australia is wider than the moon:</label> <br>
            <input type="radio" name="trueFalse" value="True">
            <label for="isTrue">True</label><br>
            <input type="radio" name="trueFalse" value="False">
            <label for="isFalse">False</label><br>

        <h3>Question 2:</h3>
        <label for="statements">Select all true statements</label> <br>
        <input type="checkbox" id="statement1" name="statements" value="scrabble">
        <label for="statements">K is worth four points in Scrabble</label><br>
        <input type="checkbox" id="statement2" name="statements" value="madonna">
        <label for="statements">Madonna's real name is Madonna</label><br>
        <input type="checkbox" id="statement3" name="statements" value="periodicTable">
        <label for="statements">The only letter not in the periodic table is the letter I</label><br>

        <h3>Question 3:</h3>
        <label for="majors">What major is not offered in the SCI School:</label>
        <select name="majors" id="majors">
            <option value="infsci">Information Science</option>
            <option value="compsci">Computer Science</option>
            <option value="compbio">Biology</option>
            <option value="other">Other</option>
        </select>
        <h3 class = "mathSection">Math Section!</h3>
        <h3>Question 4:</h3>
        <label for="mathQuestion1">2^6?</label>
        <input type="text" id="mathQuestion1" name="mathQuestion1"><br>

        <h3>Question 5:</h3>
        <label for="mathQuestion2">Log(1)?</label>
        <input type="text" id="mathQuestion2" name="mathQuestion2"><br>

        <br>
        <br>

        <input type="submit" value="Submit">

    </form>

</body>
</html>