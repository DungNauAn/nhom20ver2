<?php
require '../model/base_model.php';
$model = new Base_Model();
$madv = $_GET['madv'];
$delete = $model->deleteWhere("dichvu", "madv", $madv);
if($delete){
    header("Location: ./quanly-dichvu.php");
}