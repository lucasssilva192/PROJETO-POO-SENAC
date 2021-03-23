<?php
    require_once 'db.php';     
    require_once 'session.php';

    $nomeUsuario = $_POST['nomeUsuario'];
    $emailUsuario = $_POST['emailUsuario'];
    $idUsuario = $_SESSION['id'];

    try{
    $stmt = $objBanco->prepare("UPDATE usuario 
                                SET nome = :nome, email = :email
                                WHERE userID = $idUsuario");
    $stmt->execute(array(
      ':nome' => $nomeUsuario,
      ':email' => $emailUsuario,
    ));
    
ini_set("display_errors", 1);
error_reporting(E_ALL);

    print "<script language='javascript' type='text/javascript'>alert('Dados atualizados com sucesso!');window.location.href='../meu_perfil.php'</script>";
}catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

            
 