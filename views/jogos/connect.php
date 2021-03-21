
<div class="container">
    <input type="hidden" class="helper" value="gameHelper">

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#games-list" class="unique-tab">Jogos</a></li>
            </ul>
        </div>
    </div>   
    <div class="painel" id="games-list">
        <div class="row">
            <div class="col-md-12">
                <div class="painel-list">
                     <?php
                        echo '<ul>';
                        foreach($this->jogoLista as $key => $value) {
                             echo '<li>';
                             echo '<input type="hidden" name="jogoid" value='. $value['id'].'>';
                             echo '<a href="'. URL . 'jogos/activePlayer/' . $value['id'].'">'. $value["jogoativo"]. '<span class="master_name">' . $value["mestre"].'</span></a>';
                             echo '</li>';
                         }
                        echo '<ul>';
                     ?>
                </div>
            </div>
        </div>
    </div>
</div>