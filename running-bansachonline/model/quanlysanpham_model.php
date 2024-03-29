<?php 
require_once '../model/database_model.php';
class Quanlysanpham{
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function addProduct($name, $hinhanh, $manhasx, $ngay, $gia, $khuyenmai, $giakhuyenmai, $tacgia, $mota) {
        $pdo = $this->db->getPdo();
        $query = "INSERT INTO sanpham (Ten, HinhAnh, Manhasx, date, Gia, KhuyenMai, Mota, giakhuyenmai, tacgia) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$name, $hinhanh, $manhasx, $ngay, $gia, $khuyenmai, $mota, $giakhuyenmai, $tacgia]);
    }
    public function editProduct($id, $name, $hinhanh, $manhasx, $ngay, $gia, $khuyenmai, $giakhuyenmai, $tacgia, $mota) {
        $pdo = $this->db->getPdo();
        $query = "UPDATE sanpham 
                  SET Ten=?, HinhAnh=?, Manhasx=?, date=?, Gia=?, KhuyenMai=?, Mota=?, giakhuyenmai=?, tacgia=?
                  WHERE id=?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$name, $hinhanh, $manhasx, $ngay, $gia, $khuyenmai, $mota, $giakhuyenmai, $tacgia, $id]);
    }
    public function chiTietSanPham($id){
        $pdo = $this->db->getPdo();
        $query = "SELECT s.ID,s.Ten,s.date,s.Gia,s.HinhAnh,s.KhuyenMai,s.giakhuyenmai,s.Mota, n.Ten as Tennhasx,s.Manhasx
        FROM sanpham s 
        LEFT JOIN nhaxuatban n on n.ID = s.Manhasx
        WHERE  s.id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
