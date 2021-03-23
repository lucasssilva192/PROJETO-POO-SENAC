    <?php

    require_once 'db.php';

    if (isset($_POST['btnCadastrar'])){
        $senha = $_POST['senha'];
        $confirmaSenha = $_POST['confirmaSenha'];
        if($senha == $confirmaSenha){
        $senha = trim($senha);
        $senha = password_hash( $senha, PASSWORD_DEFAULT);
        $fotoUsuarioDefault = '.config/fotos_perfil_usuarios/default.jpg';
        $fotoUsuario = 'config/fotos_perfil_usuarios/default.jpg';
        $objStmt = $objBanco->prepare('	INSERT INTO usuario 
                                            (nome, email, senha, fotoUsuario)
                                        VALUES 
                                            ( :nome, :email, :senha, :fotoUsuario)');
        
        $objStmt->bindParam(':nome', $_POST['nome']);					
        $objStmt->bindParam(':email', $_POST['email']);	
        $objStmt->bindParam(':senha', $senha);
        $objStmt->bindParam(':fotoUsuario', $fotoUsuario);
        
        //Executo
 
            if ( $objStmt->execute() ) {
        
                print "<script language='javascript' type='text/javascript'>alert('Cadastrado com sucesso!');</script>";

                session_start();

                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                $_SESSION['nome'] = $reg['nome'];
                $_SESSION['id'] = $reg['userID'];

                header('Location: ../home.php');
            
            } else {
            
                print "<script language='javascript' type='text/javascript'>alert('Erro. Tente novamente.');window.location.href='../index.php'</script>";
            }  
        }
        else{
            print "<script language='javascript' type='text/javascript'>alert('As senhas digitadas não coincidem.');window.location.href='../index.php'</script>";
        }
    }