<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm Giảng Viên</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-success text-white text-center">
                <h3>Thêm Giảng Viên</h3>
            </div>
            <div class="card-body">
                <?php
                include '../config.php';

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $hoTen = $_POST['HoTen'];
                    $maGiangVien = $_POST['MaGiangVien'];
                    $email = $_POST['Email'];
                    $soDienThoai = $_POST['SoDienThoai'];
                    $boMon = $_POST['BoMon'];

                    $sql = "INSERT INTO GiangVien (HoTen, MaGiangVien, Email, SoDienThoai, BoMon) 
                        VALUES ('$hoTen', '$maGiangVien', '$email', '$soDienThoai', '$boMon')";

                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='alert alert-success'>Thêm giảng viên thành công!</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Lỗi: " . $conn->error . "</div>";
                    }
                }

                $conn->close();
                ?>

                <form method="POST" action="add_teacher.php">
                    <div class="mb-3">
                        <label class="form-label">Họ Tên:</label>
                        <input type="text" name="HoTen" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mã Giảng Viên:</label>
                        <input type="text" name="MaGiangVien" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" name="Email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Số Điện Thoại:</label>
                        <input type="text" name="SoDienThoai" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Bộ Môn:</label>
                        <input type="text" name="BoMon" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Thêm Giảng Viên</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>