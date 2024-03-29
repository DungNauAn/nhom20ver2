<?php
require '../model/base_model.php';
$model = new Base_Model();
$id = $_GET['id'];

$delete = $model->deleteWhere("nhaxuatban", "ID", $id);
if($delete){
    header("Location: ./quanly-nhaxuatban.php");
}