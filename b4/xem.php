<?php
$conn = new mysqli("localhost", "root", "", "RapPhim");

$phim = $_GET['phim'] ?? "";
$suatchieu = $_GET['suatchieu'] ?? "";
?>

<form method="GET">
Chọn phim:
<select name="phim">
<option>Avengers</option>
<option>Conan</option>
<option>Doraemon</option>
</select>

Suất:
<select name="suatchieu">
<option>9h</option>
<option>14h</option>
<option>19h</option>
</select>

<button>Xem</button>
</form>

<?php
if($phim != "" && $suatchieu != ""){
    $sql = "SELECT * FROM datve WHERE phim='$phim' AND suatchieu='$suatchieu'";
    $result = $conn->query($sql);

    echo "<h3>Danh sách đặt vé</h3>";
    echo "<table border='1'>";
    echo "<tr>
        <th>Họ tên</th>
        <th>SĐT</th>
        <th>Số vé</th>
        <th>Loại ghế</th>
        <th>Combo</th>
        <th>Tổng tiền</th>
    </tr>";

    while($row = $result->fetch_assoc()){
        echo "<tr>
            <td>{$row['hoten']}</td>
            <td>{$row['sdt']}</td>
            <td>{$row['sove']}</td>
            <td>{$row['loaighe']}</td>
            <td>{$row['combo']}</td>
            <td>{$row['tongtien']}</td>
        </tr>";
    }
    echo "</table>";
}

$conn->close();
?>