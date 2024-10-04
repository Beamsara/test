<?php
include 'connect.php';
$id = $_POST['id'];
$sql = "DELETE FROM users WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo json_encode(array("status" => "ลบข้อมูลสําเร็จ"));
} else {
    echo json_encode(array("status" => "มีข้อผิดพลาดในการลบข้อมูล"));
}
$conn->close();
?>