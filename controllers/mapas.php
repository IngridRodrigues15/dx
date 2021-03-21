<?php

class Mapas extends Controller {

	public function __construct() {
		parent::__construct();
		Auth::handleLogin();
	}
	
	public function index() 
	{	 
		$this->view->title = 'Mapa';
		$this->view->mapaLista = $this->model->mapasList();
		$gameType = $_SESSION['jogotipo'];

		if (empty($gameType)) {	
			$this->view->render('header');
			$this->view->render('mapas/index');
			$this->view->render('footer');
		} else {
			$this->view->render('header');
			$this->view->render('mapas/quiz');
			$this->view->render('footer');
		}
	}
	
	/* Metodo para fazer o upload da imagem do mapa 
     * Recebe o id do mapa via session
     * E a iamgem via files
     * Cria um nome aleatorio para a imagem 
     * Salva o nome da imagem na tabela mapa coluna caminho
     * Salva a imagem na pasta upload
     */
	public function upload() 
	{	 
		$id = $_SESSION['mapaid'];

		if (isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0) {

			$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
			$nome = $_FILES['arquivo']['name'];
	 
			// Pega a extensao
			$extensao = strrchr($nome, '.');
 
			// Converte a extensao para mimusculo
			$extensao = strtolower($extensao);

			// Somente imagens, .jpg;.jpeg;.gif;.png
			// Aqui eu enfilero as extesões permitidas e separo por ';'
			// Isso server apenas para eu poder pesquisar dentro desta String
			if(strstr('.jpg;.jpeg;.gif;.png', $extensao)){
				// Cria um nome único para esta imagem
				// Evita que duplique as imagens no servidor.
				$novoNome = md5(microtime()) . $extensao;
				var_dump(UPLOAD);
				
				// Concatena a pasta com o nome
				$destino = UPLOAD . $novoNome;
		 
				// tenta mover o arquivo para o destino
				if( @move_uploaded_file( $arquivo_tmp, $destino  )){
					$msg="Arquivo salvo com sucesso";

				}else{
					$msg="Erro ao salvar o arquivo";
				}
			}else{
				$msg="Formato do arquivo invalido ";
			}

			$data = array(
			'endereco' => $novoNome,
			);


			$this->view->title = 'Mapa';
			$this->model->salvarUpload($data, $id);
			$this->view->mapaDados = $this->model->mapaConsultaporId($id);
			$this->view->msg = $msg;
			header('location: ' . URL . 'mapas/edit/'.$id);
		} else {
			$this->view->render('header');
			$this->view->render('mapas/imagem');
			$this->view->render('footer');

		}
	}

	/* Metodo para enviar para a pagina de mudar a imagem do mapa
	 * Recebe o id do mapa e salva em sessão 
	 */
	public function changeImage($mapId) 
	{
		if (is_numeric($mapId)) {
			$map = $this->model->mapaConsultaporId($mapId);
			if (empty($map)) {
				return null;
			}

			Session::set('mapaid', $mapId);

			$this->view->title = 'Mapa Imagem';
			$this->view->mapaDados = $mapId;
			$this->view->render('header');
			$this->view->render('mapas/imagem');
			$this->view->render('footer');
		}
	}

	public function create() 
	{
		$data = array(
			'nome' => $_POST['nome']
		);

		$result = $this->model->create($data);

		if (is_numeric($result["id"])) {
		   Session::set('mapaid', $result["id"]); 
		}
		echo json_encode($result);
	}


	public function createPoints()
	{
		$pointsList = $_POST['pointsList'];
		$idmapa = $_SESSION['mapaid'];


		if(!is_null($pointsList) && !is_null($idmapa)){
			$this->model->deletarPontosPorMapa($idmapa);
			foreach ($pointsList as $res){
				$dispararPergunta = 0;
				if ($res["dispararPergunta"] == "true") {
					$dispararPergunta = 1;
				}
				$ordem = $res["ordem"];
				if(is_null($ordem)) {
					$ordem = 0;
				}

				$data = array(
					'id_mapa' => $idmapa,
					'nome' => $res["nome"],
					'texto' => $res["descricao"],
					'submapa' => $res["idsubmapa"],
					'coordenadas' => $res["ponto"],
					'ordem' => $ordem,
					'disparar_pergunta' => $dispararPergunta,
				);
				$this->model->createPoints($data);
			}
		}
	}

	public function edit($id) 
	{
		if (is_numeric($id)) {
		   Session::set('mapaid', $id); 
		}
		$this->view->mapaDados = $this->model->mapaConsultaporId($id);
		$this->view->pontosMapa = $this->model->consultarPontos($id);
		$this->view->submapaLista = $this->model->mapasList();

		$this->view->title = 'Editar Mapa';
		
		$this->view->render('header');
		$this->view->render('mapas/edit');
		$this->view->render('footer');
	}

	/* Metodo chamado na listagem de mapas
	 * Recebe o id do mapa
	 * Consulta as informacoes do mapa e de seus pontos 
	 * Retorna a tela de visualização (preview) do mapa
	 */
	public function preview($id) 
	{
		if (is_numeric($id)) {
		   Session::set('mapaid', $id); 
		}
		$this->view->mapaDados = $this->model->mapaConsultaporId($id);
		$this->view->pontosMapa = $this->model->consultarPontos($id);
		$this->view->submapaLista = $this->model->mapasList();

		$this->view->title = 'Preview Mapa';
		
		$this->view->render('header');
		$this->view->render('mapas/preview');
	}

	/* Metodo para trazer todos os pontos de um mapa 
     * Verifica o id do mapa pela sessão 
     * Retorna um json com todos os pontos do mapa
     */
	public function listPoints(){
		$id = $_SESSION['mapaid'];

		$listPoints = $this->model->consultarPontos($id);
		$json = json_encode($listPoints);
		echo $json;
	}

	/* Metodo para alterar o nome da ficha
     * Recebe o id e novo nome da ficha 
     */
    public function editName() 
    {
        $id = $_POST['id'];
        $nome = $_POST['name'];

        $data = array(
            'nome' => $nome
         );
       
        $this->model->editName($data, $id);
    }

	/* Metodo para alterar o mapa principal do jogo
	* Recebe o id do mapa 
	* Pega a sessao com o id do jogo 
	*/
	public function changeDefaultMap() 
	{
 		$mapId = $_POST['mapId'];
		$gameId = $_SESSION['jogoid'];

		$this->model->removeDefaultMapByGame($gameId);
		$this->model->defineDefaultMap($mapId);
	}

	public function delete()
	{
		$id = $_POST['mapaId'];
		$result  = $this->model->delete($id);
		return json_encode($result);
	}

}