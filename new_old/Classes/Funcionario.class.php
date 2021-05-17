<?php
require(__DIR__ . '/../Interfaces/funcionario.interface.php');
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

    public function getDados( int $id): array{
        return ['1'];
    }

    public function gravar(){
        if(empty($this->id)){
           return $this->inserir();
        } else{
            return $this->atualizar();
        }
    }

     
    public function deletar():bool{
        if ($this->id){
            $stmt = $this->prepare('DELETE FROM tbl_funcionario 
                                    WHERE id = :id');
            if($stmt->execute([':id'=>$this->id])){
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
                                WHERE id = :id');
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
    }

    public function listar():array{
        $stmt = $this->prepare('SELECT * FROM tbl_funcionario');
        $stmt->execute();
        return $stmt->fetchAll();
    }


}