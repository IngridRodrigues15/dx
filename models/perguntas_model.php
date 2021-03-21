<?php

class Perguntas_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* Busca as perguntas de acordo com o id do jogo */
	public function searchQuestionByGame($gameId)
	{
		return $this->db->select('SELECT * FROM pergunta WHERE id_jogo = :jogoid', 
				array('jogoid' => $gameId));
	}

	/* Busca as perguntas de que não foram respondidas */
	public function searchQuestionNotAnswered($gameId)
	{   
	   $answered = $this->db->select('SELECT id_pergunta FROM pergunta_jogador WHERE id_jogo = :jogoid AND id_usuario = :usuarioid', 
				array('jogoid' => $gameId,
					  'usuarioid' => $_SESSION['userid']
				));
	 
 
	   if (empty($answered)) {
			return $this->db->select('SELECT * FROM pergunta WHERE id_jogo = :jogoid', 
				array('jogoid' => $gameId));
		} else {
			$answeredIds = array();
			foreach ($answered as $index => $value) { 
				array_push ($answeredIds, $value["id_pergunta"]);
			}
   
			$placeHolders = implode(', ', array_fill(0, count($answeredIds), '?'));
			array_unshift($answeredIds, $gameId);

			return $this->db->selectWithoutParamtersKeys('SELECT * FROM pergunta WHERE id_jogo = ? and id NOT IN ('.$placeHolders .') ', 
			   $answeredIds);
		}
	}

	/* Busca as perguntas respondidas
	* com base no id do jogo e do usuario
	*/
	public function searchQuestionAnswered($gameId,$userId)
	{

		return $this->db->select('SELECT pergunta_jogador.id_pergunta, pergunta_jogador.id_resposta, pergunta.texto as pergunta_texto, respostas.texto as resposta_texto, respostas.resp_cert FROM pergunta_jogador, pergunta, respostas WHERE pergunta_jogador.id_jogo = :jogoid AND pergunta_jogador.id_usuario = :usuarioid AND pergunta_jogador.id_pergunta = pergunta.id AND pergunta_jogador.id_resposta = respostas.id_resposta', 
				array('jogoid' => $gameId,
					  'usuarioid' => $userId
				));
	}

	
	public function editQuestion($question)
	{
		$data = array('texto' => $question->text);

		$this->db->update('pergunta',$data , 
				"`id` = '".$question->id."'");

		return $question->id;
	}
	
	/* Cria a pergunta de acordo com o texto e id do jogo */
	public function createQuestion($data)
	{    
		$this->db->insert('pergunta', array(
			'texto' => $data->text,
			'id_jogo' => $_SESSION['jogoid']
		));

		$id = $this->db->lastInsertId();
		return $id;
	}

	/* Deleta todas as respostas de uma pergunta */
	public function deleteAnswersByQuestion($idQuestion)
	{
		$this->db->delete('respostas', " `id_pergunta` = '".$idQuestion."'");        
	}

	/* Insere respostas para uma pergunta */
	public function createAnswers($data)
	{
		$this->db->insert('respostas', array(
			'id_pergunta' => $data['id_pergunta'],
			'texto' => $data['texto'],
			'resp_cert' => $data['resp_cert']
		));
	}

	/* Consulta a lista de respostas pelo id da pergunta */
	public function searchAnswersByQuestion($questionId)
	{
		return $this->db->select('SELECT * FROM respostas WHERE id_pergunta = :questionId', 
			array('questionId' => $questionId));
	}

	/* Insere a resposta para uma pergunta, de acordo com o jogo e usuario */
	public function saveAnswerByQuestion($data)
	{
		$this->db->insert('pergunta_jogador', array(
			'id_pergunta' => $data['id_pergunta'],
			'id_resposta' => $data['id_resposta'],
			'id_usuario' => $data['id_usuario'],
			'id_jogo' => $data['id_jogo']
		));
	}

}



