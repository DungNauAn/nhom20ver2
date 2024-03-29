<?php 
require_once '../model/database_model.php';
class Quanlydichvu{
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function addDichvu($name, $price) {
        $pdo = $this->db->getPdo();
        $query = "INSERT INTO dichvu (tendv, gia) 
                  VALUES (?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$name, $price]);
    }
    public function editDichvu($name, $price, $id) {
        $pdo = $this->db->getPdo();
        $query = "UPDATE dichvu
                  SET tendv=?, gia = ?
                  WHERE madv=?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$name, $price, $id]);
    }
}
