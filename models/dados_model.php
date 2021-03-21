<?php

class Dados_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function dadosList()
    {
        return $this->db->select('SELECT * FROM dados WHERE id_jogo = :jogoid', 
                array('jogoid' => $_SESSION['jogoid']));
    }
    
    public function criarCampo($data){
        
        $var = $data;
       
        if(!is_null($array)){
            array_push($array, $var);
        }else{
          $array[] = $var;  
        }
        
        var_dump($array);
        die();
 
    }

    public function dadoSingleList()
    {
        return $this->db->select('SELECT * FROM dados WHERE id_jogo = :jogoid AND id = :dadoid', 
            array('jogoid' => $_SESSION['jogoid'], 'dadoid' => $_SESSION['dadoid']));
    }
    
    public function create($data)
    {
        $this->db->insert('dados', array(
            'nome' => utf8_encode($data['nome']), 
            'id_jogo' => $_SESSION['jogoid'],
            'num_lados'=>$data['num_lados']
        ));
    }
    public function edit($data)
    {
       
        $verificaId = $this->consultarDados($data['id']);
        if(!empty($verificaId)){
            $this->db->update('dados',$data,
                "`id` = '{$data['id']}'");
        }
    }
    public function delete($data){
        $verificaId = $this->consultarDados($data['id']);
        if(!empty($verificaId)){
            $this->db->delete('dados',
                "`id` = '{$data['id']}'");
        }
    } 
    public function consultarDados($id)
    {
        return $this->db->select('SELECT * FROM dados WHERE id = :id', 
            array('id' => $id));
    }
    
    
    public function consultarCampos($fichaid)
    {
        return $this->db->select('SELECT * FROM campos WHERE id_ficha = :fichaid', 
            array('fichaid' => $fichaid));
    }
   /* public function editSave($data)
    {
        $postData = array(
            'title' => $data['title'],
            'content' => $data['content'],
        );
        
        $this->db->update('note', $postData, 
                "`noteid` = '{$data['noteid']}' AND userid = '{$_SESSION['userid']}'");
    }
    
    public function delete($id)
    {
        $this->db->delete('note', "`noteid` = {$data['noteid']} AND userid = '{$_SESSION['userid']}'");
    }*/
}