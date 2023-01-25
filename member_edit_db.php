<?php

    include "db.php";
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $username = $_POST['username'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];

        //เข้ารหัส
        $password = $_POST['password'];
        // $hashed = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE tb_member SET m_user='$username',
        m_pass='$password',
        m_name='$surname',
        m_phone='$phone' 
        WHERE m_id = '$id'";
        $result = mysqli_query($conn, $sql);

        if($result){
            // echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว'); window.location = 'member.php';</script>";
            header("location: member.php");
        }else{
            echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้'); window.location = 'member_edit.php';</script>";
        }
    }

?>