<div class="container">
    
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="<?php echo URL;?>dados">Dados</a></li>
                <li><a href="<?php echo URL;?>fichas">Fichas</a></li>
                <li><a href="<?php echo URL;?>mapas">Mapas</a></li>
            </ul>
        </div>
    </div> 

    <div class="painel" id="dices-list">
        <div class="row">
            <div class="col-md-12">
                <div class="new-dice">
                   <form class="criar-dado" action="<?php echo URL;?>dados/create" method="post" class="dadosForm">
                       <input type="text" name="nomeDado" placeholder="Novo Dado">
                       <input placeholder=" Nº lados"type="number" name="numLados" class="numeroLados" pattern="[0-9]+$">
                        <button type="submit" >Criar</button>
                    </form>
                    <form class="alterar-dado hidden" action="<?php echo URL;?>dados/edit" method="post" >    
                        <input type="hidden"  name="edt-id">
                        <input id="input-alter-dice" type="text" name="edt-nomeDado" placeholder="Nome Dado">
                        <input type="number" name="edt-numLados" class="numeroLados" pattern="[0-9]+$" placeholder=" Nº lados">
                        <button type="submit" >Alterar</button>
                    </form>
                    <form class="alterar-dado hidden" action="<?php echo URL;?>dados/delete" method="post" >
                        <input type="hidden"  name="id-delete">
                        <button type="submit" id="btn-delete-dice" value=""><i class="fa fa-trash"></i></button>
                    </form>
                </div>
                <div class="painel-list">
                    <?php
                        echo '<ul>';
                        foreach($this->dadosLista as $key => $value) {
                            echo '<li>';
                            echo '<a class="item-dado" data-id="'.$value['id'].'" data-nome="'.$value['nome'].'" data-num-lados="'.$value['num_lados'].'">'.$value['nome'].'</a>';
                            echo '<a class="item-dado alterar-dado-icone" data-id="'.$value['id'].'" data-nome="'.$value['nome'].'" data-num-lados="'.$value['num_lados'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
                            echo '</li>';
                        }
                        echo '</ul>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

