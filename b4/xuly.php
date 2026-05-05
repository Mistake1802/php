<?php
$conn = new mysqli("localhost", "root", "", "RapPhim");

if ($conn->connect_error) {
    die("Lỗi kết nối: " . $conn->connect_error);
}

$hoten = $_POST['hoten'] ?? "";
$sdt = $_POST['sdt'] ?? "";
$phim = $_POST['phim'] ?? "";
$suatchieu = $_POST['suatchieu'] ?? "";
$sove = $_POST['sove'] ?? 0;
$loaighe = $_POST['loaighe'] ?? 0;

// Tính combo
$comboArr = $_POST['combo'] ?? [];
$tongCombo = 0;

foreach($comboArr as $c){
    $tongCombo += $c;
}

// Tổng tiền (server tính lại)
$tongtien = $sove * $loaighe + $tongCombo;

// Chuỗi combo
$comboStr = implode(", ", $comboArr);

// Lưu DB
$sql = "INSERT INTO datve(hoten, sdt, phim, suatchieu, sove, loaighe, combo, tongtien)
VALUES('$hoten','$sdt','$phim','$suatchieu','$sove','$loaighe','$comboStr','$tongtien')";

if ($conn->query($sql) === TRUE) {
    echo "Đặt vé thành công! Tổng tiền: $tongtien VND <br><a href='index.html'>Quay lại</a>";
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>