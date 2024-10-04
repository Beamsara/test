<?php
include 'connect.php';
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo json_encode(array("status" => "แก้ไขข้อมูลสําเร็จ"));
} else {
    echo json_encode(array("status" => "มีข้อผิดพลาดในการแก้ไขข้อมูล"));
}
$conn->close();
?>