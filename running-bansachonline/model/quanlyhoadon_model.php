<?php 
require_once '../model/database_model.php';
class Quanlyhoadon{
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function selectAllHoaDon() {
        $query = "SELECT h.sodh, c.soluong, c.dongia, c.thanhtien, s.Ten as tensanpham, h.ngaygiao, c.madv as madv, h.trangthai, h.tientrinh
        FROM chitiethoadon c
        INNER JOIN sanpham s ON s.ID = c.masp
        INNER JOIN hoadon h ON h.sodh = c.sodh
        ORDER BY tensanpham";
        $stmt = $this->db->getPdo()->query($query);
        return $stmt->fetchAll();
    }
    public function updateHoaDon($column, $value, $id){
        $query = "UPDATE hoadon SET $column = ? WHERE sodh = ?";
        $stmt = $this->db->getPdo()->prepare($query);
        return $stmt->execute([$value, $id]);
    }
}
