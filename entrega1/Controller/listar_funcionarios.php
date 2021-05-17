<?php

include_once "../Classes/Abstratas/Database.class.php";
include_once "../Classes/Funcionario.class.php";

$consulta = new Funcionario;
$consulta->listar()
?>
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
                        <?php 
                        $consulta->listar()
                        ?>
                    </div>
                </center>
        </div>
    </body>
</html>     