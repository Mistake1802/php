<?php
$conn = new mysqli("localhost", "root", "", "Kiemtra2");

$monhoc = isset($_GET['monhoc']) ? $_GET['monhoc'] : "";

?>

<form method="GET">
    Chọn môn học:
    <select name="monhoc">
        <option>Tiếng Anh nâng cao</option>
        <option>Lập trình cơ bản</option>
        <option>Hệ quản trị CSDL</option>
        <option>Lập trình hướng đối tượng</option>
    </select>
    <button type="submit">Xem</button>
</form>

<?php
if($monhoc != ""){
    $sql = "SELECT * FROM tbthongtindk WHERE monhoc='$monhoc'";
    $result = $conn->query($sql);

    echo "<h3>Danh sách sinh viên</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Mã SV</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>Kỳ học</th>
            <th>Buổi học</th>
          </tr>";

    while($row = $result->fetch_assoc()){
        echo "<tr>
                <td>{$row['masv']}</td>
                <td>{$row['hoten']}</td>
                <td>{$row['gioitinh']}</td>
                <td>{$row['kyhoc']}</td>
                <td>{$row['buoihoc']}</td>
              </tr>";
    }
    echo "</table>";
}
$conn->close();
?>