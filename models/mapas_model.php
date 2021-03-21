<?php

class Mapas_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function mapasList()
	{
		return $this->db->select('SELECT * FROM mapa WHERE id_jogo = :jogoid', 
				array('jogoid' => $_SESSION['jogoid']));
	}

	public function salvarUpload($data, $idmapa)
	{
		
		$this->db->update('mapa', $data, 
				"`id` = '".$idmapa."'");
	}
	
	public function mapaConsultaporId($mapaId)
	{
		return $this->db->select('SELECT * FROM mapa WHERE id_jogo = :jogoid AND id = :mapaId', 
			array('jogoid' => $_SESSION['jogoid'], 'mapaId' => $mapaId));
	}
	
	
	public function mapaConsultaUltimo()
	{
		return $this->db->select('SELECT id FROM mapa WHERE id_jogo = :jogoid order by id desc limit 1', 
			array('jogoid' => $_SESSION['jogoid']));
	}
	
	public function create($data)
	{
		$this->db->insert('mapa', array(
			'nome' => $data['nome'],
			'id_jogo' => $_SESSION['jogoid']
		));

		$data = array( 'id' => $this->db->lastInsertId());
		return $data;
		
	}
	

	public function createPoints($data)
	{
		$this->db->insert('pontomapa', array(
			'id_mapa' => $data['id_mapa'],
			'nome' => $data['nome'],
			'texto' => $data['texto'],
			'submapa' => $data['submapa'],
			'coordenadas' => $data['coordenadas'],
			'ordem' => $data['ordem'],
			'disparar_pergunta' => $data['disparar_pergunta'],
		));

	}

	public function consultarPontos($mapaId)
	{
		return $this->db->select('SELECT * FROM pontomapa WHERE id_mapa = :mapaId', 
			array('mapaId' => $mapaId));
	}

	public function delete($idmapa)
    {
    	$this->deletarPontosPorMapa($idmapa);
        $this->db->delete('mapa', " `id` = '".$idmapa."'");  

        return true;      
    }

	public function deletarPontosPorMapa($idmapa)
    {
        $this->db->delete('pontomapa', " `id_mapa` = '".$idmapa."'");        
    }

    /* Metodo para alterar o nome do mapa
     * Recebe o novo nome e o id do mapa 
     */
    public function editName($data, $idmapa)
    {
        
        $this->db->update('mapa', $data, 
                "`id` = '".$idmapa."'");
    }

	/* Metodo para remover o mapa principal por jogo
	* Todos os mapas passam a ter a coluna principal como 0
	*/
	public function removeDefaultMapByGame($idgame)
	{
		$dataRemoveDefaultMap = array(
			'principal' => 0
		);

		$this->db->update('mapa', $dataRemoveDefaultMap, 
			"`id_jogo` = '".$idgame."'");       
	}

	/* Metodo para para definir um mapa principal
	*  Recebe o id do mapa 
	*  O mapa escolhido passa a ser o principal
	*/
	public function defineDefaultMap($idmap)
	{
		$dataSetDefaultMap = array(
			'principal' => 1
		);

		$this->db->update('mapa', $dataSetDefaultMap, 
			"`id` = '".$idmap."'");
	}
}