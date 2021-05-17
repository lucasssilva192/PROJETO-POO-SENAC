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
                        <form action="../Controller/atualizar_funcionario.php" method="post">
                             <h3> EDITAR DADOS </h3>
                             <p> Preencha os campos abaixo com os dados novos:</p>
                             <input type="text" placeholder=" CPF" class="input_bloco" id="input_bloco" name="cpf"/>
                             <br>
                             <br>
                             <input type="text" placeholder=" Nome completo" class="input_bloco" id="input_bloco" name="nome"/>
                             <br>
                             <br>
                             <input type="text" placeholder=" Endereço residencial" class="input_bloco" id="input_bloco" name="endereco"/>
                             <br>
                             <br>
                             <input type="text" placeholder=" CEP" class="input_bloco" id="input_bloco" name="cep"/>
                             <br>
                             <br>
                             <input type="text" placeholder=" Telefone celular" class="input_bloco" id="input_bloco" name="celular"/>
                             <br>
                             <br>
                             <input type="submit" value="Atualizar" class="botao_bloco" id="botao">
                        </form>
                    </div>
                </center>
        </div>
    </body>
</html>     