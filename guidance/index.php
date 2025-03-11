<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

$isAdmin = ($_SESSION['role'] == 'admin'); // Kiểm tra nếu là Admin

include '../config.php';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách Hướng Dẫn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">
        <div class="d-flex justify-content-between mb-3">
            <h2 class="text-center flex-grow-1">Danh Sách Quan Hệ Hướng Dẫn</h2>
            <a href="../logout.php" class="btn btn-danger">Đăng Xuất</a>
        </div>



        <!-- Chỉ hiển thị nút "Thêm Quan Hệ" nếu là Admin -->
        <?php if ($isAdmin) { ?>
            <div class="mb-3 text-end">
                <a href="add_guidance.php" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Thêm Quan Hệ
                </a>
            </div>
        <?php } ?>

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Sinh Viên</th>
                    <th>Giảng Viên</th>
                    <th>Ngày Bắt Đầu</th>
                    <th>Ghi Chú</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT h.ID, s.HoTen AS SinhVien, g.HoTen AS GiangVien, h.NgayBatDau, h.GhiChu
                        FROM SinhVienGiangVienHuongDan h
                        JOIN SinhVien s ON h.SinhVienID = s.SinhVienID
                        JOIN GiangVien g ON h.GiangVienID = g.GiangVienID";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["ID"] . "</td>
                                <td>" . $row["SinhVien"] . "</td>
                                <td>" . $row["GiangVien"] . "</td>
                                <td>" . $row["NgayBatDau"] . "</td>
                                <td>" . $row["GhiChu"] . "</td>
                                <td>";
                        if ($isAdmin) {
                            echo "<a href='edit_guidance.php?id=" . $row["ID"] . "' class='btn btn-primary btn-sm'>Sửa</a>
                                  <a href='delete_guidance.php?id=" . $row["ID"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Xóa quan hệ này?\")'>Xóa</a>";
                        } else {
                            echo "<span class='text-muted'>Chỉ xem</span>";
                        }
                        echo "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center text-muted'>Không có quan hệ hướng dẫn nào!</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>