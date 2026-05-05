<?php
$conn = new mysqli("localhost", "root", "", "Kiemtra2");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$masv = $_POST['masv'];
$hoten = $_POST['hoten'];
$gioitinh = $_POST['gioitinh'];
$kyhoc = $_POST['kyhoc'];
$monhoc = $_POST['monhoc'];

$buoihoc = "";
if(isset($_POST['buoihoc'])){
    $buoihoc = implode(", ", $_POST['buoihoc']);
}

$sql = "INSERT INTO tbthongtindk(masv, hoten, gioitinh, kyhoc, monhoc, buoihoc)
        VALUES('$masv','$hoten','$gioitinh','$kyhoc','$monhoc','$buoihoc')";

if ($conn->query($sql) === TRUE) {
    echo "Đăng ký thành công!";
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>