<?php
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $celular = $_POST['celular'];
        
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
        
        $sql1 = "SELECT cpf FROM tbl_funcionario WHERE cpf='".$cpf."'";
        $result = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result) > 0) 
        {
            $sql = "UPDATE tbl_funcionario 
                SET nome='".$nome."',endereco='".$endereco."',celular='".$celular."' WHERE cpf='".$cpf."'"; 
        
            if(mysqli_query($conn, $sql))
            { 
                echo "<script type=\"text/javascript\">alert('Atualizado!');window.location.href='../HTML/home_page.php'</script>";
            } 
            else 
            { 
                echo "Erro: " . mysqli_error($conn); 
            }  
        } 
        else 
        {
            echo "<script type=\"text/javascript\">alert('CPF não encontrado!');window.location.href='Atualizar_Form.php'</script>";
        }

         mysqli_close($conn);
    }
    else
    {
       echo "<center><h3> CPF Inválido </h3><br><br><h4> CPF deve ter 11 dígitos </h4>"; 
    }
    

?>