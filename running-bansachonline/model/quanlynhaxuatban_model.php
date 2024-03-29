<?php 
require_once '../model/database_model.php';
class Quanlynhaxuatban{
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function addNhaXuatBan($name) {
        $pdo = $this->db->getPdo();
        $query = "INSERT INTO nhaxuatban (Ten) 
                  VALUES (?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$name]);
    }
    public function editNhaXuatBan($name, $id) {
        $pdo = $this->db->getPdo();
        $query = "UPDATE nhaxuatban
                  SET Ten=?
                  WHERE ID=?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$name, $id]);
    }
}
