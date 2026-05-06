<?php
$conn = new mysqli("localhost", "root", "", "test");

if ($conn->connect_error) {
    die("Lỗi kết nối");
}

$username = $_POST['username'] ?? "";
$password = $_POST['password'] ?? "";

// Kiểm tra DB
$sql = "SELECT * FROM users 
        WHERE username='$username' AND password='$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<span style='color:green'>Đăng nhập thành công!</span>";
} else {
    echo "<span style='color:red'>Sai tài khoản hoặc mật khẩu!</span>";
}

$conn->close();
?>