<?php

    $cpf = $_POST['cpf'];
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = 'db_proj_poo';
                
    if(strlen($cpf) >= 11){
        // cria conexão
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // checa conexão

        if (!$conn) 
        {
             die("Connection failed: " . mysqli_connect_error());
        }

         $query = "SELECT nome,cpf FROM tbl_funcionario WHERE cpf = '".$cpf."';";
         $result = mysqli_query($conn, $query);

         if (mysqli_num_rows($result) > 0) 
         {
             $row = mysqli_fetch_assoc($result);
             echo "<br><center><h2> Encontrado </h2></center><br><br>";
              echo "<center><h3>CPF - ".$row["cpf"]."<br><br>Nome - ".$row["nome"]."</center></h3>";
         } 
         else 
         {
            echo "<center><h3>Nenhum resultado</center></h3>";
         }

         mysqli_close($conn);
    }
    else
    {
       echo "<center><h3> CPF Inválido </h3><br><br><h4> CPF deve ter 11 dígitos </h4>"; 
    }
    
?>