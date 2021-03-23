<?php

//XAMPP
define( 'DSN', 'mysql:dbname=pi_segundos;host=localhost');
define( 'DB_USER', 'root');
define( 'DB_PASS', '');

//SQL Server
//define( 'DSN', 'sqlsrv:Server=localhost\\SQLEXPRESS;Database=pi_segundos');
//define( 'DB_USER', 'sa');
//define( 'DB_PASS', 'bdsenac');

try {

	$objBanco = new PDO( DSN, DB_USER, DB_PASS);

} catch ( PDOException $objErro ) {

	print "<script language='javascript' type='text/javascript'>alert('Banco de Dados indisponível.');window.location.href='../home.php'</script>";

	exit();
}