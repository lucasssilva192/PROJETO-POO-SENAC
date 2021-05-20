<?php

require(__DIR__ . '/../Interfaces/validacao.interface.php');

Class ValidaCpf implements iValidacoes{
    
    protected $dado;
    protected $parametro;
    protected $cpf;

    public function setDados(array $dados):bool{
        $this->cpf = $dados['cpf'] ?? null;
        return true;
    }
    
    public function setDado(){
        $this->dado = $this->cpf;
    }

    public function setParametro(){
        $this->parametro = 11;
    }

    public function calcular(){
        if( strlen($this->dado) != $this->parametro ){
            return false;
        } else {
            return true;
        }
    }

}

Class ValidaCep implements iValidacoes{
    
    protected $dado;
    protected $parametro;
    protected $cep;

    public function setDados(array $dados):bool{
        $this->cep = $dados['cep'] ?? null;
        return true;
    }
    
    public function setDado(){
        $this->dado = $this->cep;
    }

    public function setParametro(){
        $this->parametro = 8;
    }

    public function calcular(){
        if( strlen($this->dado) != $this->parametro ){
            return false;
        } else {
            return true;
        }
    }

}


