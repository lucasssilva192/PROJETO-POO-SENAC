<?php

include_once "../Classes/Abstratas/Database.class.php";
include_once "../Classes/Funcionario.class.php";

$funcionario = new Funcionario();

$funcionario->getDados($_POST);

$funcionario->consultar();

echo $funcionario->cpf;