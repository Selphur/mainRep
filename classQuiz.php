<?php

class Quiz {
	
	private $questions;
	private $answers;
	private $questionCount;
	private $user;
	
	function __construct($quiz, $quizAnswers, $user) {
		$dbConnection = connect();
		$dbConnection->query("SET NAMES 'utf8mb4'");
		$this->questions = mysqli_fetch_all($dbConnection->query("SELECT Question FROM $quiz"));
		$this->answers = mysqli_fetch_all($dbConnection->query("SELECT QuestionId, Answer, IsCorrect FROM $quizAnswers"));
		$this->questionCount = count($this->questions);
		$this->user = $user;
	}
	
	//Get the total data (id, text) about each question.
	public function getQuestions() {
		return $this->questions;
	}
	
	//Get the total data (id, the question it belongs to, etc.) about each answer.
	public function getAnswers() {
		return $this->answers;
	}
	
	//Count the questions of a quiz.
	public function getQuestionCount() {
		return $this->questionCount;
	}
	
	//Create a quiz-specific DB table.
	public function createQuizTable($user) {
		$dbConnection = connect();
		$dbConnection->query("SET NAMES 'utf8mb4'");
		$dbConnection->query("CREATE TABLE quizResultsByUser_".$user." 
		(Id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		User VARCHAR(512) NOT NULL, Quiz VARCHAR(512) NOT NULL,
		QuestionText VARCHAR(512) NOT NULL,
		AnswerText VARCHAR(512) NOT NULL,
		AnswerIfCorrect INT(1) NOT NULL)");
	}
	
	//Get a list of correct numbers for each quiz.
	public function getResults($user) {
		$dbConnection = connect();
		$dbConnection->query("SET NAMES 'utf8mb4'");
		return mysqli_fetch_all($dbConnection->query("SELECT AnswerIfCorrect from quizResultsByUser_".$user." WHERE AnswerIfCorrect = '1'"));
	}
	
	//Rename the quiz-specific table to include a random numerical code. This generates a unique name for each table, preventing overwriting.
	public function renameTable($user) {
		$dbConnection = connect();
		$dbConnection->query("SET NAMES 'utf8mb4'");
		$dbConnection->query("RENAME TABLE quizResultsByUser_".$user." TO quizResultsByUser_".$user."_".rand(0, 999999));
	}
}

?>