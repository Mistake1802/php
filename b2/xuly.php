<?php
$conn = new mysqli("localhost", "root", "", "QuanLyCLB");

if ($conn->connect_error) {
    die("Lỗi kết nối: " . $conn->connect_error);
}

$masv = $_POST['masv'] ?? "";
$hoten = $_POST['hoten'] ?? "";
$email = $_POST['email'] ?? "";
$gioitinh = $_POST['gioitinh'] ?? "";
$clb = $_POST['clb'] ?? "";
$ngaysinh = $_POST['ngaysinh'] ?? "";

$kynang = "";
if(isset($_POST['kynang'])){
    $kynang = implode(", ", $_POST['kynang']);
}

$sql = "INSERT INTO thanhvien(masv, hoten, email, gioitinh, clb, ngaysinh, kynang)
        VALUES('$masv','$hoten','$email','$gioitinh','$clb','$ngaysinh','$kynang')";

if ($conn->query($sql) === TRUE) {
    echo "Đăng ký thành công! <br><a href='index.html'>Quay lại</a>";
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>