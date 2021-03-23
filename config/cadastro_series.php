<?php

    require_once 'db.php';     

    require_once 'session.php';

    $nome_arquivo = $_FILES['arquivo']['name'];

    $variacao = rand(0, 1000000);

    $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

    $nome_file = pathinfo($nome_arquivo, PATHINFO_FILENAME);

    $destino = 'imagens_capas_series/'  . $nome_file . $variacao . '.' . $extensao;
    $destino2 = 'config/imagens_capas_series/' . $nome_file . $variacao . '.' . $extensao;

    $idUsuario = $_SESSION['id'];

    $nomeSerie = $_POST['nomeSerie'];
    $temporada = $_POST['temporada'];
    $duracaoEP = $_POST['duracaoEP'];
    $numEPS = $_POST['numEPS'];
    $sinopseSerie = $_POST['sinopseSerie'];
    $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
    $destinoFoto = $destino;

    move_uploaded_file( $arquivo_tmp, $destino);

    try{
    $stmt = $objBanco->prepare('INSERT INTO series ( nomeSerie, temporada, duracaoEP, numEPS, sinopseSerie, destinoFoto, userID) 
                                VALUES ( :nomeSerie, :temporada, :duracaoEP, :numEPS, :sinopseSerie, :destinoFoto, :userID)');
    $stmt->execute(array(
      ':nomeSerie' => $nomeSerie,
      ':temporada' => $temporada,
      ':duracaoEP' => $duracaoEP,
      ':numEPS' => $numEPS,
      ':sinopseSerie' => $sinopseSerie,
      ':destinoFoto' => $destino2,
      ':userID' => $idUsuario,
    ));
  print "<script language='javascript' type='text/javascript'>alert('Série cadastrada com sucesso!');window.location.href='../adicionar_series.php'</script>";
}catch(PDOException $e) {
    
/* Informa o nível dos erros que serão exibidos */
error_reporting(E_ALL);
 
/* Habilita a exibição de erros */
ini_set("display_errors", 1);
}

            
 
