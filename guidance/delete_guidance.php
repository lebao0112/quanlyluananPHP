<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM SinhVienGiangVienHuongDan WHERE ID=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Xóa thành công!'); window.location.href='list_guidance.php';</script>";
    } else {
        echo "<script>alert('Lỗi khi xóa!'); window.location.href='list_guidance.php';</script>";
    }
}

$conn->close();
