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
    <link rel="stylesheet" href="icon/bootstrap-icons.css">
    
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card p-4">

                    <?php
                        
                        include "db.php";
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM tb_member WHERE m_id = '$id'";
                        $result = mysqli_query($conn, $sql);
                    ?>
                    <?php while($row = mysqli_fetch_array($result)){ ?>
                    <form action="member_edit_db.php" method="post">
                        <h1 class="text-center mt-3">แก้ไขข้อมูลสมาชิก</h1>
                        <input type="hidden" name="id" value="<?php echo $row['m_id'] ?>">
                        <label for="user" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control mb-3" name="username" value="<?php echo $row['m_user'] ?>" autofocus required>
                        <label for="pass" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control  mb-3" name="password" value="<?php echo $row['m_pass'] ?>" required>
                        <label for="surname" class="form-label">ชื่อ-สกุล</label>
                        <input type="text" class="form-control mb-3" name="surname" value="<?php echo $row['m_name'] ?>" required>
                        <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                        <input type="text"  maxlength="10" class="form-control mb-3" name="phone" value="<?php echo $row['m_phone'] ?>" required>
                    
                        <div class="d-flex gap-3">
                            <input type="submit" name="submit" class="btn btn-primary w-100 mt-3 mb-1" value="แก้ไขข้อมูลสมาชิก">
                            <!-- <input type="reset" name="reset" class="btn btn-danger w-100 mb-1" value="ยกเลิก"> -->
                            <a class="btn btn-success w-100 mb-1 mt-3 text-white" href="member.php"><i class="bi bi-backspace"></i> ย้อนกลับ</a>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>