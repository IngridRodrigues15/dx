<?php

class Cadastro_Model extends Model
{
	public function create($data)
    {
        $this->db->insert('usuario', array(
            'nome' => $data['nome'],
            'data_nascimento' => $data['data_nascimento'],
            'tipo' => $data['tipo'],
            'sexo' => $data['sexo'],
            'email' => $data['email'],
            'senha' => $data['senha']
        ));
    }
}