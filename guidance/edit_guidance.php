<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chỉnh Sửa Quan Hệ Hướng Dẫn</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-warning text-white text-center">
                <h3>Chỉnh Sửa Quan Hệ Hướng Dẫn</h3>
            </div>
            <div class="card-body">
                <?php
                include '../config.php';

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM SinhVienGiangVienHuongDan WHERE ID=$id";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $id = $_POST['id'];
                    $sinhVienID = $_POST['SinhVienID'];
                    $giangVienID = $_POST['GiangVienID'];
                    $ngayBatDau = $_POST['NgayBatDau'];
                    $ghiChu = $_POST['GhiChu'];

                    $sql = "UPDATE SinhVienGiangVienHuongDan SET 
                        SinhVienID='$sinhVienID', 
                        GiangVienID='$giangVienID', 
                        NgayBatDau='$ngayBatDau', 
                        GhiChu='$ghiChu' 
                        WHERE ID=$id";

                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='alert alert-success'>Cập nhật thành công!</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Lỗi: " . $conn->error . "</div>";
                    }
                }
                ?>

                <form method="POST" action="edit_guidance.php">
                    <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">

                    <div class="mb-3">
                        <label class="form-label">Sinh Viên:</label>
                        <select name="SinhVienID" class="form-control" required>
                            <?php
                            $sql = "SELECT * FROM SinhVien";
                            $result = $conn->query($sql);
                            while ($sv = $result->fetch_assoc()) {
                                $selected = ($sv['SinhVienID'] == $row['SinhVienID']) ? "selected" : "";
                                echo "<option value='" . $sv['SinhVienID'] . "' $selected>" . $sv['HoTen'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Giảng Viên:</label>
                        <select name="GiangVienID" class="form-control" required>
                            <?php
                            $sql = "SELECT * FROM GiangVien";
                            $result = $conn->query($sql);
                            while ($gv = $result->fetch_assoc()) {
                                $selected = ($gv['GiangVienID'] == $row['GiangVienID']) ? "selected" : "";
                                echo "<option value='" . $gv['GiangVienID'] . "' $selected>" . $gv['HoTen'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ngày Bắt Đầu:</label>
                        <input type="date" name="NgayBatDau" class="form-control" value="<?php echo $row['NgayBatDau']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ghi Chú:</label>
                        <input type="text" name="GhiChu" class="form-control" value="<?php echo $row['GhiChu']; ?>">
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