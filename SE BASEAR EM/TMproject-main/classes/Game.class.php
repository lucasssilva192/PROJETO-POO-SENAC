<?php

require(__DIR__.'/../interfaces/game.interface.php');
require_once(__DIR__.'/abstracts/Category.class.php');

Class Game extends Category implements iGame {

  protected $id;
  protected $name;
  protected $genre;
  protected $platform;
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
    $this->genre = $data['genre'] ?? '';
    $this->platform = $data['platform'] ?? '';
    $this->description = $data['description'] ?? '';
    $this->observation = $data['observation'] ?? '';
    $this->rating = $data['rating'] ?? '';

    return true;

  }

  public function getData($id = null):array {

    $query = ($id) ? "SELECT * FROM games WHERE id = :id" : "SELECT * FROM games ORDER BY name";

    $statement = $this->prepare($query);

    ($id) ? $statement->execute(['id' => $id]) : $statement->execute();
    
    return array_values($statement->fetchAll());
  }

  public function insert():bool {

    $statement = $this->prepare("INSERT INTO games 
                                    (name, genre, platform, description, observation, rating) 
                                VALUES 
                                    (:name, :genre, :platform, :description, :observation, :rating)");
    
    if ($statement->execute([ 
                            ':name' => $this->name,
                            ':genre' => $this->genre,
                            ':platform' => $this->platform,
                            ':description' => $this->description,
                            ':observation' => $this->observation,
                            ':rating' => $this->rating
                          ])) return true;

    return false;
  }

  public function delete() {

    if ($this->id) {

      $statement = $this->prepare('DELETE FROM games WHERE id = :id');

      $statement->execute(['id' => $this->id]);

    } 
  
  }

  public function update() {

    $statement = $this->prepare('UPDATE games SET 
                                name = :name, 
                                genre = :genre, 
                                platform = :platform,
                                description = :description, 
                                observation = :observation, 
                                rating = :rating
                                WHERE id = :id');

    $statement->execute([':name' => $this->name,
                          ':genre' => $this->genre,
                          ':platform' => $this->platform,
                          ':description' => $this->description,
                          ':observation' => $this->observation,
                          ':rating' => $this->rating,
                          ':id' => $this->id]);

  }
}