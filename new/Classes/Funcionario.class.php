<?php
require(__DIR__ . '/../Interfaces/funcionario.interface.php');
require_once(__DIR__ . '/../Classes/Validacao.class.php');
require_once(__DIR__ . '/Abstratas/TipoFuncionario.class.php');

Class Funcionario extends TipoFuncionario implements iFuncionario{

    protected $id;
    protected $cpf;
    protected $nome;
    protected $endereco;
    protected $cep;
    protected $celular;

    public function __construct(){

		parent::__construct();
	}

    public function setDados(array $dados):bool{
        $this->id = $dados['id'] ?? null;
        $this->cpf = $dados['cpf'] ?? null;
        $this->nome = $dados['nome'] ?? null;
        $this->endereco = $dados['endereco'] ?? null;
        $this->cep = $dados['cep'] ?? null;
        $this->celular = $dados['celular'] ?? null;
        return true;
    }

    public function getDados( $cpf = null ): array{
        $this->cpf = $dados['cpf'] ?? null;
        $stmt = $this->prepare('SELECT * FROM 
                                tbl_funcionario  
                                WHERE 
                                cpf = :cpf');
        return [$stmt];
  }

     
    public function deletar():bool{
        if ($this->cpf){
            $stmt = $this->prepare('DELETE FROM tbl_funcionario 
                                    WHERE cpf = :cpf');
            if($stmt->execute([':cpf'=>$this->cpf])){
                return true;
            }else{
                return false;
            } 
        }else{
            return false;
        }
    }


    public function atualizar(){
        $stmt = $this->prepare('UPDATE tbl_funcionario 
                                SET cpf = :cpf, nome = :nome, endereco = :endereco, cep = :cep, celular = :celular 
                                WHERE cpf = :cpf');
        if ($stmt->execute([':cpf' => $this->cpf, 
                            ':nome' => $this->nome,
                            ':endereco' => $this->endereco,
                            ':cep' => $this->cep,
                            ':celular' => $this->celular,
                            ':id' => $this->id])){
           return true;
       }        
       return false;
    }


    //ANTES DO PADRÃO OPEN CLOSED 
    /* 
    public function validarcep(){
        if(strlen($this->cep) != 8){
            return false;
        }else{
            return true;
        }
    }
    public function validarcpf(){
        if(strlen($this->cpf) != 11){
            return false;
        }else{
            return true;
        }
    }
    */

    //SEGUINDO PADRÃO OPEN CLOSED
    

    //public function validarCpf extends validar

    public function inserir(){

        $stmt = $this->prepare('INSERT INTO 
                                tbl_funcionario (cpf, nome, endereco, cep, celular) 
                                VALUES 
                                                (:cpf, :nome, :endereco, :cep, :celular)');
       if ($stmt->execute([':cpf' => $this->cpf, 
                            ':nome' => $this->nome, 
                            ':endereco' => $this->endereco, 
                            ':cep' => $this->cep, 
                            ':celular' => $this->celular])){
           return true;
       }        
       return false;
    
        //SEGUINDO CONCEITO DE RESPONSABILIDADE UNICA, ANTES O QUE ERA VALIDADO NA FUNÇÃO INSERIR, TEM SUAS PROPRIAS FUNCOES
        /*
        if(strlen($this->cpf) != 11){
            return false;
        }
        if(strlen($this->cep) != 8){
            return false;
        }
        

        $stmt = $this->prepare('INSERT INTO 
                                tbl_funcionario (cpf, nome, endereco, cep, celular) 
                                VALUES 
                                                (:cpf, :nome, :endereco, :cep, :celular)');
       if ($stmt->execute([':cpf' => $this->cpf, 
                            ':nome' => $this->nome, 
                            ':endereco' => $this->endereco, 
                            ':cep' => $this->cep, 
                            ':celular' => $this->celular])){
           return true;
       }        
       return false;
       */
    }

    public function consultar(){
        $stmt = $this->prepare('SELECT * FROM 
                                tbl_funcionario  
                                WHERE 
                                cpf = :cpf');

       if ($stmt->execute()){
           return true;
       }        
       return false;
    }

    public function listar():array{
        $stmt = $this->prepare('SELECT * FROM tbl_funcionario');
        $stmt->execute();
        return $stmt->fetchAll();
    }


}