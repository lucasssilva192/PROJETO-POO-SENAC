<?php
    require_once 'db.php';     
    require_once 'session.php';
    $idUsuario = $_SESSION['id'];
    $nome_arquivo = $_FILES['fotoUsuario']['name'];
    $arquivo_tmp = $_FILES['fotoUsuario']['tmp_name'];
    $variacao = rand(0, 1000000);
    $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);
    $nome_file = pathinfo($nome_arquivo, PATHINFO_FILENAME);
    $destino = 'fotos_perfil_usuarios/' . $nome_file . $variacao . '.' . $extensao;
    $destino2 = 'config/fotos_perfil_usuarios/' . $nome_file . $variacao . '.' . $extensao;

    move_uploaded_file($arquivo_tmp, $destino);
    move_uploaded_file($arquivo_tmp, $destino2);

    try{
    $stmt = $objBanco->prepare("UPDATE usuario
                                SET fotoUsuario = :fotoUsuario
                                WHERE userID = $idUsuario");
    $stmt->execute(array(
      ':fotoUsuario' => $destino2,
    ));
    
//ini_set("display_errors", 1);
//error_reporting(E_ALL);

    print "<script language='javascript' type='text/javascript'>alert('Foto de perfil inserida com sucesso!');window.location.href='../meu_perfil.php'</script>";
}catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

            
 
