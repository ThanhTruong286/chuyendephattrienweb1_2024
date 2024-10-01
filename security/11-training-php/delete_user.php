<?php
require_once 'models/UserModel.php';
require_once 'function.php';
session_start();

$userModel = new UserModel();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['id'])) {
    die("Bạn phải đăng nhập để thực hiện hành động này.");
}


if($_GET['id'] === $_SESSION['id']){
    //giải mã id đang mã hóa
    $_id = decryptId($_GET['id']);
    echo $_id;
    //xóa người dùng
    $userModel->deleteUserById($_id);//Delete existing user

    unset($_SESSION['id']);

}

header('location: list_users.php');
?>