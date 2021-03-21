

<div class="container">
    
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#">Perguntas</a></li>
                <li><a href="<?php echo URL;?>fichas">Fichas</a></li>
                <li><a href="<?php echo URL;?>mapas">Tabuleiro</a></li>
            </ul>
        </div>
    </div>   
    
   <input type="hidden" class="helper" value="questionHelper">

    <div class="painel" id="questions-list">
        <div class="row">
            <div class="col-md-12">
                <div class="new-question">
                   <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#NewAnswerModal">
                        Clique aqui para criar uma nova pergunta
                    </button>
                </div>
                <div class="painel-list">
                    <p>Essas são suas perguntas, clicando nelas é possivel editar</p>
                    <?php
                        echo '<ul>';
                        foreach($this->questionsList as $key => $value) {
                            echo '<li>';
                            echo '<a class="text" href="#">'. $value["texto"] .'</a>';
                            echo '<a class="editar-pergunta-icone showEditAnswerModal" data-question-text="'. $value['texto'].'" data-question-id="'. $value['id'].'"><i class="fa fa-file-text-o" aria-hidden="true"></i></a>';
                            echo '</li>';
                        }
                        echo '</ul>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'newQuestion.php';?>
<?php include 'editQuestion.php';?>

<div class="back-button">
    <a href="<?php echo URL; ?>jogos/" class="back-link">
      <i class="fa fa-arrow-left"></i>
      <span class="back-text">Voltar</span>
    </a>
</div>