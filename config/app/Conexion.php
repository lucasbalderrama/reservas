<?php
class Conexion {
    private $connect;
    public function __construct() {
        $pdo = "mysql:host" . HOST . ",dbname=" . DATABASE . ";". CHARSET;
        try {
            $this->connect = new PDO($pdo, USER, PASS);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: ". $e->getMessage();
        }
    }
    public function conectar() {
        return $this->connect;
    }
}
?>