<?php
$conn = new mysqli("localhost", "root", "", "QuanLyCLB");

$clb = $_GET['clb'] ?? "";
?>

<form method="GET">
Chọn CLB:
<select name="clb">
<option>Bóng đá</option>
<option>Âm nhạc</option>
<option>Lập trình</option>
<option>Nhiếp ảnh</option>
</select>
<button>Xem</button>
</form>

<?php
if($clb != ""){
    $sql = "SELECT * FROM thanhvien WHERE clb='$clb'";
    $result = $conn->query($sql);

    echo "<h3>Danh sách thành viên</h3>";
    echo "<table border='1'>";
    echo "<tr>
        <th>Mã SV</th>
        <th>Họ tên</th>
        <th>Email</th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
        <th>Kỹ năng</th>
    </tr>";

    while($row = $result->fetch_assoc()){
        echo "<tr>
            <td>{$row['masv']}</td>
            <td>{$row['hoten']}</td>
            <td>{$row['email']}</td>
            <td>{$row['gioitinh']}</td>
            <td>{$row['ngaysinh']}</td>
            <td>{$row['kynang']}</td>
        </tr>";
    }
    echo "</table>";
}

$conn->close();
?>