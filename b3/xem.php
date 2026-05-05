<?php
$conn = new mysqli("localhost", "root", "", "KhachSan");

$loaiphong = $_GET['loaiphong'] ?? "";
?>

<form method="GET">
Chọn loại phòng:
<select name="loaiphong">
<option>Phòng đơn</option>
<option>Phòng đôi</option>
<option>Phòng VIP</option>
</select>
<button>Xem</button>
</form>

<?php
if($loaiphong != ""){
    $sql = "SELECT * FROM datphong WHERE loaiphong='$loaiphong'";
    $result = $conn->query($sql);

    echo "<h3>Danh sách khách</h3>";
    echo "<table border='1'>";
    echo "<tr>
        <th>Họ tên</th>
        <th>SĐT</th>
        <th>Ngày nhận</th>
        <th>Số ngày</th>
        <th>Dịch vụ</th>
    </tr>";

    while($row = $result->fetch_assoc()){
        echo "<tr>
            <td>{$row['hoten']}</td>
            <td>{$row['sdt']}</td>
            <td>{$row['ngaynhan']}</td>
            <td>{$row['songay']}</td>
            <td>{$row['dichvu']}</td>
        </tr>";
    }
    echo "</table>";
}

$conn->close();
?>