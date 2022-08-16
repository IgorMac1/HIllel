<?php


namespace Classes;


class Db
{
    private static object|null $instance = null;
    private object $db;

    private function __construct()
    {
        $config = require 'config/db.php';
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];

        $this->db = new \PDO($config['dsn'], $config['user'], $config['pass'], $options);
    }

    public static function getInstance(): object
    {
        if (!self::$instance) {
            self::$instance = new Db();
        }

        return self::$instance;
    }

    public function getConnection(): object
    {
        return $this->db;
    }

    public function query($sql, $params = [])
    {
        $db = $this->getConnection();

        $stmt = $db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function checkTable($sql, $params = []): bool
    {
        if ($this->query($sql, $params)) {
            return true;
        }
        return false;
    }

    public function getAll($sql, $params = []): array
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createTable(): void
    {
        $this->query("CREATE TABLE users(id INT NOT NULL AUTO_INCREMENT,name VARCHAR(50) NOT NULL,surname VARCHAR(50) NOT NULL,
        age INT NOT NULL,email VARCHAR(50) NOT NULL, PRIMARY KEY (id))");
    }

    public function addNewUser(array $data): void
    {
        $params = [
            'name' => strtolower($data['name']),
            'surname' => strtolower($data['surname']),
            'age' => ($data['age']),
            'email' => strtolower($data['email'])
        ];
        $this->query(
            "INSERT INTO users (name,surname,age,email) VALUES (:name,:surname,:age,:email)",
            $params
        );
    }

    public function getUsersId(): array
    {
        return $this->getAll("SELECT id FROM users");
    }

    public function getUserInfo(array $data): array
    {
        $params = [
            'id' => $data['getUser'],
        ];

        return $this->getAll("SELECT name, surname, age, email FROM users WHERE id = :id", $params);
    }

    public function deleteUsers($data): void
    {

        foreach ($data['deleteUsers'] as $key) {
            $this->query("DELETE FROM users WHERE id = $key");
        }
    }
}