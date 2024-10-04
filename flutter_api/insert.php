<?php
include 'connect.php';
$name = $_POST['name'];
$email = $_POST['email'];
$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(array("status" => "บันทึกข้อมูลสําเร็จ"));
} else {
    echo json_encode(array("status" => "มีข้อผิดพลาดในการบันทึกข้อมูล"));
}
$conn->close();
?>