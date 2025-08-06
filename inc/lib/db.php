<?php

// define('DB_HOST', '127.0.0.1'); // 'localhost' 대신 '127.0.0.1' 사용
// define('DB_NAME', 'dbus25br0immu4');
// define('DB_USER', 'dbus25br0immu4');
// define('DB_PASS', 'dbp25wd!#im#u!4uun');
// define('DB_PORT', 3306);
// define('DB_CHAR', 'utf8');

define('DB_HOST', 'db');
define('DB_NAME', 'nineonelabs');
define('DB_USER', 'user');
define('DB_PASS', 'password');
define('DB_PORT', 3306);
define('DB_CHAR', 'utf8mb4');

class DB {
    
  private static $instance = null;
    private $conn;

    private function __construct() {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHAR;
            $this->conn = new PDO($dsn, DB_USER, DB_PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("DB 연결 실패: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new DB();
        }
        return self::$instance->conn;
    }

    public function getConnection()
    {
    return $this->conn;        
    }

    public function prepare($query) {
        return $this->conn->prepare($query);
    }

    public function select($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // SELECT 단일 결과
    public function find($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // INSERT, UPDATE, DELETE 실행
    public function execute($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($params);
    }

    // INSERT 후 ID 반환
    public function insert($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $this->conn->lastInsertId();
    }

    // 트랜잭션 제어
    public function beginTransaction() {
        return $this->conn->beginTransaction();
    }

    public function commit() {
        return $this->conn->commit();
    }

    public function rollBack() {
        return $this->conn->rollBack();
    }
}