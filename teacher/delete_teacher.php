<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM GiangVien WHERE GiangVienID=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Xóa thành công!'); window.location.href='list_teachers.php';</script>";
    } else {
        echo "<script>alert('Lỗi khi xóa!'); window.location.href='list_teachers.php';</script>";
    }
}

$conn->close();
