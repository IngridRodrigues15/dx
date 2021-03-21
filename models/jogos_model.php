<?php

class Jogos_Model extends Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function jogoLista()
	{
		return $this->db->select('SELECT * FROM jogo WHERE id_usuario  = :userid', 
				array('userid' => $_SESSION['userid']));
	}
	
	public function create($data)
	{
		$this->db->insert('jogo', array(
			'id_usuario' => $_SESSION['userid'],
			'nome' => $data['nome'],
			'tipo' => $data['tipo']
		));

		$data = array( 'id' => $this->db->lastInsertId());
		return $data;
	}

	public function delete($id)
	{
		$this->db->delete('jogo', " `id` = '".$id."'");  
	}

	/* Metodo para alterar o nome do jogo
	 * Recebe o novo nome e o id do jogo
	*/
	public function editName($data, $idjogo)
	{
		
		$this->db->update('jogo', $data, 
				"`id` = '".$idjogo."'");
	}
	
	public function searchGameById($jogoid)
	{   
		
		return $this->db->select('SELECT * FROM jogo WHERE id_usuario = :userid AND id = :jogoid', 
			array('userid' => $_SESSION['userid'], 'jogoid' => $jogoid));
		
	}

	/* Procura pelo mapa principal de um jogo de acordo com seu id*/
	public function searchMapByGameId($gameId)
	{   
		$map = $this->db->select('SELECT * FROM mapa WHERE id_jogo = :jogoid AND principal = :principal', 
			array('jogoid' => $gameId, 'principal' => 1));
		
		if (empty($map[0])) {
			$map = $this->db->select('SELECT * FROM mapa WHERE id_jogo = :jogoid', 
			array('jogoid' => $gameId));
		}
		 return $map;
		
	}

	/* Busca todos os jogos ativos no momento e os mestres que os criaram */
	public function jogosAtivos()
	{
		return $this->db->select('
			SELECT
				J.id,
				J.nome as jogoativo,
				U.nome as mestre
			FROM
				jogo J,
				usuario U
			WHERE
				U.id = J.id_usuario'
		);
		//U.id = J.id_usuario AND J.ativo = 1
	}

	// Metodo para gerar o relatorio de alunos 
	public function generateReport($gameId) 
	{
		return $this->db->select('
			SELECT
				U.id,
				U.nome,
				U.email,
				COUNT(PJ.id_pergunta) AS qtdPerguntas,
				Sum(R.resp_cert) AS acertos
			FROM
				usuario U,
				pergunta_jogador PJ,
				respostas R
			WHERE
				U.id = PJ.id_usuario AND PJ.id_jogo = :gameId AND PJ.id_resposta=R.id_resposta GROUP BY U.id', 
			array('gameId' => $gameId));
	}


}