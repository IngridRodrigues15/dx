<?php

class Perguntas extends Controller {

	public function __construct() {
		parent::__construct();
		Auth::handleLogin();
	}
	
	/* Carrega o index de perguntas, 
	*  Consulta a lista de perguntas de acordo com a sessao do jogo
	*/
	public function index() 
	{
		$gameId = $_SESSION['jogoid'];

		if (empty($gameId)) {
			$this->view->render('header');
			$this->view->render('jogos/index');
			$this->view->render('footer');
			exit();
		}

		$this->view->title = 'Perguntas';
		$this->view->questionsList = $this->model->searchQuestionByGame($gameId);
		$questionsList = $this->model->searchQuestionByGame($gameId);
		
		$this->view->render('header');
		$this->view->render('perguntas/index');
		$this->view->render('footer');
	}

	/* Cria uma nova pergunta, e a lista de perguntas 
	*  com base na sesao do jogo
	*/
	public function create() 
	{  
		$answerList = $_POST['answerList'];
		$question = $_POST['question'];
		$gameId = $_SESSION['jogoid'];

		 if (empty($question) || empty($gameId)) {
			 return false;
		 }
		 
		 $question = json_encode($question);
		 $questionObj = json_decode($question);

		 if (!empty($questionObj->id)){
			$questionId = $this->model->editQuestion($questionObj);         
		 } else if (!empty($questionObj->text)){
			$questionId = $this->model->createQuestion($questionObj);         
		 } else {
			 return false;
		 }

		 $this->createAnswerList($answerList, $questionId);
	  
	}

	/* Cria a lista de perguntas 
	*  com base na sesao do jogo e no id da pergunta
	*/
	public function createAnswerList($answerList, $questionId) 
	{
		if(!is_null($answerList) && !is_null($questionId)){
			$this->model->deleteAnswersByQuestion($questionId);
			foreach ($answerList as $res){
				$rightAnswer = $res["repostaCerta"];
				$right = 0;
				if ($rightAnswer == "true") {
					$right = 1;
				}
				$data = array(
					'id_pergunta' => $questionId,
					'texto' => $res["texto"],
					'resp_cert' => $right
				);
				$this->model->createAnswers($data);
				unset($data);
			}
		}
	}

	/* Metodo para trazer todos as repostas de uma pergunta 
	 * Verifica o id da pergunta pelo parametro 
	 * Retorna um json com todos as respostas
	 */
	public function listAnswersByQuestion(){
		$questionId = (int)$_POST['questionId'];
		$listAnswers = NULL;
		$json = NULL;

		if (empty($questionId)) {
			return false;
		}
		$listAnswers = $this->model->searchAnswersByQuestion($questionId);
		$json = json_encode($listAnswers);
		echo $json;
		
	}


	/* Metodo para trazer todos as perguntas do jogo */
	public function listQuestions(){
		$questionsList = NULL;
		$json = NULL;

		$gameId = $_SESSION['jogoid'];
		if (empty($gameId)) {
			return false;
		}

		$questionsList = $this->model->searchQuestionNotAnswered($gameId);
		$json = json_encode($questionsList);
		echo $json;
	}

	/* Metodo para trazer todos as perguntas respondidas */
	public function listAnsweredQuestions () {
		$questionsList = NULL;
		$json = NULL;

		$gameId = $_SESSION['jogoid'];
		$userId = $_SESSION['userid'];
		if (empty($gameId) || empty($userId) ) {
			return false;
		}

		$questionsList = $this->model->searchQuestionAnswered($gameId,$userId);
		$json = json_encode($questionsList);
		echo $json;
	}

	/* Metodo para trazer todos as perguntas respondidas */
	public function listAnsweredQuestionsByStudent () {
		$questionsList = NULL;
		$json = NULL;

		$gameId = $_SESSION['jogoid'];
		$userId = $_POST['userId'];
		if (empty($gameId) || empty($userId) ) {
			return false;
		}

		$questionsList = $this->model->searchQuestionAnswered($gameId,$userId);
		$json = json_encode($questionsList);
		echo $json;
	}

	/* Salva a resposta escolhida, para uma questão
	*  com base na sesao do jogo, e usuario
	*/
	public function saveAnswerByQuestion() 
	{  
		$gameId = $_SESSION['jogoid'];
		$userId = $_SESSION['userid'];
		$questionId = (int)$_POST['questionId'];
		$answerId = (int)$_POST['answerId'];

		if (empty($answerId) || empty($questionId) || empty($gameId) || empty($userId) ) {
			 return false;
		 }
		$data = array(
			'id_resposta' => $answerId,
			'id_pergunta' => $questionId,
			'id_jogo' =>  $gameId,
			'id_usuario' => $userId
		 );

		$this->model->saveAnswerByQuestion($data);
	}

}

