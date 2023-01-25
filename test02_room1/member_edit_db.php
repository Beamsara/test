<?php

    include "../db.php";
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $sql = "UPDATE `tb_test02_member` SET 
        member_firstname='$firstname',
        member_lastname='$lastname',
        member_username='$username',
        member_password='$password',
        member_email='$email',
        member_phone='$phone',
        member_address='$address' WHERE member_id = '$id'";
        $result = mysqli_query($conn, $sql);

        if($result){
            // echo "<script>alert('แก้ไขข้อมูลเรียบร้อยแล้ว'); window.location = 'member.php';</script>";
            header("location: member.php");
        }else{
            echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้'); window.location = 'member_edit.php';</script>";
        }
    }

?>