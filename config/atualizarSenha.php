<?php
    require_once 'db.php';     
    require_once 'session.php';

    $idUsuario = $_SESSION['id'];
    $senhaNova1 = $_POST['senhaNova1'];
    $senhaNova2 = $_POST['senhaNova2'];

    if($senhaNova1 == $senhaNova2){
        $senhaNova2 = trim($senhaNova2);
        $senhaNova2 = password_hash( $senhaNova2, PASSWORD_DEFAULT);
        try{
        $stmt = $objBanco->prepare("UPDATE usuario 
                                    SET senha = :senha
                                    WHERE userID = $idUsuario");
        $stmt->execute(array(
        ':senha' => $senhaNova2,
        ));
        ini_set("display_errors", 1);
        error_reporting(E_ALL);
        print "<script language='javascript' type='text/javascript'>alert('Dados atualizados com sucesso!');window.location.href='../meu_perfil.php'</script>";
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            }
        }
    else{
    print "<script language='javascript' type='text/javascript'>alert('As senhas não coincidem');window.location.href='../alterarSenha.php'</script>";
}
        
 