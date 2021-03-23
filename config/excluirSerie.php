<?php

require_once 'db.php';

require_once 'session.php';

$idSerie = $_POST['serieID'];

try{
$stmt = $objBanco->prepare(" DELETE FROM series WHERE serieID = $idSerie ");
if( $stmt->execute() ) {
print "<script language='javascript' type='text/javascript'>alert('Série Excluída Com Sucesso.');window.location.href='../minhas_series.php'</script>";
}
}
catch(PDOException $e) {
  ini_set("display_errors", 1);
  error_reporting(E_ALL);
}






