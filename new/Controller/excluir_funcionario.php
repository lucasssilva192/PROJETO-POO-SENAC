<?php

include_once "../Classes/Abstratas/Database.class.php";
include_once "../Classes/Funcionario.class.php";

$funcionario = new Funcionario();

$funcionario->setDados($_POST);

if($funcionario->deletar()){
    header('Location: ../VIEWS/excluir.php');
}