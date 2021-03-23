<?php
    require 'config/session.php';
    require_once 'config/db.php';

    $userID =  $_SESSION['id'];

    $consulta = $objBanco->query("SELECT nome, userID, fotoUsuario
    FROM usuario
    WHERE userID = $userID");

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <!-- Bootstrap -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
   integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
   integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
   crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
   integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
   crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
   integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
   crossorigin="anonymous"></script>

<link rel="stylesheet" href="./css/style.css">
<script src="./js/script.js"></script>
<link rel="shortcut icon" href="./images/logo.png" />
<title>MovieTime</title>
    
    <script>
        function Checkfiles(){
        var fup = document.getElementById('capaFilme');
        var fileName = fup.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
        if(ext =="jpeg" || ext=="png"){
            return true;
        }
        else{
            return false;
        }
}
    </script>

</head>

  <body class="imagem-fundo banner-lg d-flex align-items-center">
    <header>

    </header>

    <main>
        <div class="vertical-nav" id="sidebar">
            <div class="menu py-4 px-3 mb-4">
                <div class='media d-flex align-items-center'>
                <?php 
                $fotoUsuario = $_SESSION['fotoUsuario']; 
                 echo "<img src='$fotoUsuario' width='65' class='mr-3 rounded-circle img-thumbnail shadow-sm'>"  
                ?>
                    <div class="media-body">
                        <h4 class="m-0">          
                        <?php 
                            $nome_usuario = $_SESSION['nome'];
                            echo " <a href='meu_perfil.php'> $nome_usuario </a>";
                        ?> 
                        </h4>
                        <p class="font-weight-light text-muted mb-0">Cinéfilo</p>
                    </div>
                </div>
            </div>

            <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Página Inicial</p>

            <ul class="nav flex-column bg-light mb-0">
                <li class="nav-item">
                    <a href="home.php" class="nav-link text-white font-italic">
                        <i class="fa fa-th-large mr-3 fa-fw" style="color:white"></i>
                        Página Principal
                    </a>
                </li>
                <li class="nav-item">
                <a href="meus_filmes.php" class="nav-link text-white font-italic">
                        <i class="fa fa-th-large mr-3 fa-fw" style="color:white"></i>
                        Meus Filmes
                    </a>
                </li>
                <li class="nav-item">
                    <a href="minhas_series.php" class="nav-link text-white font-italic">
                        <i class="fa fa-th-large mr-3 fa-fw" style="color:white"></i>
                        Minhas Séries
                    </a>
                </li>
            </ul>

            <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Entretenimento</p>

            <ul class="nav flex-column bg-white mb-0">

                <li class="nav-item">
                    <a href="estatisticas.php" class="nav-link text-white font-italic">
                        <i class="fa fa-cubes mr-3 fa-fw" style="color:white"></i>
                        Estatísticas
                    </a>
                 </li>
                <li class="nav-item">
                    <a href="adicionar_filmes.php" class="nav-link text-white font-italic">
                        <i class="fa fa-cubes mr-3 fa-fw" style="color:white"></i>
                        Adicionar Filmes
                    </a>
                </li>
                <li class="nav-item">
                    <a href="adicionar_series.php" class="nav-link text-white font-italic">
                        <i class="fa fa-cubes mr-3 fa-fw" style="color:white"></i>
                        Adicionar Séries
                    </a>
                </li>
                <li class="nav-item" style=" padding-top: 75%;">
                    <a href="config/deslogar.php" class="nav-link text-white font-italic">
                        <i class="fa fa-sign-out" style="color:white"></i>
                        Sair
                    </a>
                </li>
            </ul>
        </div>

        <div class="page-content p-5" id="content">
            <button id="sidebarCollapse" type="button"
                class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small
                    class="text-uppercase font-weight-bold">Alternar</small></button>

              

      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

        <h2 class="text-white"> O que a galera anda assistindo: </h2>
        <?php

            $consulta = $objBanco->query("SELECT nomeFilme, sinopseFilme, duracaoFilme,destino_foto 
                                          FROM filmes");


    echo "<div class='lista_filmes'>";

            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='filmes'>";
                echo "<section style='color:white;'>";
                echo "<h2> {$linha['nomeFilme']} </h2>";
                echo "<br>";
                echo "<img src={$linha['destino_foto']}>";
                echo "<br>";
                echo "<a> Duração do filme: {$linha['duracaoFilme']} </a>";
                echo "<br>";
                echo "<p> {$linha['sinopseFilme']} </p>";
                echo "<br><br>";
                echo "<div class='linha'> </div>";
                echo "</section>";
                echo "</div>";
            };

    echo "</div>";

    $consulta2 = $objBanco->query("SELECT nomeSerie, temporada, duracaoEP, numEPS, sinopseSerie, destinoFoto 
    FROM series AS S INNER JOIN usuario AS U
    ON S.userID = U.userID");



    echo "<div class='lista_filmes'>";

    while ($linha2 = $consulta2->fetch(PDO::FETCH_ASSOC)) {
    echo "<div class='filmes'>";
    echo "<section style='color:white;' >";
    echo "<h2> {$linha2['nomeSerie']} </h2>";
    echo "<br>";
    echo "<img src={$linha2['destinoFoto']}>";
    echo "<br>";
    echo "<a> Temporada {$linha2['temporada']} </a>";
    echo "<br>";
    echo "<a> Duração média de cada episódio {$linha2['duracaoEP']} </a>";
    echo "<br>";
    echo "<a> Número de episódios:  {$linha2['numEPS']} </a>";
    echo "<br>";
    echo "<p> {$linha2['sinopseSerie']} </p>";
    echo "<br><br>";
    echo "<div class='linha'> </div>";
    echo "</section>";
    echo "</div>";
    };

    echo "</div>";

        
        ?>
        
      </div>
    </main>
    <footer></footer>
  </body>
</html>