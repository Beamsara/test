<?php

    include_once "db.php";
    session_start();
    if(!$_SESSION['login']){
        session_destroy();
        header("location: login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบการยืม-คืนหนังสือ</title>
    <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card p-4">
                    <form action="insert_db.php" method="post">
                        <h1 class="text-center mt-3">เพิ่มข้อมูลสมาชิก</h1>
                        <label for="user" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control mb-3" name="username" autofocus required>
                        <label for="pass" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control  mb-3" name="password" required>
                        <label for="surname" class="form-label">ชื่อ-สกุล</label>
                        <input type="text" class="form-control mb-3" name="surname" required>
                        <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                        <input type="text"  maxlength="10" class="form-control mb-3" name="phone" required>
                    
                        <div class="d-flex gap-3">
                            <input type="submit" name="submit" class="btn btn-primary w-100 mt-3 mb-1" value="เพิ่มข้อมูลสมาชิก">
                            <!-- <input type="reset" name="reset" class="btn btn-danger w-100 mb-1" value="ยกเลิก"> -->
                            <a class="btn btn-success w-100 mb-1 mt-3 text-white" href="member.php">ย้อนกลับ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>