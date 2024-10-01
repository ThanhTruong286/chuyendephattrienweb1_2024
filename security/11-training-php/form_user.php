<?php
session_start();
require_once 'models/UserModel.php';
require_once 'function.php'; 

$userModel = new UserModel();
$user = NULL;
$_id = NULL;

if (!empty($_GET['id'])) {
    // Giải mã ID từ URL
    $encryptedId = $_GET['id'];
    $_id = decryptId($encryptedId);

    if ($_id) {
        // Kiểm tra quyền hạn
        if ($_SESSION['user_type'] !== 'admin' && $_id != decryptId($_SESSION['id'])) {
            // Nếu không phải admin và ID không khớp với ID người dùng hiện tại, chặn truy cập
            echo "Access denied!";
            exit;
        }
        $user = $userModel->findUserById($_id); // Tìm kiếm người dùng bằng ID đã giải mã
    } else {
        // Nếu ID không hợp lệ, trả về trang lỗi hoặc thông báo
        echo "Invalid ID";
        exit;
    }
}

// Xử lý cập nhật hoặc thêm mới người dùng
if (!empty($_POST['submit'])) {
    if (!empty($_id)) {
        $userModel->updateUser($_POST); // Cập nhật người dùng nếu ID hợp lệ
    } else {
        $userModel->insertUser($_POST); // Tạo người dùng mới
    }
    header('location: list_users.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">

            <?php if ($user || !isset($_id)) { ?>
                <div class="alert alert-warning" role="alert">
                    User form
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $_id ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>'>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>

                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php } else { ?>
                <div class="alert alert-success" role="alert">
                    User not found!
                </div>
            <?php } ?>
    </div>
</body>
</html>