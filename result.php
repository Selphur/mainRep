<!DOCTYPE html>

<?php //Include classes and the mysql connection.
include_once("mysql-connect.php");
include_once("classQuestion.php");
include_once("classQuiz.php");

$question = new Question($_POST["quizChoice"], $_POST["quizChoice"]."Answers", $_POST["user"]);
$quiz = new Quiz($_POST["quizChoice"], $_POST["quizChoice"]."Answers", $_POST["user"]);
?>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body class="results">

<?php
//Check if any answers were submitted from the previous questions. If yes, pass them to the DB.
if(isset($_POST["answer"])) {
	$question->recordAnswer($_POST['user'], $_POST["quizChoice"], $_POST["questionText"], $_POST["answerChosenText"], $_POST["answer"]);
}

//Display the results. Get the submitted username, get the correct answer count from the DB and the total question count for the quiz.
echo "<p class='name'>Paldies, ".$_POST['user'].".</p>
<p class='answers'>Pareizās atbildes: ".count($quiz->getResults($_POST['user']))." no ".$quiz->getQuestionCount()."</p>";

$quiz->renameTable($_POST['user']);
?>

<a href="index.php" class='return'>Atpakaļ uz sākumlapu</a>

</body>
</html>