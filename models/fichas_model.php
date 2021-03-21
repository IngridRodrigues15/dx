<?php

class Fichas_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fichasList()
	{
		return $this->db->select('SELECT * FROM fichas WHERE id_jogo = :jogoid', 
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

	public function fichaSingleList()
	{
		return $this->db->select('SELECT * FROM fichas WHERE id_jogo = :jogoid AND id = :fichaid', 
			array('jogoid' => $_SESSION['jogoid'], 'fichaid' => $_SESSION['fichaid']));
	}
	
	public function create($data)
	{
		$this->db->insert('fichas', array(
			'nome' => $data['nome'], 
			'id_jogo' => $data['id_jogo']
		));
	}
	
	public function consultarCampos($fichaid)
	{
		return $this->db->select('SELECT * FROM campos WHERE id_ficha = :fichaid', 
			array('fichaid' => $fichaid));
	}

	public function searchFieldsAndContentByCardId($cardId)
	{

		$userid = $_SESSION['userid'];

		return $this->db->select('SELECT * FROM campos, jogador_ficha_campos WHERE campos.id_ficha = :fichaid AND jogador_ficha_campos.id_campo = campos.id and jogador_ficha_campos.id_usuario = :userId ', 
			array('fichaid' => $cardId, 'userId' => $userid));
	}
   /* public function editSave($data)
	{
		$postData = array(
			'title' => $data['title'],
			'content' => $data['content'],
		);
		
		$this->db->update('note', $postData, 
				"`noteid` = '{$data['noteid']}' AND userid = '{$_SESSION['userid']}'");
	}*/
	
	public function delete($id)
	{
		$this->db->delete('campos', " `id_ficha` = '".$id."'");
		$this->db->delete('fichas', " `id` = '".$id."'");
		
	}

	public function deleteByGame($id)
	{
		$this->db->delete('fichas', " `id_jogo` = '".$id."'");
	}

	/* Metodo para alterar o nome da ficha
	 * Recebe o id e novo nome da ficha 
	 */
	public function editName($data, $idficha)
	{

		$this->db->update('fichas', $data, 
				"`id` = '".$idficha."'");
	}

	/* Metodo para inserir o preenchimento da ficha (jogador_ficha_campos) */  
	public function fillCard($data)
	{
		$values = $this->db->select('SELECT * FROM jogador_ficha_campos WHERE id_jogo = :jogoid AND id_usuario = :usuarioid AND id = :campoid ', 
			array('jogoid' => $data['id_jogo'], 'usuarioid' => $data['id_usuario'],  'campoid' => $data['id_campo']));
		
		var_dump($data);
		var_dump($values);
		$countValues = count($values);
	
		if ($countValues > 0 ) {
			$updateValues['conteudo'] = $data['conteudo'];
			$this->db->update('jogador_ficha_campos', $updateValues, 
				"`id` = '{$data ['id_campo']}'");
		} else {
			$this->db->insert('jogador_ficha_campos', array(
				'id_campo' => $data['id_campo'],
				'id_jogo' => $data['id_jogo'],
				'id_usuario' => $data['id_usuario'],
				'conteudo' => $data['conteudo']
			));
		}
	}

	// Metodo para buscar a ficha do jogo
	// Recebe id do jogo
	public function findCardByGame($gameId) 
	{
		return $this->db->select('SELECT id FROM fichas WHERE id_jogo = :gameId', 
			array('gameId' => $gameId));	
	}

	// Metodo para gerar o relatorio de campos da ficha e as informações que foram preenchidas 
	// Recebe id do jogo, e id do usuario
	public function generateCardReport($gameId,$userId) 
	{
		$card = $this->findCardByGame($gameId);
		$card = $card[0];

		if (empty($card['id'])) {
			return false;
		}

		return $this->db->select('
			SELECT
				C.id,
				C.nome,
				C.tipo,
				JFC.conteudo
			FROM
				jogador_ficha_campos JFC,
				campos C
			WHERE
				C.id_ficha = :cardId AND
				JFC.id_campo = C.id And
				JFC.id_usuario = :userId', 
			array('userId' => $userId,
				'cardId' => $card['id']));
	}
}



