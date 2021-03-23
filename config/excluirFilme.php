<?php

require_once 'db.php';

require_once 'session.php';

$idFilme = $_POST['filmeID'];

try{
$stmt = $objBanco->prepare(" DELETE FROM filmes WHERE filmeID = $idFilme ");
if( $stmt->execute() ) {
print "<script language='javascript' type='text/javascript'>alert('Filme Excluído Com Sucesso.');window.location.href='../meus_filmes.php'</script>";
}
}
catch(PDOException $e) {
  ini_set("display_errors", 1);
  error_reporting(E_ALL);
}






