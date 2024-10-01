<?php
session_start();
require_once 'models/UserModel.php';
require_once 'function.php'; 

$userModel = new UserModel();
$user = NULL;
$ID = NULL;
$errors = [];

if (!empty($_GET['id'])) {
    // Giải mã ID từ URL
    $encryptedId = $_GET['id'];
    $ID = decryptId($encryptedId);

    if ($ID) {
        // Kiểm tra quyền hạn
        if ($ID != decryptId($_SESSION['id'])) {
            // Nếu không phải admin và ID không khớp với ID người dùng hiện tại, chặn truy cập
            echo "Không phải chính chủ";
            exit;
        }
        $user = $userModel->findUserById($ID); // Tìm kiếm người dùng bằng ID đã giải mã
    } else {
        // Nếu ID không hợp lệ, trả về trang lỗi hoặc thông báo
        echo "ID không hợp lệ";
        exit;
    }
}

// Xử lý cập nhật hoặc thêm mới người dùng
if (!empty($_POST['submit'])) {
    // Validate dữ liệu
    $name = trim($_POST['name']);
    $password = $_POST['password'];

    // Kiểm tra Name
    if (empty($name)) {
        $errors[] = "Tên đăng nhập bắt buộc";
    } elseif (!preg_match("/^[a-zA-Z0-9]{5,15}$/", $name)) {
        $errors[] = "Gồm 5 đến 15 ký tự, là ký tự hợp lệ: A->Z, a->z, 0->9";
    }

    // Kiểm tra Password
    if (empty($password)) {
        $errors[] = "Mật khẩu là bắt buộc";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()])[A-Za-z\d~!@#$%^&*()]{5,10}$/", $password)) {
        $errors[] = "Mật khẩu phải bao gồm: chữ thường(a->z), chữ hoa (A->Z), số (0->9) và ký tự đặc biệt: (~!@#$%^&*()).";
    }

    // Nếu không có lỗi thì cập nhật hoặc thêm mới người dùng
    if (empty($errors)) {
        if (!empty($ID)) {
            $userModel->updateUser($_POST); // Cập nhật người dùng nếu ID hợp lệ
        } else {
            
            $userModel->insertUser($_POST); // Tạo người dùng mới
        }
        header('location: login.php');
    }
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
        
        <!-- Hiện thông báo lỗi bằng hàm alert() -->
        <script type="text/javascript">
            <?php if (!empty($errors)) { ?>
                let errorMessages = <?php echo json_encode($errors); ?>;
                alert(errorMessages.join("\n"));
            <?php } ?>
        </script>
        
    <div class="container">

            <?php if ($user || !isset($ID)) { ?>
                <div class="alert alert-warning" role="alert">
                    User form
                </div>
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $ID ?>">
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