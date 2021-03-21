<?php

//require_once('fichas.php');


class Jogos extends Controller {

	function __construct() {
		parent::__construct();
		Auth::handleLogin();
		//$this->view->js = array('dashboard/js/default.js');
	}
	
	/*function index() 
	{    
		$this->view->title = 'Jogos';
		$this->view->jogoLista = $this->model->jogoLista();
		$this->view->render('header');
		$this->view->render('jogos/index');
		$this->view->render('footer');
	}*/

	function index() 
	{    
		if($_SESSION['userType']==1){
		$this->view->title = 'Jogos';
		$jogos = $this->model->jogoLista();
		$mapas = array();
		foreach ($jogos as $jogo) {
			$jogoId = $jogo['id'];
			$mapas[$jogoId] = $this->model->searchMapByGameId($jogoId);
		}
		$this->view->jogoLista = $jogos;
		$this->view->mapaLista = $mapas;
		$this->view->render('header');
		$this->view->render('jogos/index');
		}else{
			$this->view->title = 'Jogos';
		$jogos = $this->model->jogosAtivos();
		$mapas = array();
		foreach ($jogos as $jogo) {
			$jogoId = $jogo['id'];
			$mapas[$jogoId] = $this->model->searchMapByGameId($jogoId);
			}
		$this->view->jogoLista = $jogos;
		$this->view->render('header');
		$this->view->render('jogos/connect');
		}
		$this->view->render('footer');
	}

	function connect() 
	{   
		$this->view->title = 'Jogos_ativos';
		$this->view->jogoLista = $this->model->jogosAtivos();
		$this->view->render('header');
		$this->view->render('jogos/connect');
		$this->view->render('footer');
	}

	function activePlayer($gameId) 
	{   
		
		Session::set('jogoid',$gameId);        
		$map = $this->model->searchMapByGameId($gameId);
		$this->view->map = $map;
		if (!empty($map[0])) {
			$mapId = $map[0]["id"];
			Session::set('mapaid', $mapId); 
		}
		
		$this->view->title = 'Jogos';
		$this->view->render('header');
		//$this->view->render('jogos/ativo');
		$this->view->render('jogos/ativoFicha');
		$this->view->render('footer');
	}
	
	function active() 
	{   
		$gameId = $_SESSION['jogoid'];
		$map = $this->model->searchMapByGameId($gameId);
		$this->view->map = $map;
		$mapId = $map[0]["id"];
		Session::set('mapaid', $mapId); 

		$this->view->title = 'Jogos';
		$this->view->render('header');
		//$this->view->render('jogos/ativo');
		$this->view->render('jogos/ativoFicha');
		$this->view->render('footer');
	}

	public function goActiveGamePage() 
	{
		$id = $_POST['id'];
		
		$game = $this->model->searchGameById($id);
		$this->view->jogos = $game;
		
		if (empty($game)) {
			$this->index();
			exit();
		}

		if (is_numeric($id)) {
		   Session::set('jogoid', $id);              
		}
		
		$type = $game[0]["tipo"];
		Session::set('jogotipo', $type);
		return true;
	}
	
	public function create() 
	{
		$data = array(
			'nome' => $_POST['nome'],
			'tipo' => (int)$_POST['tipo']
		 );
		$game = $this->model->create($data);

		if (!empty((int)$_POST['tipo'])) {
			$cardData = array(
				'nome' => 'Ficha',
				'id_jogo' => $game['id']
			);

			require 'fichas.php';
			$card = new Fichas();
			$card->get();
			$card->createByArray($cardData);
			unset($card);
		}
		echo json_encode($game);
	}
	
	public function edit($id) 
	{
		
		$game = $this->model->searchGameById($id);
		$this->view->jogos = $game;
		
		if (empty($game)) {
			$this->index();
			exit();
		}

		if (is_numeric($id)) {
		   Session::set('jogoid', $id);              
		}
		
		$this->view->title = 'Editar Jogo';

		$type = $game[0]["tipo"];
		Session::set('jogotipo', $type);
		if (empty($type)) {
			$this->view->render('header');
			$this->view->render('jogos/editRpg');
			$this->view->render('footer');
		} else {
			$this->view->render('header');
			$this->view->render('jogos/editQuiz');
			$this->view->render('footer');
		}
	}

	public function goEditGamePage() 
	{
		$id = $_POST['id'];
		
		$game = $this->model->searchGameById($id);
		$this->view->jogos = $game;
		
		if (empty($game)) {
			$this->index();
			exit();
		}

		if (is_numeric($id)) {
		   Session::set('jogoid', $id);              
		}

		$type = $game[0]["tipo"];
		Session::set('jogotipo', $type);
		return true;
	}

	public function delete()
	{
		$jogoId = $_POST['jogoId'];
		//$fichas = new Fichas();
		// $fichas->model->deleteByGame($jogoId);
		$this->model->delete($jogoId);

		header('location: ' . URL . 'jogos');
	}

	/* Metodo para alterar o nome do jogo
	 * Recebe o id e novo nome do jogo 
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
	
	function logout()
	{
		Session::destroy();
		header('location: ' . URL .  'login');
		exit;
	}
	
	// Metodo para gerar o relatorio de alunos 
	public function report() 
	{
		$gameId = $_SESSION['jogoid'];
		if(empty($gameId)) {
			return false;
		}
		$report = $this->model->generateReport($gameId);
		$json = json_encode($report);
		echo $json;
	}

}