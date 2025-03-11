<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm Hướng Dẫn</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-success text-white text-center">
                <h3>Thêm Quan Hệ Hướng Dẫn</h3>
            </div>
            <div class="card-body">
                <?php
                include '../config.php';

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $sinhVienID = $_POST['SinhVienID'];
                    $giangVienID = $_POST['GiangVienID'];
                    $ngayBatDau = $_POST['NgayBatDau'];
                    $ghiChu = $_POST['GhiChu'];

                    // Kiểm tra xem dữ liệu có tồn tại trước khi thêm không
                    $check_sql = "SELECT * FROM SinhVienGiangVienHuongDan WHERE SinhVienID = '$sinhVienID' AND GiangVienID = '$giangVienID'";
                    $check_result = $conn->query($check_sql);

                    if ($check_result->num_rows > 0) {
                        echo "<div class='alert alert-warning'>Quan hệ giữa Sinh Viên và Giảng Viên này đã tồn tại!</div>";
                    } else {
                        $sql = "INSERT INTO SinhVienGiangVienHuongDan (SinhVienID, GiangVienID, NgayBatDau, GhiChu) 
                                VALUES ('$sinhVienID', '$giangVienID', '$ngayBatDau', '$ghiChu')";

                        if ($conn->query($sql) === TRUE) {
                            echo "<div class='alert alert-success'>Thêm quan hệ hướng dẫn thành công!</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Lỗi: " . $conn->error . "</div>";
                        }
                    }
                }
                ?>

                <form method="POST" action="add_guidance.php">
                    <div class="mb-3">
                        <label class="form-label">Chọn Sinh Viên:</label>
                        <select name="SinhVienID" class="form-control" required>
                            <option value="">-- Chọn Sinh Viên --</option>
                            <?php
                            include '../config.php';
                            $sql = "SELECT SinhVienID, HoTen FROM SinhVien";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['SinhVienID'] . "'>" . $row['HoTen'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Chọn Giảng Viên:</label>
                        <select name="GiangVienID" class="form-control" required>
                            <option value="">-- Chọn Giảng Viên --</option>
                            <?php
                            $sql = "SELECT GiangVienID, HoTen FROM GiangVien";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['GiangVienID'] . "'>" . $row['HoTen'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ngày Bắt Đầu:</label>
                        <input type="date" name="NgayBatDau" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ghi Chú:</label>
                        <input type="text" name="GhiChu" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success w-100">Thêm Quan Hệ</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>