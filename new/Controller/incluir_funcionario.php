<?php

include_once "../Classes/Abstratas/Database.class.php";
include_once "../Classes/Funcionario.class.php";
include_once "../Classes/Validacao.class.php";

$funcionario = new Funcionario();

$validaCep = new ValidaCep();
$validaCpf = new ValidaCpf();
$validaNome = new ValidaNome();

$funcionario->setDados($_POST);


$validaCep->setDados($_POST);
$validaCpf->setDados($_POST);
$validaNome->setDados($_POST);

$validaCep->setParametro(8);
$validaCpf->setParametro(11);


if( $validaCpf->valida() && $validaNome->valida() && $validaCep->valida()){
    if($funcionario->inserir()){
        header('Location: ../VIEWS/inserir.php');
    }
} else{
    echo 'Erro ao inserir';
}


