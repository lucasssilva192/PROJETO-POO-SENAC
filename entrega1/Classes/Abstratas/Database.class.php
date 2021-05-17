<?php

abstract class Database extends PDO{
    
    protected $user = 'root';
    protected $pass = '';
    protected $db_name = 'db_proj_poo';
    protected $host = 'localhost';
    protected $port = '3306';
    protected $driver = 'mysql';

    public function __construct(){

        $dns = $this->driver . ':host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->db_name;

        parent::__construct($dns, $this->user, $this->pass);
    }
}