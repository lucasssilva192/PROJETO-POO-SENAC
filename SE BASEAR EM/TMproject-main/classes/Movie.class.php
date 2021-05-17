<?php

require(__DIR__.'/../interfaces/movie.interface.php');
require_once(__DIR__.'/abstracts/Category.class.php');

Class Movie extends Category implements iMovie {

  protected $id;
  protected $name;
  protected $genre;
  protected $director;
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
    $this->director = $data['director'] ?? '';
    $this->description = $data['description'] ?? '';
    $this->observation = $data['observation'] ?? '';
    $this->rating = $data['rating'] ?? '';

    return true;

  }

  public function getData($id = null):array {

    $query = ($id) ? "SELECT * FROM movies WHERE id = :id" : "SELECT * FROM movies ORDER BY name";

    $statement = $this->prepare($query);

    ($id) ? $statement->execute(['id' => $id]) : $statement->execute();
    
    return array_values($statement->fetchAll());
  }

  public function insert():bool {

    $statement = $this->prepare("INSERT INTO movies 
                                    (name, genre, director, description, observation, rating) 
                                VALUES 
                                    (:name, :genre, :director, :description, :observation, :rating)");
    
    if ($statement->execute([ 
                            ':name' => $this->name,
                            ':genre' => $this->genre,
                            ':director' => $this->director,
                            ':description' => $this->description,
                            ':observation' => $this->observation,
                            ':rating' => $this->rating
                          ])) return true;

    return false;
  }

  public function delete() {

    if ($this->id) {

      $statement = $this->prepare('DELETE FROM movies WHERE id = :id');

      $statement->execute(['id' => $this->id]);

    } 
  
  }

  public function update() {

    $statement = $this->prepare('UPDATE movies SET 
                                name = :name, 
                                genre = :genre, 
                                director = :director,
                                description = :description, 
                                observation = :observation, 
                                rating = :rating
                                WHERE id = :id');

    $statement->execute([':name' => $this->name,
                          ':genre' => $this->genre,
                          ':director' => $this->director,
                          ':description' => $this->description,
                          ':observation' => $this->observation,
                          ':rating' => $this->rating,
                          ':id' => $this->id]);

  }
}