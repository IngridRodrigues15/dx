<?php

class Dados extends Controller {

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }
    
    public function index() 
    {    
        $this->view->title = 'Dado';
        $this->view->dadosLista = $this->model->dadosList();        
        $this->view->render('header');
        $this->view->render('dados/index');
        $this->view->render('footer');
    }
    
    public function create() 
    {
        $data = array(
            'nome' => $_POST['nomeDado'],
            'num_lados'=> $_POST['numLados']
         );
        $this->model->create($data);
        $this->index();
    }

    public function edit() 
    {
        $data = array(     
            'id' => $_POST['edt-id'],
            'nome' => $_POST['edt-nomeDado'],
            'num_lados'=> $_POST['edt-numLados']
         );
        $this->model->edit($data);
        $this->index();
    }
        
    public function delete()
    {
        $data = array(     
            'id' => $_POST['id-delete']
        );
      
        $this->model->delete($data);
        $this->index();

    }
}