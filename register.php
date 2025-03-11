<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash mật khẩu
    $role = 'user'; // Mặc định là User

    // Kiểm tra xem tài khoản đã tồn tại chưa
    $check_sql = "SELECT * FROM users WHERE username='$username'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        $error = "Tên đăng nhập đã tồn tại!";
    } else {
        $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            header("Location: guidance/index.php"); // Sau khi đăng ký, chuyển đến danh sách hướng dẫn
            exit();
        } else {
            $error = "Lỗi: " . $conn->error;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng Ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="col-md-4 offset-md-4">
            <h3 class="text-center">Đăng Ký</h3>

            <?php if (isset($error)) { ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php } ?>

            <form method="POST" action="register.php">
                <div class="mb-3">
                    <label class="form-label">Tên đăng nhập</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Đăng Ký</button>
            </form>

            <div class="text-center mt-3">
                <a href="login.php">Đã có tài khoản? Đăng nhập</a>
            </div>
        </div>
    </div>

</body>

</html>