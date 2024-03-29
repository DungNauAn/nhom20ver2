<?php
function getInforUser($email){ // lấy thông tin của người dùng
    include './inc/myconnect.php';
    $stmt = $conn->prepare("SELECT * FROM loginuser WHERE email = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
?>
