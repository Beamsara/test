<?php

    session_start();
    include "../db.php";
    

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM tb_test02_member WHERE member_username = '$username' AND member_password = '$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result); //ดึงข้อมูลเป็นตัว ๆ ในตารางมาใช้ได้ เช่น $row['m_user'];

        if(!empty($row) /*&& password_verify($pass, $row['m_pass'])*/){
                $_SESSION['login'] = $row['member_id'];
            echo "<script>window.location = 'member.php';</script>";
            
        }else{
            echo "<script>alert('ไม่สามารถเข้าระบบได้');window.location = 'login.php';</script>";
        }
    }

?>