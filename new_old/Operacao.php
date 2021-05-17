<?php

require('Classes/Funcionario.class.php');

class Main {

    private $objFuncionario;

    public function __construct(){
        echo "\n\n Start do programa \n\n" ;

        $this->objFuncionario = new Funcionario;
        $this->verificaSeExisteArg(1);
        $this->executaOperacao( $_SERVER['argv'][1]);
    }

    private function executaOperacao(string $operacao){

		switch ($operacao) { 
			case 'gravaFuncionario':
				$this->gravaFuncionario();
				break;

			case 'editaFuncionario':
				$this->editaFuncionario();
				break;				
			
			case 'listaFuncionario':
				$this->listaFuncionario();
				break;	

			case 'apagaFuncionario':
				$this->apagaFuncionario();
				break;	

			default:
				echo "\nERRO: Não existe a funcionalidade {$_SERVER['argv'][1]}\n";				
		}
	}

    private function apagaFuncionario(){

		$dados = $this->tratarDados();

		$this->objFuncionario->setDados($dados);

		if ( $this->objFuncionario->deletar() ){

			echo "\n Funcionário apagado com sucesso! \n";

		} else {

			echo "\n Erro ao tentar apagar o funcionário, você enviou o ID? \n";
		}

	}

    private function listaFuncionario(){

		$lista = $this->objFuncionario->listar();

		echo "ID: \t CPF: \t\t Nome: \t\t Endereco: \t\t CEP: \t\t Celular: \n";

		foreach ($lista as $funcionario) {
			
			echo "{$funcionario['id']} \t {$funcionario['cpf']} \t {$funcionario['nome']} \t {$funcionario['endereco']} \t {$funcionario['cep']} \t {$funcionario['celular']} \n";
		}

	}

    private function editaFuncionario(){
		$dados = $this->tratarDados();
		$this->objFuncionario->setDados($dados);
		if( $this->objFuncionario->gravar() ){
			echo "\n Funcionário editado com sucesso! \n";
		}
	}

    
	private function gravaFuncionario(){
		$dados = $this->tratarDados();
		$this->objFuncionario->setDados($dados);
		if( $this->objFuncionario->gravar() ){
			echo "\n Funcionário gravado com sucesso!\n";
		}
	}

    private function verificaSeExisteArg(int $numArg){
		if ( !isset($_SERVER['argv'][$numArg]) ) {
			if ( $numArg == 1 ) { 
				$msg = " Para utilizar o programa digite: php Operacao.php [operação]";
			} else {
				$msg = " Para utilizar o programa digite: php Operacao.php [operação] [dado=valor,dado2=valor2,...,dadoN=valorN]";
			}
			echo "\n\nErro: $msg\n\n";
			exit();
		}
	}

    private function tratarDados(){
	$this->verificaSeExisteArg(2);
		$args = explode( ',' , $_SERVER['argv'][2]); //dados passados pelo usuário na linha de 	comando
		foreach ($args as $valor) {
			$arg = explode('=', $valor);
			$dados[$arg[0]] = $arg[1];
		}
		return $dados;
	}

    public function __destruct(){
		echo "\n\n--- FIM DO PROGRAMA ---\n\n";
	}
}

new Main;