<?php

class Player_Model 
{
	public function __construct()
	{	
		$name = 'rpg2';
		$host = 'localhost';
		$port = '3306';
		$user = 'dx';
		$pass = 'dx';
		$dbh  = new PDO('mysql:dbname='.$name.';host='.$host.';port='.$port,$user,$pass);
		$this->dbh = $dbh;
	}


	public function playersListStatus($gameId)
	{
		if (!empty($gameId)) {
			$stmt = $this->dbh->prepare("SELECT estado_jogador.id,estado_jogador.id_usuario,estado_jogador.id_jogo,estado_jogador.id_ponto_mapa_atual,usuario.email FROM estado_jogador JOIN usuario ON (estado_jogador.id_usuario=usuario.id)  WHERE estado_jogador.id_jogo = :gameId;");
			$stmt->bindParam(':gameId', $gameId); 
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
	}

	public function playersInsertStatus($gameId,$userId,$pointId)
	{
		if (empty($gameId) || empty($userId) || empty($pointId)) {
			return false;
		} 
		$this->playersDeleteStatus($gameId,$userId);

		try {
			$stmt = $this->dbh->prepare('INSERT INTO estado_jogador (`id_usuario`, `id_jogo`, `id_ponto_mapa_atual`) VALUES(:user,:game,:pointId)');
			$stmt->execute(array(
			':user' => $userId,':game' => $gameId,':pointId' => $pointId
			));

			return $stmt->rowCount(); 
		} catch(PDOException $e) {
 			 return 'Error: ' . $e->getMessage();
		}
		
	}

	public function playersDeleteStatus($gameId,$userId) 
	{
		try {
			$stmt = $this->dbh->prepare('DELETE FROM estado_jogador WHERE id_usuario = :userId and id_jogo = :gameId');
			$stmt->bindParam(':userId', $userId);
			$stmt->bindParam(':gameId', $gameId); 
			$stmt->execute();

			return $stmt->rowCount(); 
		} catch(PDOException $e) {
			return 'Error: ' . $e->getMessage();
		}
		
	}

	public function salvarUpload($data, $idmapa)
	{
		$this->db->update('mapa', $data, 
				"`id` = '".$idmapa."'");
	}
	

	
	
}