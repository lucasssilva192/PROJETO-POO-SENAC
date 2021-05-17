<html lang="pt-br">
    <head>
        <meta http-equiv="Content Type" content="text/hmtl" charset="UTF-8">
        <link type="text/css" rel="stylesheet"  href="../CSS/estilos2.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <title> SiCadPF </title>
    </head>
    
    <body>
        <div id="background"> 
              <center>
                <img src="logo.png" id="logo" width="200"/>
                    <div id="bloco_branco">
                        <form action="../Controller/consultar_funcionario.php" method="post">
                             <h3> LISTA DE FUNCIONÁRIOS </h3>
                             <p> DIGITE O CPF DO FUNCIONÁRIO QUE VOCÊ DESEJA VISUALIZAR: </p>
                             <input type="text" placeholder=" CPF" class="input_bloco" id="input_bloco" name="cpf"/>
                             <br>
                             <br> 
                             <input type="submit" class="botao_bloco" id="botao" value="Listar">
                        </form>
                    </div>
                </center>
        </div>
    </body>
</html>     