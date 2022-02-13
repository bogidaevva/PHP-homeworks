<?php
require_once 'DBConnection.php';

class UserDAO 
{
    const SELECT_PASSWORD_SQL = "SELECT password FROM tb_users WHERE login = ?";
    const SELECT_ID_SQL = "SELECT id FROM tb_users WHERE login = ?";
    const INSERT_USER = "INSERT INTO tb_users(login, password) VALUES (?, ?)";

    private function prepareRequest($sql) {
        $connection = DbConnection::getInstance()->getConnection();
        return $connection->prepare($sql);
    }

    public function getPasswordByLogin(string $login) 
    {
        $statement = $this->prepareRequest($this::SELECT_PASSWORD_SQL);
        $statement->execute([$login]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getIdByLogin(string $login) 
    {
        $statement = $this->prepareRequest($this::SELECT_ID_SQL);
        $statement->execute([$login]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function addNewUser($login, $password) 
    {
        $params = [$login, $password];
        $statement = $this->prepareRequest($this::INSERT_USER);
        return $statement->execute($params);
    }
}


