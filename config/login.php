<?php
    session_start();

    require_once 'db.php';

	if(isset($_POST['btnEntrar']))
	{
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $senha = $_POST['senha'];
        $objStmt = $objBanco->query("SELECT userID, nome ,senha, email, fotoUsuario FROM usuario WHERE email = '$email' ");
        $reg = $objStmt->fetch(PDO::FETCH_ASSOC);
        $hash = $reg['senha'];

        if(password_verify( $senha, $hash))
        {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['nome'] = $reg['nome'];
            $_SESSION['id'] = $reg['userID'];
            $_SESSION['fotoUsuario'] = $reg['fotoUsuario'];

            header("location: ../home.php");
            die();
        }
        else
        {
            //Erro
            print "<script language='javascript' type='text/javascript'>alert('Credenciais inválidas');window.location.href='../index.php'</script>";
        }
	}