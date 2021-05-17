<?php

require_once 'Database.class.php';

abstract class TipoFuncionario extends Database{
    protected $id;
    protected $cpf;
    protected $nome;
    protected $endereco;
    protected $cep;
    protected $celular;

    public function __construct(){
        parent::__construct();
    }
}