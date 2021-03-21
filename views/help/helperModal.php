

<div class="modal fade" id="helperModal" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Ajuda</h4>
			</div>
			<div class="modal-body">
				<div class="hide" id="gameHelper">
					<span>Para criar um jogo é necessario : </span>
					<ul>
						<li>Digitar o nome </li>
						<li>Escolher o tipo </li>
						<li>Clicar em criar </li>
					</ul>
					<span>Para editar o nome de um jogo clique no icone de lápis ao lado do nome</span>
					<span>Para iniciar um jogo, ou editar seus componentes, basta clicar no jogo desejado na listagem </span>
				</div>

				<div class="hide" id="gameEditHelper">
					<span>Este é o menu principal do jogo atual<br/>
					Aqui você pode inciar o jogo clicando em INICIO ou editar suas preferências do jogo atual com as opções:</span>
					<ul>
						<li>FICHAS: Vá para o menu de edição de fichas para alterar sua ficha do seu jogo</li>
						<li>PERGUNTAS: Vá para o menu de perguntas para incluir novas perguntas, edita-las ou excluí-las</li>
						<li>TABULEIRO: Nesse menu você poderá criar, editar e excluir os tabuleiros do seu jogo bem como atribuir um deles para ser utilizado na proxima vez que iniciar seu jogo</li>
					</ul>
				</div>

				<div class="hide" id="activeGameHelper">
					<span>Ao jogar o aluno deverá :</span>
					<ul>
						<li>Prencher a ficha e clicar em salvar </li>
						<li>Rolar o dado para começar </li>
						<li>Ao sair em uma casa com sorteio de pergunta o aluno devera responder, se ele acertar avançará a quantidade de casas no dado, se ele errar ficará no mesmo ponto</li>
						<li>O jogo terminar ao chegar na ultima casa</li>
					</ul>
					<span>O professor poderá acompanhar o andamento do jogo no relatório ao lado do tabuleiro</span>
					<span>Bom jogo!</span>
				</div>

				<div class="hide" id="cardHelper">
					<session>
						<div class="title">Para que serve a ficha ? </div>
						<span>A ficha irá aparecer para todos os seus alunos, como os campos que você colocar (exemplo: nome,turma,sala)</span>
					</session>
					<session>
						<div class="title">Como posso editar ? </div>
						<span>Para escolher os campos da ficha é necessario selecionar a ficha na listagem </span>
						<span>Na tela de edição você poderá:</span>
							<ul>
								<li>Criar novos campos de texto, utilizados para informaçoes como nome,email etc </li>
								<li>Criar novos campos de numericos, utilizados para informaçoes como numero,turma etc  </li>
							</ul>
					</session>
					<session>
						<div class="title">Criando campos ...  </div>
						<span>Para criar um campo é necessario selecionar se é um campo numerico ou textual, digitar o nome do campo e clicar em criar campo</span>
					</session>
					<session>
						<div class="title">Editando campos ...  </div>
						<span>Para editar o campo é so clicar no botão <i class="fa fa-pencil" aria-hidden="true"></i> ao lado do campo, as informações desse campo irão pra o painel ao lado da ficha, onde é possivel editar-las </span>
					</session>
					<session>
						<div class="title">Excluindo campos ...  </div>
						<span>Para excluir o campo é so clicar no botão <i class="fa fa-trash" aria-hidden="true"></i> ao lado do campo </span>
					</session>
					<session>
						<div class="title">Não se esqueça de salvar</div>
						<span>Não se esquça de clicar no botão salvar no final da ficha </span>
					</session>
				</div>

				<div class="hide" id="mapHelper">
					<session>
						<div class="title">Criando um tabuleiro </div>
						<span>Para criar um tabuleiro é necesario, dgitar o nome e clicar no botão criar, você será redirecionado para a tela de escolha da imagem</span>
					</session>
					<session>
						<div class="title">Editando um tabuleiro </div>
						<span>Após escolher um mapa na listagem, as opções são:</span>
							<ul>
								<li><i class="fa fa-picture-o"></i> Trocar a imagem do tabuleiro </li>
								<li><i class="fa fa-map-marker"></i> Criar ou excluir casas no tabuleiro</li>
								<li><i class="fa fa-pencil"></i> Editar o nome do tabuleiro</li>
								<li><i class="fa fa-eye"></i> Preview do tabuleiro</li>
								<li><i class="fa fa-trash"></i> Excluir o tabuleiro </li>
							</ul>
					</session>
					<session>
						<div class="title">Definindo um tabuleiro como principal</div>
						<span>O tabuleiro principal é o tabuleiro que será exibido para os seus alunos</span>
					</session>
				</div>

				<div class="hide" id="mapEditHelper">
					<session>
						<div class="title">Criando casas</div>
						<span>Para criar um casas, é só clicar no ponto da iamgem que você gostaria que fosse uma casa, e confirmar, em seguida será exibido um modal para você definir as informações da casa</span>
					</session>
					<session>
						<div class="title">Informações das casas </div>
						<span>As informações necessarias para criar uma casa no tabuleiro são:</span>
							<ul>
								<li>Nome da casa </li>
								<li>Descrição (opcional)</li>
								<li>Sorteio de pergunta: Clique na flag se você gostaria de que fosse sorteada uma pergunta para o aluno naquela casa</li>
							</ul>
					</session>
					<session>
						<div class="title">Definindo a ordem das casas</div>
						<span>No painel lateral, é possivel definir a ordem das casas, para isso é só arrastar os blocos que representam as casas</span>
					</session>
					<session>
						<div class="title">Não se esqueça de salvar</div>
						<span>Não se esqueça de clicar no botão salvar no painel lateral </span>
					</session>
				</div>

				<div class="hide" id="questionHelper">
					<session>
						<div class="title">Criando perguntas</div>
						<span>Para criar uma pergunta, é so clicar no botão de adicionar pergunta, e definir o enunciado da pergunta,as 5 respostas, e qual delas é a certa clicando na flag ao lado da resposta</span>
					</session>
					<session>
						<div class="title">Editando perguntas</div>
						<span>Para editar uma pergunta, é so clicar na pergunta na listagem, e definir o enunciado da pergunta,as 5 respostas, e qual delas é a certa clicando na flag ao lado da resposta</span>
					</session>
				</div>
			</div>
		</div>
	</div>
</div>