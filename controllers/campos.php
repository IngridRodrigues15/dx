<?php

class Campos extends Controller {

	public function __construct() {
		parent::__construct();
		Auth::handleLogin();
	}
	
	public function create() 
	{
		$listaCampos = $_POST['listaCampos'];
		$fichaid = $_SESSION['fichaid'];

		$this->model->deleteByFicha($fichaid);

		foreach ($listaCampos as $res){
			var_dump($res);

			if($res["tipo"] == "numeric"){
				$tipo = "n";
			} else if($res["tipo"]  == "string"){
			   $tipo = "s"; 
			}

		   /* if($jedit == "true"){
				$jedit = 1;
			} else {
			   $jedit = 0;
			}

			if($medit == "true"){
				$medit = 1;
			} else {
			   $medit = 0;
			}

			if($redit == "true"){
				$redit = 1;
			} else {
			   $redit = 0;
			}*/

			$jedit = 0;
			$medit = 0;
			$redit = 0;

			$data = array(
				'nome' => $res["nome"],
				'tipo' => $tipo,
				'jedit' => $jedit,
				'medit' => $medit,
				'redit' => $redit,
				'ordem' => $res["ordem"],
			 );
			$this->model->create($data);
		}
	}
}




