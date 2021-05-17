<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = 'db_proj_poo';
                

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // checa conexão

        if (!$conn) 
        {
             die("Connection failed: " . mysqli_connect_error());
        }

         //$query = "SELECT nome,cpf FROM tbl_funcionario WHERE cpf = '".$cpf."';";
         $query = "SELECT * FROM tbl_funcionario";
         $result = mysqli_query($conn, $query);


         if (mysqli_num_rows($result) > 0) 
         {
             
         echo "
         <html lang='pt-br'>
<head>
 <meta http-equiv='Content Type' content='text/hmtl' charset='UTF-8'>
 <link type='text/css' rel='stylesheet'  href='../CSS/estilos2.css'>
 <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
 <title> SiCadPF </title>
</head>

<body>
 <div id='background'> 
       <center>
         <img src='../HTML/logo.png' id='logo' width='200'/>
             <div id='bloco_branco'>
                 <form action='../CRUD/listar_db.php' method='post'>
                      <h3> LISTA DE FUNCIONÁRIOS </h3>
                      <br> ";

            do {
                $p = mysqli_fetch_assoc($result);
                if(is_null($p)){
                    echo "";
                }else{ 
               
                echo "<center>
                        <h3>
                            CPF - ".$p["cpf"]."<br>
                            Nome - ".$p["nome"]."<br>
                            Endereço - ".$p["endereco"]."<br>
                            CEP - ".$p["cep"]."<br>
                            Telefone Celular - ".$p["celular"]."
                        </h3>
                    </center>";
                echo "______________________________________";
                }
             } while ($p != null) ;
         } 
         else 
         {
            echo "<center><h3>Nenhum resultado</center></h3>";
         }
         
echo "                     
<br>
<br> 
<input type='submit' class='botao_bloco' id='botao' value='Listar'>
</form>
</div>
</center>
</div>
</body>
</html>     
";

         mysqli_close($conn);

    
?>