<?php

class Logout extends Controller {

    function __construct() {
        parent::__construct();    
    }
    
    function index() 
    {    
        session_destroy();
        header('location: '. URL . 'login');
        exit;
    }
    
    function run()
    {
        $this->model->run();
    }
    

}