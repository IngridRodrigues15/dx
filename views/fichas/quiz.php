

<div class="container">
    
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#fichas-list">Fichas</a></li>
                <li><a href="<?php echo URL;?>mapas">Tabuleiro</a></li>
                <li><a href="<?php echo URL;?>perguntas">Perguntas</a></li>
            </ul>
        </div>
    </div>   
    <input type="hidden" class="helper" value="cardHelper">
    <div class="painel" id="fichas-list">
        <div class="row">
            <div class="col-md-12">
                <div class="painel-list">
                    <p>Selecione a ficha para editar</p>
                    <?php
                        echo '<ul>';
                        foreach($this->fichaLista as $key => $value) {
                            echo '<li>';
                            echo '<a href="'. URL . 'fichas/edit/' . $value['id'].'">'. $value["nome"] .'</a>';
                            echo '<a class="editar-ficha-icone" href="'. URL . 'fichas/edit/' . $value['id'].'"><i class="fa fa-file-text-o" aria-hidden="true"></i></a>';
                            echo '<a class="alterCardNameIcon" data-name="'.$value['nome'].'" data-id="'.$value['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                            echo '</li>';
                        }
                        echo '</ul>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="alterCardNameModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Alterar nome da ficha</h4>
            </div>
            <div class="modal-body">
                <div class="cardForm">
                    <input type="hidden" id="cardId" name="cardId">
                    <label for="cardName">Nome</label> 
                    <input type="text" id="cardName" name="cardName" placeholder="Nome da ficha"><br/>
                    <button id="altercardName" data-dismiss="modal" aria-label="Close">Alterar Nome</button><br/><br/>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="back-button">
    <a href="<?php echo URL; ?>jogos/" class="back-link">
      <i class="fa fa-arrow-left"></i>
      <span class="back-text">Voltar</span>
    </a>
</div>