<html>
    <head>
        <title><?=(isset($this->title)) ? $this->title : 'DX Smart Games'; ?></title>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/reset.css" /> 
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.css" />   
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/login.css" /> 
    </head>
    <body>
        <div class="painel">
            <div class="container">
                <div class="row">
                    <div class="col-md-6  col-md-offset-3 col-sm-12 col-xs-12 text-center">
                        <div class="login-painel">
                            <div class="logo">
                            <img class="img" src="<?php echo URL; ?>public/images/DXLogo.png" />
                            <h1 class="titulo-logo"><b>Dx</b> <em>Smart Games</em></h1>
                        </div>
                            <form action="login/run" method="post">
                                <input type="email" name="email" placeholder="Email" required="" /><br />
                                <input type="password" name="password" placeholder="Senha" required /><br />
                                <button type="submit" name="entrar">Entrar</button>
                                <?php  echo '<a href="'. URL .'cadastro/">Cadastrar-se</a>';?>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    <body>
</html>