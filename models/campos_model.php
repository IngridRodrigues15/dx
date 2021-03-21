<?php

class Campos_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

     public function consultarCampos($data)
    {
         $fichaid = $_SESSION['fichaid'];
         
         if (!is_null($fichaid)){
            return $this->db->select('SELECT COUNT(1) AS registros FROM campos WHERE id_ficha = :fichaid AND nome = :nome AND tipo = :tipo ' , 
            array('fichaid' => $fichaid,
                'nome' => $data['nome'],
                'tipo' => $data['tipo'],
                'jedit' => $data['jedit'],
                'medit' => $data['medit'],
                'redit' => $data['redit'])); 
         } 
    }
    
    public function consultarCamposId($fichaId)
    {         
         if (!is_null($fichaId)){
            return $this->db->select('SELECT nome,tipo FROM campos WHERE id_ficha = :fichaid ' , 
            array('fichaid' => $fichaId )); 
         } 
    }
    
    public function create($data)
    {
        $fichaId = $_SESSION['fichaid'];
       /* $regNum = $this->consultarCampos($data);
        $numRegistros = intval($regNum[0]["registros"]);
        
        if ($numRegistros == 0){*/
            $this->db->insert('campos', array(
                'id_ficha' => $fichaId,
                'nome' => $data['nome'],
                'tipo' => $data['tipo'],
                'jedit' => $data['jedit'],
                'medit' => $data['medit'],
                'redit' => $data['redit'],
                'ordem' => $data['ordem'],
            ));
       // } 
    }
    
    public function delete($registro)
    {  
        $this->db->delete('campos', " `nome` = '".$registro['nome']."' AND `tipo` = '".$registro['tipo']."' AND `id_ficha` = '".$_SESSION['fichaid']."'");
    }

    public function deleteByFicha($fichaId)
    {  
        $this->db->delete('campos', " `id_ficha` = '".$fichaId."'");
    }
}



