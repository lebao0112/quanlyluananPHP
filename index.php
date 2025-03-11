<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang Chủ - Quản Lý Đồ Án</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>

    <div class="container mt-5 text-center">
        <h2 class="mb-4">Hệ Thống Quản Lý Đồ Án</h2>

        <div class="row justify-content-center">
            <!-- Quản lý Sinh Viên -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="bi bi-person-lines-fill text-primary" style="font-size: 3rem;"></i>
                        <h5 class="card-title mt-3">Quản Lý Sinh Viên</h5>
                        <p class="card-text">Thêm, sửa, xóa và quản lý danh sách sinh viên.</p>
                        <a href="student/index.php" class="btn btn-primary">Xem danh sách</a>
                    </div>
                </div>
            </div>

            <!-- Quản lý Giảng Viên -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="bi bi-person-badge text-success" style="font-size: 3rem;"></i>
                        <h5 class="card-title mt-3">Quản Lý Giảng Viên</h5>
                        <p class="card-text">Thêm, sửa, xóa và quản lý danh sách giảng viên.</p>
                        <a href="teacher/index.php" class="btn btn-success">Xem danh sách</a>
                    </div>
                </div>
            </div>

            <!-- Quản lý Hướng Dẫn -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <i class="bi bi-people text-warning" style="font-size: 3rem;"></i>
                        <h5 class="card-title mt-3">Quản Lý Hướng Dẫn</h5>
                        <p class="card-text">Thêm, sửa, xóa và quản lý quan hệ hướng dẫn.</p>
                        <a href="guidance/index.php" class="btn btn-warning">Xem danh sách</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>