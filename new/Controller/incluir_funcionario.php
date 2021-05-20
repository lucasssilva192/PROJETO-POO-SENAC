<?php

include_once "../Classes/Abstratas/Database.class.php";
include_once "../Classes/Funcionario.class.php";
include_once "../Classes/Validacao.class.php";

$funcionario = new Funcionario();
$validaCep = new ValidaCep();
$validaCpf = new ValidaCpf();

$funcionario->setDados($_POST);

$validaCep->setDados($_POST);
$validaCep->setDado();
$validaCep->setParametro();
$validaCep->calcular();

$validaCpf->setDados($_POST);
$validaCpf->setDado();
$validaCpf->setParametro();
$validaCpf->calcular();


if($funcionario->inserir()){
    header('Location: ../VIEWS/inserir.php');
}