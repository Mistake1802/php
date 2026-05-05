<?php
$conn = new mysqli("localhost", "root", "", "KhachSan");

if ($conn->connect_error) {
    die("Lỗi kết nối: " . $conn->connect_error);
}

$hoten = $_POST['hoten'] ?? "";
$sdt = $_POST['sdt'] ?? "";
$loaiphong = $_POST['loaiphong'] ?? "";
$ngaynhan = $_POST['ngaynhan'] ?? "";
$songay = $_POST['songay'] ?? "";

$dichvu = "";
if(isset($_POST['dichvu'])){
    $dichvu = implode(", ", $_POST['dichvu']);
}

$sql = "INSERT INTO datphong(hoten, sdt, loaiphong, ngaynhan, songay, dichvu)
        VALUES('$hoten','$sdt','$loaiphong','$ngaynhan','$songay','$dichvu')";

if ($conn->query($sql) === TRUE) {
    echo "Đặt phòng thành công! <br><a href='index.html'>Quay lại</a>";
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>