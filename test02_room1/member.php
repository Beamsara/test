<?php

    include_once "../db.php";
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
    <link rel="stylesheet" href="../css/style.css">
    <script src="../css/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <!-- icon -->
    <link rel="stylesheet" href="../icon/bootstrap-icons.css">
    <title>test02_room1</title>
</head>
<body>
    <!-- ส่วน navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="member.php">test02_room1</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="member.php">จัดการข้อมูลสมาชิก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="order.php">จัดการข้อมูลการสั่งซื้อ</a>
                        </li>
                    </ul>
                            <form  method="post" action="member_search.php" class="d-flex">
                                <input class="form-control me-2" name="search" type="search" placeholder="ค้นหาข้อมูลที่นี่" aria-label="Search">
                                <button class="btn btn-outline-light w-50" type="submit"><i class="bi bi-search"></i> ค้นหา</button>
                            </form>
                            <a class="btn btn-outline-light m-2" href="logout.php"><i class="bi bi-box-arrow-left"></i> ออกจากระบบ</a>

                </div>
        </div>
    </nav>
    <!-- ส่วนของ table -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <h1 class="h1 fw-bold mt-5">ตารางข้อมูลสมาชิก</h1>
                    <a href="insert.php" class="btn btn-success float-end mb-3"><i class="bi bi-plus-circle"></i> เพิ่มข้อมูลสมาชิก</a>
            </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped text-center">
                        <tr>
                            <th>ชื่อจริง</th>
                            <th>นามสกุล</th>
                            <th>ชื่อผู้ใช้</th>
                            <th>รหัสผ่าน</th>
                            <th>อีเมล</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>ที่อยู๋</th>
                            <th>การจัดการ</th>
                        </tr>
                        <?php
                        
                            include "../db.php";
                            $sql = "SELECT * FROM tb_test02_member";
                            $result = mysqli_query($conn, $sql);
                        ?>
                        <?php while($row = mysqli_fetch_array($result)){ ?>

                            <tr>
                            <td><?php echo $row['member_firstname']; ?></td>
                            <td><?php echo $row['member_lastname']; ?></td>
                            <td><?php echo $row['member_username']; ?></td>
                            <td><?php echo $row['member_password']; ?></td>
                            <td><?php echo $row['member_email']; ?></td>
                            <td><?php echo $row['member_phone']; ?></td>
                            <td><?php echo $row['member_address']; ?></td>
                            <td class="d-flex gap-2">
                                    <a href="member_edit.php?id=<?php echo $row['member_id'] ?>" class="btn btn-outline-primary w-50"><i class="bi bi-pencil-square"></i> แก้ไข</a>
                                    <a onclick="return confirm('ต้องการลบผู้ใช้นี้หรือไม่ ?')" href="member_delete.php?id=<?php echo $row['member_id'] ?>" class="btn btn-danger w-50"><i class="bi bi-trash"></i> ลบ</a>
                            </td>
                        </tr>

                        <?php } ?>

                        
                    </table>
                </div>
            
        </div>
    </div>



    <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>