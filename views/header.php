<!doctype html>
<html>
  <head>
    <title><?=(isset($this->title)) ? $this->title : 'MVC'; ?></title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/reset.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/font-awesome.css" /> 
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/leaflet.css" /> 
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/jquery.filer.css" /> 
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/header.css" /> 
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/default-new.css" /> 
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/jquery-ui.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/jquery-ui.theme.css" />  
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/modal.css" /> 
  <link rel="stylesheet" href="<?php echo URL; ?>public/css/alert.css" /> 
    
    <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/leaflet-src.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/header.js"></script>
     <script type="text/javascript" src="<?php echo URL; ?>public/js/alerta.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/perguntasAtivo.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>public/js/mapas.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>public/js/jogos.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>public/js/fichas.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>public/js/perguntas.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>public/js/dados.js"></script>

  <?php 
    if (isset($this->js)) 
    {
      foreach ($this->js as $js)
      {
        echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
      }
    }
  ?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-100647403-1', 'auto');
    ga('send', 'pageview');
  </script>
</head>
<body>
  <?php Session::init(); ?>
  <input type="hidden" id="url-root" value="<?php echo URL; ?>">
  <header>
    <div class="header-menu">
      <div class="container">
        <div class="row">            
          <div class="col-md-4 col-xs-12">
            <div class="logo-slot">
              <div class="logo">
                <img class="img" src="<?php echo URL; ?>public/images/DXLogo.png" />
                <h1 class="titulo-logo"><b>Dx</b> <em>Smart Games</em></h1>
              </div> 
            </div>
          </div>
          <div class="col-md-8 col-xs-12">
            <div class="row">
              <?php if (Session::get('loggedIn') == true):?>
                <div class="col-md-12 col-xs-12">
                  <nav class="menu">
                    <div class="col-md-3 col-xs-4">
                      <div class="menu-item">
                        <a alt="ajuda" id="showHelperModal">Ajuda</a>
                      </div>
                    </div>
                    <div class="col-md-3 col-xs-4">
                      <div class="menu-item">
                        <a href="<?php echo URL; ?>jogos" alt="meus jogos">Jogos</a>
                      </div>  
                    </div>
                    <div class="col-md-3 col-xs-4">
                      <div class="menu-item">
                        <a href="<?php echo URL; ?>logout" alt="">Logout</a>
                      </div>
                    </div>
                  </nav>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>