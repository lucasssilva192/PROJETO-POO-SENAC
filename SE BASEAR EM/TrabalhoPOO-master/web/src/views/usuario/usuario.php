<?php 
  //Valdiando sessão
  (__DIR__);
  include_once "../../../../backend/classes/loginClass.php";
  $login = new Login();
  $login->validaUser();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/styles/css/usuario.css">
    <link rel="stylesheet" href="../../assets/styles/css/menu.css">
    <link href="https://fonts.googleapis.com/css2?family=Rhodium+Libre&display=swap" rel="stylesheet">
    <script src="../../assets/js/menu.js"></script>
    <title>Usuário</title>
</head>

<body>
    <header>
        <div class=" bg-blue">
        </div>
        <div class=" bg-yellow">
        </div>
        <nav class="sidebar">
            <ul class="sidebar__nav">
              <li class="nav__item hide-children">
                <span class="item__title">
                  Cadastros 
                  <img class="title__icon" src="../../assets/svgs/arrow-down.svg" alt="arrow down">
                </span>
                <ul class="item__subnav">
                  <li class="subnav__item">
                    <a class="item__link" href="../../../../backend/controllers/cliente/clienteconsultar.php">Clientes</a>
                  </li>
                  <li class="subnav__item">
                    <a class="item__link" href="../../../../backend/controllers/produto/produtoconsultar.php">Produtos</a>
                  </li>
                  <li class="subnav__item">
                    <a class="item__link" href="../../../../backend/controllers/usuario/usuarioconsultar.php">Usuários</a>
                  </li>
                </ul>
              </li>
              <li class="nav__item hide-children">
                <span class="item__title">
                  Mais
                  <img
                    class="title__icon"
                    src="../../assets/svgs/arrow-down.svg"
                    alt="arrow down"
                  />
                </span>
                <ul class="item__subnav">
                  <li class="subnav__item">
                    <a class="item__link" href="../../../../backend/controllers/logs/logsconsultar.php">Logs</a>
                  </li>
                  <li class="subnav__item">
                    <a class="item__link" href="../../../../backend/controllers/sistema/logout.php">Logout</a>
                  </li>
                </ul>
              </li>
            </ul>
            <a href="./welcome.php">
              <img src="../../assets/images/logo.png" alt="netuno">
            </a>
      </nav>
    </header>

    <main>
        <div class="container-form">
            <h2 class="titulo">Usuários</h2>
            <?php 
              $_SESSION['erro'] = $_SESSION['erro'] ?? '';
              $_SESSION['msgusu'] = $_SESSION['msgusu'] ?? '';
                if($_SESSION['erro']){
                    echo '  <div class="invalido">
                                <p> '. $_SESSION["msgusu"] .'</p>
                            </div>';
                            $_SESSION['msgusu'] = '';
                }else{
                    echo  '  <div class="valido">
                                <p> ' . $_SESSION["msgusu"] . '</p>
                            </div>';
                            $_SESSION['msgusu'] = '';
                };  
            ?>
            
            <form method="POST" action="../../../../backend/controllers/usuario/usuariodigitar.php">
            <div class="form">
                    <div class=" input">
                        <label class=" d-block" for="usuario" >Login*</label>
                        <input class=" d-block" type="text" name="ds_login" id="usuario" required>
                    </div>
                    <div class=" input">
                        <label class=" d-block" for="email-usuario">E-mail*</label>
                        <input class=" d-block" type="email" name="ds_email" required>
                    </div>
                </div>
                <div class="form-2">
                    <div class=" input">
                        <label class=" d-block" for="senha-usuario">Senha*</label>
                        <input class=" d-block" type="password" name="ds_senha" required>
                    </div>
                    <div class=" input">
                        <label class=" d-block" for="senha-usuario">Confirmar Senha*</label>
                        <input class=" d-block" type="password" name="ds_senhacon" required>
                    </div>
                </div>
                <div class="form-3">
                    <input type="checkbox"  name="tg_adm" value='1'>
                    <span>Perfil de Administrador</span>
                </div>
                <div class=" button">
                    <input class=" btn" type="submit" value="Salvar">
                    <input class=" btn-limpa" type="reset" value="Limpar">
                </div>
            </form>
        </div>
        </div>
    </main>
</body>

</html>