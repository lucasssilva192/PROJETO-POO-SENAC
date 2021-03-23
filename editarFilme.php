

<?php
    require 'config/session.php';
    require_once 'config/db.php';

    $filmeID = $_POST['filmeID'];

    $consulta = $objBanco->query("SELECT nomeFilme, duracaoFilme, sinopseFilme, destino_foto, filmeID 
    FROM filmes
    WHERE filmeID = $filmeID");
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
<title>Meus Filmes</title>
    
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
                <div class="media d-flex align-items-center">
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
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Alternar</small></button>
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
      <h2 class="text-white"> O que você está assistindo? </h2>
      <form action='config/atualizarFilme.php' method='post' encType="multipart/form-data">
      <div class="box_filmes">
      <?php 
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                echo "<section class='upload_capa'>
                <div class='form-group'>
                        <img class='preview-img' src='{$linha['destino_foto']}'>    
                          <div class='file-chooser fileUpload'>
                            <span>Escolher Capa</span>
                            <input type='file' class='upload' accept='image/*' name='arquivo' id='capaFilme'> 
                          </div>
                    <script>
                        const $ = document.querySelector.bind(document);
                        fileChooser.onchange = e => {
                            const fileToUpload = e.target.files.item(0);
                            const reader = new FileReader();
                
                            // evento disparado quando o reader terminar de ler 
                            reader.onload = e => previewImg.src = e.target.result;
                
                            // solicita ao reader que leia o arquivo 
                            // transformando-o para DataURL. 
                            // Isso disparará o evento reader.onload.
                            reader.readAsDataURL(fileToUpload);
                        };
                    </script>
                </div>
              </section>
              <section class='filmes_split'>
              <section class='section_filmes'>
                        <div class='form-group'>
                            <label for='nomeFilme' class='text-white'>Nome do filme:</label>
                            <input type='text' class='form-control text-gray bg-light' id='nomeFilme' name='nomeFilme' placeholder='Ex.: Shrek 2' value='{$linha['nomeFilme']}'>
                            <input type='text' id='filmeID' name='filmeID' value='{$linha['filmeID']}' style='display: none;'>
                        </div>
                    </section>
                    <section class='section_filmes'>
                        <div class='form-group'>
                            <label for='duracaoFilme' class='text-white'> Duração do filme:</label>
                            <input class='bg-dark border-0 rounded text-white' type='time' id='duracaoFilme' name='duracaoFilme' min='00:00' max='30:00' required value='{$linha['duracaoFilme']}'>
                        </div>
                    </section> 
                    <section class='section_filmes'>
                        <div class='form-group'>
                            <label for='sinopseFilme' class='text-white'>Sinopse do Filme:</label>
                            <textarea class='form-control text-gray bg-light' id='sinopseFilme' name='sinopseFilme' rows='6'>
                                {$linha['sinopseFilme']}
                            </textarea>
                        </div>
                    </section>
                    <section class='section_filmes'>
                    <div class='form-group'>
                        <input type='submit' value='Salvar'>
                    </div>            
                  </section>
                </section>";
            }                 
      ?>
      </div>
     </form>
    </main>
    <footer></footer>
  </body>
</html>