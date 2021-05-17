<?php

require(__DIR__.'/../interfaces/food.interface.php');
require_once(__DIR__.'/abstracts/Category.class.php');

Class Food extends Category implements iFood {

  protected $id;
  protected $name;
  protected $flavour;
  protected $restaurant;
  protected $description;
  protected $observation;
  protected $rating;

  public function __construct() {

    parent::__construct();

  }

  public function setData(array $data):bool {

    $get_id = isset($_GET['id']) ? $_GET['id'] : '';

    $this->id = $get_id ? $get_id : $data['id'] ?? '';
    $this->name = $data['name'] ?? '';
    $this->flavour = $data['flavour'] ?? '';
    $this->restaurant = $data['restaurant'] ?? '';
    $this->description = $data['description'] ?? '';
    $this->observation = $data['observation'] ?? '';
    $this->rating = $data['rating'] ?? '';

    return true;

  }

  public function getData($id = null):array {

    $query = ($id) ? "SELECT * FROM foods WHERE id = :id" : "SELECT * FROM foods ORDER BY name";

    $statement = $this->prepare($query);

    ($id) ? $statement->execute(['id' => $id]) : $statement->execute();
    
    return array_values($statement->fetchAll());
  }

  public function insert():bool {

    $statement = $this->prepare("INSERT INTO foods 
                                    (name, flavour, restaurant, description, observation, rating) 
                                VALUES 
                                    (:name, :flavour, :restaurant, :description, :observation, :rating)");
    
    if ($statement->execute([ 
                            ':name' => $this->name,
                            ':flavour' => $this->flavour,
                            ':restaurant' => $this->restaurant,
                            ':description' => $this->description,
                            ':observation' => $this->observation,
                            ':rating' => $this->rating
                          ])) return true;

    return false;
  }

  public function delete() {

    if ($this->id) {

      $statement = $this->prepare('DELETE FROM foods WHERE id = :id');

      $statement->execute(['id' => $this->id]);

    } 
  
  }

  public function update() {

    $statement = $this->prepare('UPDATE foods SET 
                                name = :name, 
                                flavour = :flavour, 
                                restaurant = :restaurant,
                                description = :description, 
                                observation = :observation, 
                                rating = :rating
                                WHERE id = :id');

    $statement->execute([':name' => $this->name,
                          ':flavour' => $this->flavour,
                          ':restaurant' => $this->restaurant,
                          ':description' => $this->description,
                          ':observation' => $this->observation,
                          ':rating' => $this->rating,
                          ':id' => $this->id]);

  }
}