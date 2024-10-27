<?php
header("Content-Type: application/json; charset=UTF-8");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ajax_test";

// สร้างการเชื่อมต่อแบบ procedural
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM user_data";
$result = mysqli_query($conn, $sql);

$data = array();
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) { //fetch_assoc() เพื่อดึงข้อมูลแต่ละแถวแล้วนำไปเก็บไว้ใน array ($data) 
        $data[] = $row;
    }
}

echo json_encode($data); //json_encode($data); จะแปลงข้อมูล $data ในรูปแบบ array เป็น JSON เพื่อให้ JavaScript ใช้งานได้ง่ายขึ้น

mysqli_close($conn);
?>
