<?php

include_once "../Classes/Abstratas/Database.class.php";
include_once "../Classes/Funcionario.class.php";

$funcionario = new Funcionario();

$funcionario->setDados($_POST);

if($funcionario->validarcep()){
    echo "erro";
}

if($funcionario->validarcpf()){
    echo "erro";
}

if($funcionario->inserir()){
    header('Location: ../VIEWS/inserir.php');
}