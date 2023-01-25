<?php

    include "../db.php";
    if(isset($_POST['submit'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        

        $sql = "SELECT * FROM tb_test02_member WHERE member_username = '$username'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            echo "<script>alert('Username ซ้ำกรุณากรอกใหม่'); window.location = 'insert.php';</script>";
        }else{
            $sql = "INSERT INTO tb_test02_member(member_firstname, member_lastname, member_username, member_password, member_email, member_phone, member_address) 
            VALUES ('$firstname','$lastname','$username','$password','$email','$phone','$address')";
            $result = mysqli_query($conn, $sql);

            if($result){
            echo "<script>alert('เพิ่มสมาชิกเรียบร้อยแล้ว'); window.location = 'member.php';</script>";
            }else{
            echo "<script>alert('เพิ่มสมาชิกไม่สำเร็จ'); window.location = 'insert.php';</script>";
            }
        }
    }
?>
