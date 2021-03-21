<?php

class Fichas extends Controller {

	public static $instance;
	public function __construct() {
		parent::__construct();
		Auth::handleLogin();
		self::$instance = $this;
	}

	public static function get() {
		if (self::$instance === null) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	public function index() 
	{
		$this->view->title = 'Ficha';
		$this->view->fichaLista = $this->model->fichasList();
		$gameType = $_SESSION['jogotipo'];

		if (empty($gameType)) {
			$this->view->render('header');
			$this->view->render('fichas/index');
			$this->view->render('footer');
		} else {
			$this->view->render('header');
			$this->view->render('fichas/quiz');
			$this->view->render('footer');
		}
	}



	/* Cria a ficha por um array */
	public function createByArray($data) 
	{
		if (empty($data)) {
			return false;
		}

	   include('./models/fichas_model.php');
		$model = new Fichas_Model;
		$model->create($data);

		unset($model);
	}

	public function create() 
	{
		$data = array(
			'nome' => $_POST['nomeFicha'],
			'id_jogo' => $_SESSION['jogoid']
		 );
		$this->model->create($data);
		unset($data);
		header('location: ' . URL . 'fichas');
	}

	public function edit($id) 
	{
		 if (is_numeric($id)) {
		   Session::set('fichaid', $id); 
		}
		$this->view->fichaDados = $this->model->fichaSingleList();
		$this->view->campos = $this->model->consultarCampos($id);

		$this->view->title = 'Editar Ficha';
		
		$this->view->render('header');
		$this->view->render('fichas/edit');
		$this->view->render('footer');
	}
	
	
	public function delete()
	{
		$fichaId = $_POST['fichaId'];
		$this->model->delete($fichaId);
		header('location: ' . URL . 'fichas');
	}

	public function deleteByGame($idJogo)
	{
		$this->model->deleteByGame($idJogo);
	}

	/* Metodo para alterar o nome da ficha
	 * Recebe o id e novo nome da ficha 
	 */
	public function editName() 
	{
		$id = $_POST['id'];
		$nome = $_POST['name'];

		$data = array(
			'nome' => $nome
		 );
	   
		$this->model->editName($data, $id);
	}

	/* Metodo para trazer todos os campos de uma ficha 
	* Verifica o id do jogo pela sessão 
	* Retorna um json com todos os campos da ficha
	*/
	public function listFields(){
		$gameId = $_SESSION['jogoid'];

		if(empty($gameId)) {
			return false;
		}

		$card = $this->model->fichasList();
		if (!empty($card)) {
			$cardId = $card[0]["id"];
			$fields = $this->model->searchFieldsAndContentByCardId($cardId);
			if (empty($fields)) {
				$fields = $this->model->consultarCampos($cardId);
			}
			$json = json_encode($fields);
			echo $json;
		}
	}

	/* Metodo para salvar as informações da ficha 
	* Recebe a lista de campos prenchidos via post
	* Verifica o id do jogo pela sessão 
	* Verifica o id do usuario pela sessão 
	*/
	public function fillCard(){
		$gameId = $_SESSION['jogoid'];
		$userId = $_SESSION['userid'];
		$fieldsList = $_POST['fields'];

		if(empty($gameId) || empty($userId) || empty($fieldsList) ) {
			return false;
		}

		foreach ($fieldsList as $one){
 
			$data = array(
				'id_campo' => (int)$one["id"],
				'conteudo' => $one["value"],
				'id_jogo' =>  $gameId,
				'id_usuario' =>  $userId,
			);
			
			$this->model->fillCard($data);
			unset($data);
		}
	}
	
	/* Metodo para verificar os campos da ficha e as informações preeenchidas pelo aluno 
	* Recebe o id do usuario (aluno)
	* Verifica o id do jogo pela sessão 
	*/
	public function cardReport()
	{
		$gameId = $_SESSION['jogoid'];
		$userId =  $_POST['userId'];

		if(empty($gameId) || empty($userId)) {
			return false;
		}

		$report = $this->model->generateCardReport($gameId,$userId);
		$json = json_encode($report);
		echo $json;

	}
}

