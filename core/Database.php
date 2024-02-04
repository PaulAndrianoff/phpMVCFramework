<?php
namespace core;

use PDO;
use PDOException;

class Database {
    private static $instance = null;
    private $connection;

    private $host;
    private $dbname;
    private $username;
    private $password;

    private function __construct() {
        // Load database configuration dynamically
        $this->host = Config::get('database.host');
        $this->dbname = Config::get('database.database');
        $this->username = Config::get('database.username');
        $this->password = Config::get('database.password');

        // Debugging output
        // echo "Host: {$this->host}\n";
        // echo "Database: {$this->dbname}\n";
        // echo "Username: {$this->username}\n";
        // echo "Password: {$this->password}\n";
        
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    public function query($sql, $params = []) {
        $stmt = $this->connection->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $stmt->bindValue(is_int($key) ? $key + 1 : $key, $value);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function fetch($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch();
    }

    public function fetchAll($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll();
    }
}
