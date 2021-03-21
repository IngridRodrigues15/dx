<div class="container">
    
   <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="<?php echo URL;?>mapas">Mapas</a></li>
                <li><a href="<?php echo URL;?>fichas">Fichas</a></li>
                <li><a href="<?php echo URL;?>dados">Dados</a></li>
                <li><a href="<?php echo URL;?>perguntas">Perguntas</a></li>
            </ul>
        </div>
    </div> 

	<input type="hidden" class="helper" value="mapHelper">
    <div class="painel map-new">
        <div class="row">
            <div class="col-md-12">

                <form action="<?php echo URL;?>mapas/upload" method="post" enctype="multipart/form-data">
                      <input type="file" name="arquivo" id="filer_input">
                      <input type="submit" value="Criar Mapa" class="upload-button">
                </form>

            </div>
        </div>
    </div>
</div>

<div class="back-button">
    <a href="<?php echo URL; ?>mapas/index/" class="back-link">
      <i class="fa fa-arrow-left"></i>
      <span class="back-text">Voltar</span>
    </a>
</div>