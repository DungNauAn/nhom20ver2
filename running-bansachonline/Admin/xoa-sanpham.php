<?php
require '../model/base_model.php';
$model = new Base_Model(); 
$id = $_GET['id'];
$delete = $model->deleteWhere('sanpham', 'ID', $id);
if($delete){
    header('Location: quanly-sanpham.php');
}else{
    echo "Error deleting record: " . $conn->error;
}