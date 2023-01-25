<?php

    include "db.php";
    $id = $_GET['id'];

    $sql = "DELETE FROM tb_member WHERE m_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        // echo "<script>alert('ลบผู้ใช้งานเรียบร้อยแล้ว'); window.location = 'member.php';</script>";
        header("location: member.php");
    }else{
        echo "<script>alert('ลบผู้ใช้งานไม่สำเร็จ'); window.location = 'member.php';</script>";
    }

?>

