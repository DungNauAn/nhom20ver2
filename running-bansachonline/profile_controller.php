<?php
require_once "model.php";

if(!isset($_SESSION['txtus'])) {
    header("Location: account.php");  
    exit();
}

$user = getInforUser($_SESSION["email"]);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["update"])){
        $where = $_SESSION["email"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $fullname = $_POST["fullname"];
        $numberphone = $_POST["numberphone"];

        if(!empty($email) && !empty($password) && !empty($fullname) && !empty($numberphone)){
            include './inc/myconnect.php';
            $stmt = $conn->prepare("UPDATE loginuser SET email = ?, matkhau = ?, HoTen = ?, DienThoai = ? WHERE email = ?");
            $stmt->bind_param("sssss", $email, $password, $fullname, $numberphone, $where);
            if($stmt->execute()){
                // Nếu cần thông báo thành công hoặc điều hướng đến một trang khác
                // Thì thêm mã tại đây
            }
        } else {
            echo "Chưa nhập đầy đủ thông tin";
        }
    }
}

// Include profile_view.php để hiển thị giao diện cho người dùng
include 'profile_view.php';
?>
