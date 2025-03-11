<?php
include '../config.php';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách Giảng Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">
        <h2 class="text-center mb-4">Danh Sách Giảng Viên</h2>
        <div class="mb-3 text-end">
            <a href="add_teacher.php" class="btn btn-success">
                <i class="bi bi-person-plus"></i> Thêm Giảng Viên
            </a>
        </div>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Họ Tên</th>
                    <th>Mã GV</th>
                    <th>Email</th>
                    <th>Số ĐT</th>
                    <th>Bộ Môn</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM GiangVien";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["GiangVienID"] . "</td>
                            <td>" . $row["HoTen"] . "</td>
                            <td>" . $row["MaGiangVien"] . "</td>
                            <td>" . $row["Email"] . "</td>
                            <td>" . $row["SoDienThoai"] . "</td>
                            <td>" . $row["BoMon"] . "</td>
                            <td>
                                <a href='edit_teacher.php?id=" . $row["GiangVienID"] . "' class='btn btn-primary btn-sm'>Sửa</a>
                                <a href='delete_teacher.php?id=" . $row["GiangVienID"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Xóa giảng viên này?\")'>Xóa</a>
                            </td>
                          </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center text-muted'>Không có giảng viên nào!</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>