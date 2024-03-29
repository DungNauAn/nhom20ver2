<?php

require_once 'database_model.php';

class Base_Model {
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function selectAll($table) {
        $query = "SELECT * FROM $table";
        $stmt = $this->db->getPdo()->query($query);
        return $stmt->fetchAll();
    }
    public function selectWhere($table, $column, $value) {
        $query = "SELECT * FROM $table WHERE $column = ?";
        $stmt = $this->db->getPdo()->prepare($query);
        $stmt->execute([$value]);
        return $stmt->fetchAll();
    }
    public function selectWhereOne($table, $column, $value) {
        $query = "SELECT * FROM $table WHERE $column = ?";
        $stmt = $this->db->getPdo()->prepare($query);
        $stmt->execute([$value]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteWhere($table, $column, $value) {
        $query = "DELETE FROM $table WHERE $column = ?";
        $stmt = $this->db->getPdo()->prepare($query);
        return $stmt->execute([$value]);
    }
}

