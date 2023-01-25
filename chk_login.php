<?php

    session_start();
    include "db.php";
    

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $pass = $_POST['password'];

        $sql = "SELECT * FROM tb_member WHERE m_user = '$username' AND m_pass = '$pass'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result); //ดึงข้อมูลเป็นตัว ๆ ในตารางมาใช้ได้ เช่น $row['m_user'];

        if(!empty($row) /*&& password_verify($pass, $row['m_pass'])*/){

            // เช็คสิทธิ์การเข้าใช้งาน
            if($row['m_permis'] == 'admin'){
                $_SESSION['login'] = $row['m_id'];
            echo "<script>window.location = 'index.php';</script>";
            }else{
            echo "<script>alert('ไม่สามารถเข้าระบบได้');window.location = 'login.php';</script>";
            }
            
        }else{
            echo "<script>alert('ไม่สามารถเข้าระบบได้');window.location = 'login.php';</script>";
        }
    }

?>