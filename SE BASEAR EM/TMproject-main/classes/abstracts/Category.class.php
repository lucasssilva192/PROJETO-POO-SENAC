<?php

require_once 'DataBase.class.php';

abstract class Category extends DataBase {
  
  protected $id;
  protected $name;
  protected $description;
  protected $observation;
  protected $rating;

  public function __construct() {

    parent::__construct();
      
  }
}