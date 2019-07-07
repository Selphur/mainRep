<!DOCTYPE html>

<?php //Include classes and the mysql connection.
include_once("mysql-connect.php");
include_once("classQuestion.php");
include_once("classQuiz.php");
include_once("classQuizList.php");

$quizList = new QuizList;
?>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
<form method="post" action="quiz.php?i=0" class="quizChoice" required>
<label for="user">Ievadiet savu vārdu<input id="user" name="user" required></label>
<label for="quizChoice">Izvēlieties testu<select id="quizChoice" name="quizChoice">

<?php
//Get a general quiz list from the DB and check each entry for reserved words. If none found, add the entry to the available quiz list.
foreach($quizList->getQuizList() as $quiz) {
	if(strpos($quiz[0], "Answers") == 0 && strpos($quiz[0], "ResultsByUser") == 0 ) {
		echo "<option value='".$quiz[0]."'>".$quiz[0]."</option>";
	}
}
?>

</select>
</label>
<input type="submit" value="Uzsākt testu">
</form>
</body>
</html>