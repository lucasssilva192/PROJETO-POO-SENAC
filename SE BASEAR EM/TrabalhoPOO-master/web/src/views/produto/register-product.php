
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro de produto</title>
    <script src="../../assets/js/menu.js"></script>
    <link rel="stylesheet" href="../../assets/styles/css/menu.css" />
    <link rel="stylesheet" href="../../assets/styles/css/header.css" />
    <link rel="stylesheet" href="../../assets/styles/css/main.css" />
    <link rel="stylesheet" href="../../assets/styles/css/register-client.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Rhodium+Libre&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <header>
      <div class="bg-blue"></div>
      <div class="bg-yellow"></div>
    </header>
    <main class="main">
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
      <section class="main__page-content right-container">
        <div class="page-content__title">
          <h1 class="page-title mb">Produtos</h1>
        </div>
        <?php 
              $_SESSION['erro'] = $_SESSION['erro'] ?? '';
              $_SESSION['msgusu'] = $_SESSION['msgusu'] ?? '';
                if($_SESSION['erro']){
                    echo '  <div class="invalido">
                                <p> '. $_SESSION["msgusu"] .'</p>
                            </div>';
                            $_SESSION['msgusu'] = '';
                            $_SESSION['erro']   = '';
                }else{
                    echo  '  <div class="valido">
                                <p> ' . $_SESSION["msgusu"] . '</p>
                            </div>';
                            $_SESSION['msgusu'] = '';
                            $_SESSION['erro']   = '';
              };  
        ?>
        <form class="page-content__inputs mb" method='POST' action='../../../../backend/controllers/produto/produtodigitar.php'>
          <div class="inputs-group mb">
            <label class="input-container input-container-80">
              Nome do produto*
              <input name="name" type="text" required/>
            </label>
            <label class="input-container input-container-20">
              Código*
              <input name="codigo" type="text" required/>
            </label>
          </div>

          <div class="inputs-group">
            <label class="input-container input-container-40">
              Marca*
              <select name="marca" id="" required>
                <option value="0"></option>
                <option value="1">ToyShow</option>
                <option value="2">MuitoBrinquedo's</option>
              </select>
            </label>
            <label class="input-container input-container-40">
              Categoria*
              <select name="categoria" id="" required>
                <option value="0"></option>
                <option value="1">Boneco</option>
                <option value="2">Carro</option>
              </select>
            </label>
          </div>

          <div class="inputs-group">
            <label class="input-container input-container-25">
              Preço venda*
              <input min='0' name="preco-venda" type="number" required/>
            </label>
            <label class="input-container input-container-25">
              Preço custo
              <input min='0' name="preco-custo" type="number" />
            </label>
            <label class="input-container input-container-25">
              Estoque mínimo
              <input min='0' name="estoque-minimo" type="number" />
            </label>
            <label class="input-container input-container-25">
              Estoque atual
              <input min='0' name="estoque-atual" type="number" />
            </label>
          </div>

          <label class="input-container">
            Descrição
            <textarea name="descricao" id="" cols="30" rows="10"></textarea>
          </label>

          <label class="checkbox-container mt mb">
            <input name="inativo" type="checkbox" name="" id="" />
            Inativo
          </label>

          <button class="blue-button mr" type="submit">Salvar</button>
          <button class="white-button" type="button">Limpar</button>

        </form>
      </section>
    </main>
  </body>
</html>
