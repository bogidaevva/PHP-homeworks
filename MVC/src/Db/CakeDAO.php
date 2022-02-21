<?php

namespace Cakes\Db;

use Cakes\Kernel\DBConnection;
use PDO;

class CakeDAO
{
    private $connection;

    public function __construct()
    {
        $this->connection = DBConnection::getInstance()->getConnection();
    }

    private function prepareRequest($sql) {
        $connection = DbConnection::getInstance()->getConnection();
        return $connection->prepare($sql);
    }

    public function addCakeDB($id, $title, $price, $description, $picture) 
    {
        $sql = "INSERT INTO tb_cakes(id, title, price, description, picture) VALUES (?, ?, ?, ?, ?)";
        $params = [$id, $title, $price, $description, $picture];
        $statement = $this->prepareRequest($sql);
        return $statement->execute($params);
    }

    public function getCakeById($id) 
    {
        $sql = "SELECT title, price, description, picture FROM tb_cakes WHERE id = ?";
        $statement = $this->prepareRequest($sql);
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllCakes()
    {
        $sql = "SELECT * FROM tb_cakes";
        $statement = $this->prepareRequest($sql);
        $statement->execute([]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCakesByPrice($min, $max)
    {
        $sql = "SELECT id, title, description, price, picture FROM tb_cakes WHERE price > ? and price < ?";
        $params = [$min, $max];
        $statement = $this->prepareRequest($sql);
        $statement->execute($params);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCakesByTitle($title)
    {
        
        $sql = "SELECT id, title, description, price, picture FROM tb_cakes WHERE title = ? ";
        $statement = $this->prepareRequest($sql);
        $statement->execute([$title]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}