<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        $sth = $this->db->prepare("SELECT id,nome,senha,tipo,email FROM usuario WHERE 
               email = :email AND senha = :password");
        $sth->execute(array(
            ':email' => $_POST['email'],
            ':password' => $_POST['password']
        ));
        
        $data = $sth->fetch();
        
        $count =  $sth->rowCount();
        if ($count > 0) {
            // login
            Session::init();
            Session::set('loggedIn', true);
            Session::set('userid', $data['id']);
            Session::set('login', $data['email']);
            Session::set('userType', $data['tipo']);
            if($data['tipo'] == 1){
                header('location: ../jogos');
            }else if($data['tipo'] == 0){
                header('location: ../jogos/connect');
            }else
                header('location: ../login');
        } else {
            header('location: ../login');
        }
        
    }
    
}