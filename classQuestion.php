<?php

class Question {
	
	private $quiz;
	private $currentQuestionIndex;
	
	function __construct($quiz, $quizAnswers, $user) {
		$this->quiz = new Quiz($quiz, $quizAnswers, $user);
	}
	
	//Get the index of the current question.
	public function getCurrentQuestionIndex() {
		$this->currentQuestionIndex = $_GET["i"];
		return $this->currentQuestionIndex;
	}
	
	//Get the question text.
	public function getQuestionText($id) {
		return $this->quiz->getQuestions()[$id];
	}
	
	//Get a list of answers.
	public function getAnswerTextList($id) {
		$answerTextList = [];
		
		foreach($this->quiz->getAnswers() as $answer) {
			if($answer[0] == $id) {
				array_push($answerTextList, $answer[1]);
			}
		}
		
		return $answerTextList;
	}
	
	//Get a list of 1s (correct) and 0s (incorrect) that corresponds to the list of answers.
	public function getAnswerCorrectnessList($id) {
		$answerCorrectnessList = [];
		
		foreach($this->quiz->getAnswers() as $answer) {
			if($answer[0] == $id) {
				array_push($answerCorrectnessList, $answer[2]);
			}
		}
		
		return $answerCorrectnessList;
	}
	
	//Create a row with info. about an answer in a quiz-specific DB table.
	public function recordAnswer($user, $quizChoice, $questionText, $answerChosenText, $answer) {
		$dbConnection = connect();
		$dbConnection->query("SET NAMES 'utf8mb4'");
		$dbConnection->query("INSERT INTO quizResultsByUser_".$user." (User, Quiz, QuestionText, AnswerText, AnswerIfCorrect) VALUES ('".$user."', '".$quizChoice."', '".$questionText."', '".$answerChosenText."', ".$answer.")");
	}
}

?>