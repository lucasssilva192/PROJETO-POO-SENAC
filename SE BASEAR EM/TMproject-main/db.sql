CREATE DATABASE tmproject;

USE tmproject;

CREATE TABLE movies (
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  	name VARCHAR(255) NOT NULL,
  	genre VARCHAR(255),
  	director VARCHAR(255),
  	description VARCHAR(255),
  	observation VARCHAR(255),
    rating TINYINT NOT NULL
);

CREATE TABLE foods (
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  	name VARCHAR(255) NOT NULL,
  	flavour VARCHAR(255),
  	restaurant VARCHAR(255),
  	description VARCHAR(255),
  	observation VARCHAR(255),
    rating TINYINT NOT NULL
);

CREATE TABLE games (
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  	name VARCHAR(255) NOT NULL,
  	genre VARCHAR(255),
  	platform VARCHAR(255),
  	description VARCHAR(255),
  	observation VARCHAR(255),
    rating TINYINT NOT NULL
);