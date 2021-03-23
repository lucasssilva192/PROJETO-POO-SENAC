<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Metas -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link rel="stylesheet" 
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
              integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" 
              crossorigin="anonymous">

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
        <link rel="shortcut icon" href="./images/logo.png"/>
        <title>MovieTime</title>
    </head>

    <body>
        <header>
            <nav class="navbar fixed-top navbar-expand-lg">
                <a class="navbar-brand" href="#"><img src="./images/logo.png" style="height: 50px; width: 50px;"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li>
                        <a href="#"  data-toggle="modal" data-target="#cadastro">Cadastre-se</a>
                      </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" action="./config/login.php" method="POST">
                      <input class="form-control mr-sm-2" style="background-color: transparent; color: white;" name="email" type="email" placeholder="Email">
                      <input class="form-control mr-sm-2" style="background-color: transparent; color: white;" name="senha" type="password" placeholder="Senha">
                      <button name="btnEntrar" class="btn btn-outline-light my-2 my-sm-0" type="submit">Entrar</button>
                    </form>
                </div>
            </nav>

            <!-- Modal de Cadastro -->
            <div class="modal fade" id="cadastro" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content bg-dark text-white">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Faça seu Cadastro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="config/cadastro.php" method="POST">
                                <label for="nome" class="pt-1">Nome completo</label>
                                <input id="nome" name="nome" class="form-control mr-sm-2" type="text" placeholder="Seu nome completo" required>

                                <label for="email" class="pt-3">Email</label>
                                <input id="email" name="email" class="form-control mr-sm-2" type="email" placeholder="seuemail@email.com" required>

                                <label for="senha" class="pt-3">Senha</label>
                                <input id="senha" name="senha" class="form-control mr-sm-2" type="password" placeholder="Sua senha" required>

                                <label for="confirmaSenha" class="pt-3">Confirmar Senha</label>
                                <input id="confirmaSenha" name="confirmaSenha" class="form-control mr-sm-2" type="password" placeholder="Confirme sua senha" required>
                                
                                <div class="modal-footer">
                                    <button type="submit" name="btnCadastrar" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <main>
            <!-- Banner do Site -->
            <section class="banner-home banner-lg d-flex align-items-center px-4">
                <div class="container mx-auto">
                    <span class="h2 d-block text-center text-white">
                        Cinéfilo ou não, com certeza você já assistiu muitos dos filmes e séries que estão
                        em moda pela galera hoje em dia. 
                    </span>
                    <span class="h2 d-block text-center text-white">    
                        Que tal simular quanto tempo de vida você já
                        gastou vendo filmes e séries e descobrir se você tem vida social ou não?
                        É simples
                    </span>
                </div>
            </section>            
            
            <section class="banner-vader banner-lg d-flex align-items-center"> 
                <span class="h2 d-block text-white mx-auto text-center">
                    Aqui na MovieTime você pode interagir com seus amigos e comartilhar diariamente com eles sobre qual série está te deixando de cabelos em pé
                </span>
            </section>

            <section class="banner-chefao banner-lg d-flex align-items-center"> 
                <span class="h2 d-block text-white mx-auto">
                    Venha fazer parte da nossa rede. 
                </span>
            </section>
        </main>

        <footer class="footer">
            <div class="container">
			</div>
        </footer>
    </body>
</html>