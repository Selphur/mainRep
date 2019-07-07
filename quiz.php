<!DOCTYPE html>

<?php //Include classes and the mysql connection.
include_once("mysql-connect.php");
include_once("classQuestion.php");
include_once("classQuiz.php");
$question = new Question($_POST["quizChoice"], $_POST["quizChoice"]."Answers", $_POST["user"]);

//Check if any answers were submitted from the previous questions. If yes, pass them to the DB.
if(isset($_POST["answer"])) {
	$question->recordAnswer($_POST['user'], $_POST["quizChoice"], $_POST["questionText"], $_POST["answerChosenText"], $_POST["answer"]);
}

$quiz = new Quiz($_POST["quizChoice"], $_POST["quizChoice"]."Answers", $_POST["user"]);

//Check if the current question is the first. If yes, create a table in the DB for storing quiz-specific information.
if($question->getCurrentQuestionIndex() == 0) {
	$quiz->createQuizTable($_POST['user']);
}

//Check if the current question is the last. If yes, make the form transfer to the result page upon submitting. If not, reload the page and increase the question index to display the next question. Done via 'action' in <form>.
if($question->getCurrentQuestionIndex() == $quiz->getQuestionCount() - 1) {
	$action = "result.php";
} else {
	$action = "?i=".($question->getCurrentQuestionIndex() + 1);
}
?>

<html>
<head>
<meta charset='UTF-8'>
<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
<form method="post" action="<?=$action;?>">

<?php echo "<h1>".$question->getQuestionText($question->getCurrentQuestionIndex())[0]."</h1>"; //Get the text of the current question. ?>

<span class="inputContainer">

<?php
//Generate answers for the current question. Pass the text of each answer as an argument for a JS function (further explanation below).
foreach($question->getAnswerTextList($question->getCurrentQuestionIndex()) as $key => $answer) {
		echo "
			<label for='answer".$question->getCurrentQuestionIndex()."-".$key."'>
				<input onClick=\"addAnswerText('".$answer."')\" 
					id='answer".$question->getCurrentQuestionIndex()."-".$key."' 
					type='radio' 
					name='answer' 
					value='".$question->getAnswerCorrectnessList($question->getCurrentQuestionIndex())[$key]."' required><span class='customCheckbox'></span>".$answer."
			</label>";
}

//Generate hidden inputs to store temporary data for submitting it via <form>.
echo "<input id='answerChosenText' type='hidden' name='answerChosenText' value=''>
<input type='hidden' name='quizChoice' value='".$_POST["quizChoice"]."'>
<input type='hidden' name='user' value='".$_POST['user']."'>
<input type='hidden' name='questionText' value='".$question->getQuestionText($question->getCurrentQuestionIndex())[0]."'>";
?>

</span>

<?php echo "<input type='submit' value='Tālāk'>"; ?>

</form>

<progress value="<?php echo (($question->getCurrentQuestionIndex() + 1) / $quiz->getQuestionCount()); ?>" max="1"></progress>

</body>
</html>

<script>
//Set the answer text passed as a value for a hidden <input>, from which it is submitted by the <form>.
function addAnswerText(answer) {
	document.getElementById("answerChosenText").value = answer;
}
</script>