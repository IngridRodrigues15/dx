<?php
	
	class cadastro extends Controller{
		function __construct() {
			parent::__construct();    
		}
		
		function index() 
		{    
			$this->view->title = 'Cadastro';
			
			$this->view->render('cadastro/index');
		}

		public function register() 
		{
			$data = array(
				'nome' => $_POST['nome'],
				'data_nascimento' => $_POST['nasc'],
				'email' => $_POST['email'],
				'senha' => $_POST['password'],
				'sexo' => $_POST['sexo'],
				'tipo' => $_POST['tipo'],
				);
			$this->model->create($data);
			header('location: ' . URL . 'login');
		}
		
	}	
?>