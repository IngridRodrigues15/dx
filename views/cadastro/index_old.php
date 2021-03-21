<html>
    <head>
        <title><?=(isset($this->title)) ? $this->title : 'DX Smart Games'; ?></title>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.css" /> 
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/cadastro.css" /> 
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/jquery-ui.css" />
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/jquery-ui.theme.css" />  
        
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-3.1.1.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/datapicker-pt.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/cadastro.js"></script>
    </head>
    <body>
        <div class="painel">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12 text-center">
                        <div class="Login-painel">
                            <form action="register" method="post">
                                <center><h2>Cadastro de Usuário</h2></center>
                                <div class="row">
                                    <div class="col-md-6 pull-left text-left">Genero:
                                        <label class="lb-type">
                                            <input type="radio" name="sexo" value="M" required>Masculino 
                                        </label>
                                        <label class="lb-type">
                                            <input type="radio" name="sexo" value="F" required>Feminino
                                        </label>
                                    </div>
                                    <div class="col-md-6 pull-right text-right">Tipo:
                                        <label class="lb-type">
                                            <input type="radio" name="tipo" value="1"required>Mestre/Professor 
                                        </label>
                                        <label class="lb-type">
                                            <input type="radio" name="tipo" value="0" required>Jogador/Aluno
                                        </label>
                                    </div>
                                </div>
                                <label for="nome">Nome:
                                <input type="text" id="nome" name="nome" placeholder="Nome Completo" required=""></label>
                                <label for="datepicker">Data de Nascimento:
                                <input type="date" name="nasc" placeholder="dd/mm/aaaa" id="datepicker" required></label>
                                <label for="email">E-mail
                                <input type="text" id="email" type="email" name="email" placeholder="exemplo@mail.com" required></label>
                                <label for="pass">Senha
                                <input type="password" id="pass" name="password" placeholder="*****" required/></label>
                                <label for="confpass">Confirmar Senha
                                <input type="password" id="confpass" name="confirm" placeholder="*****" required></label>
                                <button type="submit" name="cadastrar">Cadastrar-se</button>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </body>
</html>