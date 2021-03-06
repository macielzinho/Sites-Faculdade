<?php
    //Chamar o arquivo verificar para poder saber se realmente está logado 
    include 'verificar.php';
    $ultimoAcesso = date('Y/m/d H:i:s', time());
    $update = "UPDATE `usuarios` SET `ultimoAcesso` = '$ultimoAcesso' WHERE `id` = '$idUser'";
    if(!alterarDatas($update, $conexao)){
        echo "<script>alert('Erro ao passar Ultimo Acesso');</script>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Inicial</title>
        <!--Css-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../assets/css/material-kit.css">
        <!--Js-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    </head>
    <body class="back03">
    <!--NavBar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="nav-link" href="index.php"><h4>Home</h4><span class="sr-only">(current)</span></a>
        <a class="nav-link" href="#">Comprar</a>
        <a class="nav-link" href="ganhar.php">Ganhar Cartas</a>    
        <a class="nav-link" href="deslogar.php">Sair</a>
      
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    </nav>
    <!--fim dela-->
</br><h2><center>Suas cartas</center></h2>
    <div>
                <?php
                $select = "SELECT figurinhas.* 
                FROM figurinhas, usuariosfigurinhas, usuarios 
                WHERE usuarios.id = '$idUser' 
                AND usuarios.id = usuariosfigurinhas.usuarios_id                 
                AND usuariosfigurinhas.figurinha_id = figurinhas.id";
                $vetor = buscarFigurinhas($select, $idUser, $conexao);
                if($vetor != -1){
                    foreach ($vetor as $key => $valor) {
                        echo "&emsp;<img src='img/$valor[caminho]' alt=''>&emsp;";
                    }
                }else{
                    echo "<p>Voce não possui nenhuma figurinha</p>";
                }
            ?>            
    </div>
    </body>
</html>