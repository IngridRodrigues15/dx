<?php

class User_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function userList()
    {
        return $this->db->select('SELECT id, email, tipo FROM usuario');
    }
    
    public function userSingleList($id)
    {
        return $this->db->select('SELECT id, email, tipo FROM usuario WHERE id = :userid', array(':userid' => $id));
    }
    
    public function create($data)
    {
        $this->db->insert('usuario', array(
            'nome' => $data['nome'],
            'data_nascimento' => $data['data_nascimento'],
            'tipo' => $data['tipo'],
            'sexo' => $data['sexo'],
            'email' => $data['email'],
            'senha' => $data['password']
        ));
    }
    
    public function editSave($data)
    {
        $postData = array(
            'email' => $data['email'],
            'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'tipo' => $data['tipo'],
            'data_nascimento' => $data['DataNasc'],
            'sexo' => $data['sexo'],
            'nome' => $data['nome']   
        );
        
        $this->db->update('user', $postData, "`id` = {$data['id']}");
    }
    
    public function delete($userid)
    {
        $result = $this->db->select('SELECT role FROM user WHERE userid = :userid', array(':userid' => $userid));

        if ($result[0]['role'] == 'owner')
        return false;
        
        $this->db->delete('user', "userid = '$userid'");
    }
}