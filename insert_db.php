<?php

    include "db.php";
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];

        //เข้ารหัส
        $password = $_POST['password'];
        // $hashed = password_hash($password, PASSWORD_DEFAULT);
        

        $sql = "SELECT * FROM tb_member WHERE m_user = '$username'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            echo "<script>alert('Username ซ้ำกรุณากรอกใหม่'); window.location = 'insert.php';</script>";
        }else{
            $sql = "INSERT INTO tb_member(m_user, m_pass, m_name, m_phone) 
            VALUES ('$username','$password','$surname','$phone')";
            $result = mysqli_query($conn, $sql);

            if($result){
            echo "<script>alert('เพิ่มสมาชิกเรียบร้อยแล้ว'); window.location = 'member.php';</script>";
            }else{
            echo "<script>alert('เพิ่มสมาชิกไม่สำเร็จ'); window.location = 'insert.php';</script>";
            }
        }
    }
?>
