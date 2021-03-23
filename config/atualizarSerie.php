<?php
    require_once 'db.php';     

    require_once 'session.php';

    $nomeSerie = $_POST['nomeSerie'];
    
    $temporada = $_POST['temporada'];
    
    $duracaoEP = $_POST['duracaoEP'];

    $numEPS = $_POST['numEPS'];

    $sinopseSerie = $_POST['sinopseSerie'];

    $serieID = $_POST['serieID'];

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
    $stmt = $objBanco->prepare('UPDATE series 
                                SET nomeSerie = :nomeSerie, temporada = :temporada, duracaoEP = :duracaoEP, numEPS = :numEPS, sinopseSerie = :sinopseSerie
                                WHERE serieID = '.$serieID.' ');
    $stmt->execute(array(
      ':nomeSerie' => $nomeSerie,
      ':temporada' => $temporada,
      ':duracaoEP' => $duracaoEP,
      ':numEPS' => $numEPS,
      ':sinopseSerie' => $sinopseSerie,
    ));
    
ini_set("display_errors", 1);
error_reporting(E_ALL);

    print "<script language='javascript' type='text/javascript'>alert('Série editado com sucesso!');window.location.href='../minhas_series.php'</script>";
}catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

            
 