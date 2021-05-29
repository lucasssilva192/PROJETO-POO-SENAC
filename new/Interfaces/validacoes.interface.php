<?php

interface iValidacoes{
    public function setDados(array $dados);
    public function setParametro(int $parametro);
    public function valida();
}