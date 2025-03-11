<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm Sinh Viên</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center bg-primary text-white">
                <h3>Thêm Sinh Viên</h3>
            </div>
            <div class="card-body">
                <?php
                include '../config.php';

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $hoTen = $_POST['HoTen'];
                    $maSinhVien = $_POST['MaSinhVien'];
                    $ngaySinh = $_POST['NgaySinh'];
                    $lop = $_POST['Lop'];
                    $email = $_POST['Email'];
                    $soDienThoai = $_POST['SoDienThoai'];

                    $sql = "INSERT INTO SinhVien (HoTen, MaSinhVien, NgaySinh, Lop, Email, SoDienThoai) 
                        VALUES ('$hoTen', '$maSinhVien', '$ngaySinh', '$lop', '$email', '$soDienThoai')";

                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='alert alert-success'>Thêm sinh viên thành công!</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Lỗi: " . $conn->error . "</div>";
                    }
                }

                $conn->close();
                ?>

                <form method="POST" action="add_student.php">
                    <div class="mb-3">
                        <label class="form-label">Họ Tên:</label>
                        <input type="text" name="HoTen" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mã Sinh Viên:</label>
                        <input type="text" name="MaSinhVien" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ngày Sinh:</label>
                        <input type="date" name="NgaySinh" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lớp:</label>
                        <input type="text" name="Lop" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" name="Email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Số Điện Thoại:</label>
                        <input type="text" name="SoDienThoai" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success w-100">Thêm Sinh Viên</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>