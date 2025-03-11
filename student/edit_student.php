<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chỉnh Sửa Sinh Viên</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-warning text-white text-center">
                <h3>Chỉnh Sửa Sinh Viên</h3>
            </div>
            <div class="card-body">
                <?php
                include '../config.php';

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM SinhVien WHERE SinhVienID=$id";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $id = $_POST['id'];
                    $hoTen = $_POST['HoTen'];
                    $maSinhVien = $_POST['MaSinhVien'];
                    $ngaySinh = $_POST['NgaySinh'];
                    $lop = $_POST['Lop'];
                    $email = $_POST['Email'];
                    $soDienThoai = $_POST['SoDienThoai'];

                    $sql = "UPDATE SinhVien SET HoTen='$hoTen', MaSinhVien='$maSinhVien', NgaySinh='$ngaySinh', Lop='$lop', Email='$email', SoDienThoai='$soDienThoai' WHERE SinhVienID=$id";

                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='alert alert-success'>Cập nhật thành công!</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Lỗi: " . $conn->error . "</div>";
                    }
                }
                ?>

                <form method="POST" action="edit_student.php">
                    <input type="hidden" name="id" value="<?php echo $row['SinhVienID']; ?>">

                    <div class="mb-3">
                        <label class="form-label">Họ Tên:</label>
                        <input type="text" name="HoTen" class="form-control" value="<?php echo $row['HoTen']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mã Sinh Viên:</label>
                        <input type="text" name="MaSinhVien" class="form-control" value="<?php echo $row['MaSinhVien']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ngày Sinh:</label>
                        <input type="date" name="NgaySinh" class="form-control" value="<?php echo $row['NgaySinh']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lớp:</label>
                        <input type="text" name="Lop" class="form-control" value="<?php echo $row['Lop']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" name="Email" class="form-control" value="<?php echo $row['Email']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Số Điện Thoại:</label>
                        <input type="text" name="SoDienThoai" class="form-control" value="<?php echo $row['SoDienThoai']; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Cập Nhật</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>