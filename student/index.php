<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách Sinh viên</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">
        <h2 class="text-center mb-4">Danh Sách Sinh Viên</h2>
        <div class="mb-3 text-end">
            <a href="add_student.php" class="btn btn-success">
                <i class="bi bi-person-plus"></i> Thêm Sinh Viên
            </a>
        </div>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Họ Tên</th>
                    <th>Mã SV</th>
                    <th>Ngày Sinh</th>
                    <th>Lớp</th>
                    <th>Email</th>
                    <th>Số ĐT</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../config.php';

                $sql = "SELECT * FROM SinhVien";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["SinhVienID"] . "</td>
                            <td>" . $row["HoTen"] . "</td>
                            <td>" . $row["MaSinhVien"] . "</td>
                            <td>" . $row["NgaySinh"] . "</td>
                            <td>" . $row["Lop"] . "</td>
                            <td>" . $row["Email"] . "</td>
                            <td>" . $row["SoDienThoai"] . "</td>
                            <td>
                                <a href='edit_student.php?id=" . $row["SinhVienID"] . "' class='btn btn-primary btn-sm'>Sửa</a>
                                <a href='delete_student.php?id=" . $row["SinhVienID"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Xóa sinh viên này?\")'>Xóa</a>
                            </td>
                          </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center text-muted'>Không có sinh viên nào!</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>