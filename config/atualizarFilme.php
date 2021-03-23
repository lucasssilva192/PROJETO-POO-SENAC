<?php
    require_once 'db.php';     

    require_once 'session.php';

    $nomeFilme = $_POST['nomeFilme'];
    
    $duracaoFilme = $_POST['duracaoFilme'];
    
    $sinopseFilme = $_POST['sinopseFilme'];

    $filmeID = $_POST['filmeID'];

    $arquivo_tmp = $_FILES['arquivo']['tmp_name'];

    $nome_arquivo = $_FILES['arquivo']['name'];
/*
    $variacao = rand(0, 1000000);

    $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

    $nome_file = pathinfo($nome_arquivo, PATHINFO_FILENAME);
*/
    $idUsuario = $_SESSION['id'];
/*
    $destino = './imagens_capas_filmes/' . $nome_file . $variacao . '.' . $extensao;
    $destino2 = 'config/imagens_capas_filmes/' . $nome_file . $variacao . '.' . $extensao;


    move_uploaded_file($arquivo_tmp, $destino);
    move_uploaded_file($arquivo_tmp, $destino2);
*/

    try{
    $stmt = $objBanco->prepare('UPDATE filmes 
                                SET nomeFilme = :nomeFilme, duracaoFilme = :duracaoFilme, sinopseFilme = :sinopseFilme
                                WHERE filmeID = '.$filmeID.' ');
    $stmt->execute(array(
      ':nomeFilme' => $nomeFilme,
      ':duracaoFilme' => $duracaoFilme,
      ':sinopseFilme' => $sinopseFilme,
    ));
    
ini_set("display_errors", 1);
error_reporting(E_ALL);

    print "<script language='javascript' type='text/javascript'>alert('Filme editado com sucesso!');window.location.href='../meus_filmes.php'</script>";
}catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

            
 
