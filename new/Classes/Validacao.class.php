<?php

require_once(__DIR__ . '/../Interfaces/validacoes.interface.php');
require_once(__DIR__ . '/../Interfaces/validacoesStrings.interface.php');

abstract class Validacao{    
    protected $dados;
    protected $dado;
    protected $parametro;

    public function setDados(array $dados){
    }

    public function setParametro(int $parametro){
    }

    public function valida(){
    }
}

abstract class ValidacaoString{
    protected $dados;
    protected $dado;

    public function setDados(array $dados){
    }

    public function valida(){
    }
}

Class ValidaCpf extends Validacao implements iValidacoes{    
    protected $dado;
    protected $parametro;

    public function setDados(array $dados):bool{
        if($this->dado = $dados['cpf'] ?? null){
            return true;
        } else {
            return false;
        }
        parent::setDados($this->dado);
    }

    public function setParametro(int $parametro){
        $this->parametro = 11;
        parent::setParametro($this->parametro);
    }

    public function valida(){
        if (strlen($this->dado) != $this->parametro){
            return false;
        } else {
            return true;
        }
        parent::valida();
    }

}

Class ValidaCep extends Validacao implements iValidacoes{
    protected $dado;
    protected $parametro;

    public function setDados(array $dados):bool{
        if ($this->dado = $dados['cep'] ?? null){
            return true;
        } else{
            return false;
        }
        parent::setDados($this->dado);
    }

    public function setParametro(int $parametro){
        $this->parametro = 8;
        parent::setParametro($this->parametro);
    }

    public function valida(){
        if( strlen($this->dado) != $this->parametro ){
            return false;
        } else {
            return true;
        }
        parent::valida();
    }

}

Class ValidaNome extends ValidacaoString implements iValidacoesStrings{
    protected $dado;

    public function setDados(array $dados):bool{
        if($this->dado = $dados['nome'] ?? null){
            return true;
        } else {
            return false;
        }
        parent::setDados($this->dado);
    }

    public function valida(): bool{
        if ( strstr($this->dado, ' ')){
            return true;
        } else{
            return false;
        }
    }

}