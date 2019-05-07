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
  <meta charset="utf-8">
  <title>eBusiness Bootstrap Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
</head>

<body class="back03" data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active">
                    <a class="page-scroll" href="index.php">Home</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#about">Comprar</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="ganhar.php">Ganhar Cartas</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="deslogar.php">Sair</a>
                  </li>
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
          </div>
        </div>
    </div>
</div>
</header>

</br></br></br></br></br><h2><center>Suas cartas</center></h2>
    <div class="text-center">
                <?php
                $select = "SELECT figurinhas.* 
                FROM figurinhas, usuariosfigurinhas, usuarios 
                WHERE usuarios.id = '$idUser' 
                AND usuarios.id = usuariosfigurinhas.usuarios_id                 
                AND usuariosfigurinhas.figurinha_id = figurinhas.id";
                $vetor = buscarFigurinhas($select, $idUser, $conexao);
                if($vetor != -1){
                    foreach ($vetor as $key => $valor) {
                        echo "<img src='img/$valor[caminho]' alt='' style='margin: 0px 10px 10px 0px' '/>";
                    }
                }else{
                    echo "<p>Voce não possui nenhuma figurinha</p>";
                }
            ?>            
    </div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/knob/jquery.knob.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/parallax/parallax.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  <script src="lib/appear/jquery.appear.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <script src="js/main.js"></script>
</body>

</html>
