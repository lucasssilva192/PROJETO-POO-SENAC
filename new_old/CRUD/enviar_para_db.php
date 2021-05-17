<?php

require_once('../Classes/Funcionario.class.php');

$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$celular = $_POST['celular'];
$cep = $_POST['cep'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'db_proj_poo';
                    
                    // cria conexão

                    $conn = mysqli_connect($servername, $username, $password, $dbname);

                    // checa conexão

                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }else{
                        echo "conectou";
                    }

                    $query = "INSERT INTO tbl_funcionario (cpf, nome, endereco, cep, celular) VALUES ('".$cpf."','".$nome."', '".$endereco."', '".$cep."', '".$celular."');";
        
                    if ($conn->query($query) === TRUE)
                    {
                        echo "<script type=\"text/javascript\">alert('Funcionando!');window.location.href='../HTML/home_page.php'</script>";
                    }
        
                    else
                    {
                        var_dump($conn);
                        //var_dump($query);
                        echo "erro";
                    }

                    mysqli_close($conn);

