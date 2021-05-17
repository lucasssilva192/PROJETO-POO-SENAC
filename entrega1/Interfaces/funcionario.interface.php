<?php

interface iFuncionario{
    public function setDados(array $dados):bool;
    public function getDados(int $id):array;
}