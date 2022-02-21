CREATE DATABASE IF NOT EXISTS cakes;
USE cakes;

CREATE TABLE IF NOT EXISTS tb_cakes(
     id VARCHAR(255) NOT NULL PRIMARY KEY,
     title VARCHAR(100) NOT NULL,
     price INT UNSIGNED NOT NULL,
     description VARCHAR(255) NOT NULL,
     picture VARCHAR(255) NOT NULL
);