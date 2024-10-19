<?php
// Kết nối đến CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "danh_sach_mon_hoc";

$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'UTF8');

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Truy vấn để lấy danh sách các môn học
$sql = "SELECT id, ma_mon, ten_mon FROM course";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách môn học</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            color: red;
        }
        a {
            color: blue;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Danh sách môn học</h2>

<table>
    <tr>
        <th>Mã môn</th>
        <th>Tên môn</th>
        <th>Chi tiết</th>
    </tr>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['ma_mon'] . "</td>";
            echo "<td>" . $row['ten_mon'] . "</td>";
            echo "<td><a href='detail_course.php?id=" . $row['id'] . "'>Xem chi tiết</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
// Đóng kết nốii
mysqli_close($conn);
?>
