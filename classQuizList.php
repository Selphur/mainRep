<?php

class QuizList {
	private $quizList;
	
	function __construct() {
		$dbConnection = connect();
		$this->quizList = mysqli_fetch_all($dbConnection->query("SHOW tables"));
	}
	
	//Get a list of all available tables.
	public function getQuizList() {
		return $this->quizList;
	}
}

?>