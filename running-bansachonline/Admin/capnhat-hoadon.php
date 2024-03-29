<?php
include '../model/quanlyhoadon_model.php'; 
$quanlyhoadon = new Quanlyhoadon();

$sodh = $_GET["sodh"];
$column = $_GET["col"];
$value = $_GET["value"];

if($quanlyhoadon->updateHoaDon($column, $value, $sodh)){
    header("Location: quanly-hoadon.php");
}