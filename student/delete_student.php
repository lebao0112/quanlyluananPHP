<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM SinhVien WHERE SinhVienID=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Xóa thành công!";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

$conn->close();
