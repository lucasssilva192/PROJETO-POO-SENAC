<?php

require('classes/Movie.class.php');
require('classes/Food.class.php');
require('classes/Game.class.php');

class TasteManager {

  public $movie;
  public $food;
  public $game;
  public $editItem;

  public function __construct() {

    $this->movie = new Movie;
    $this->food = new Food;
    $this->game = new Game;

    $this->executeFunction();

  }

  private function executeFunction () {

    if (isset($_POST['save']) && !isset($_GET['id'])) {
      switch($_POST['save']) {
        case 'movie':
          $this->add($this->movie);
          break;
        case 'food':
          $this->add($this->food);
          break;
        case 'game':
          $this->add($this->game);
          break;
        default:
          break;
      }
    } else if (isset($_POST['save']) && isset($_GET['id'])) {
        switch($_POST['save']) {
          case 'movie':
            $this->update($this->movie);
            break;
          case 'food':
            $this->update($this->food);
            break;
          case 'game':
            $this->update($this->game);
            break;
          default:
            break;
      } 
    }

    if (isset($_POST['delete'])) {
      switch($_POST['delete']) {
        case 'movie':
          $this->delete($this->movie);
          break;
        case 'food':
          $this->delete($this->food);
          break;
        case 'game':
          $this->delete($this->game);
          break;
        default:
          break;
      }
    }

    if (isset($_POST['edit'])) {
      switch($_POST['edit']) {
        case 'movie':
          $this->edit($this->movie);
          break;
        case 'food':
          $this->edit($this->food);
          break;
        case 'game':
          $this->edit($this->game);
          break;
        default:
          break;
      }
    }
  }

  private function add(object $object) {

    $add = $object->setData($_POST);

    if ($add) $object->insert();

    $_POST = array();

  }

  private function delete(object $object) {

    $delete = $object->setData($_GET);

    if ($delete) $object->delete();

    $_POST = array();
    $_GET = array();

    $this->clearUrl();

  }

  private function edit(object $object) {

    $edit = $object->setData($_GET);
    $this->editItem = $object->getData($_GET['id']);

  }

  private function update(object $object) {

    $update = $object->setData($_POST);
    
    if ($update) $object->update();

    $_POST = array();
    $_GET = array();

    $this->clearUrl();

  }

  private function clearUrl() {
    (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? $url = "https://" : $url = "http://";

    $url.= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];   
     
    $url = strtok($url, '?');

    header('Location: '.$url);  
  }
}

$tm = new TasteManager;