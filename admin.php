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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="icon/bootstrap-icons.css">
    <title>ระบบการยืม-คืนหนังสือ</title>
</head>
<body>
    <!-- ส่วน navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">ระบบการยืม-คืนหนังสือ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="admin.php">จัดการข้อมูลผู้ดูแลระบบ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="member.php">จัดการข้อมูลสมาชิก</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="borrow_return.php">จัดการการ-ยืมคืน</a>
                            </li>
                        </ul>
                                <!-- <form class="d-flex">
                                    <input class="form-control me-2" type="search" placeholder="ค้นหาข้อมูลที่นี่" aria-label="Search">
                                    <button class="btn btn-outline-light" type="submit">ค้นหา</button>
                                </form> -->
                                <a class="btn btn-outline-light m-2" href="logout.php"><i class="bi bi-box-arrow-left"></i> ออกจากระบบ</a>

                    </div>
        </div>
    </nav>
    <!-- ส่วนของ table -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <h1 class="h1 fw-bold mt-5">ข้อมูลผู้ดูแลระบบ</h1>
            </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped text-center">
                        <tr>
                            <th>ชื่อผู้ดูแลระบบ</th>
                            <th>รหัสผ่าน</th>
                            <th>ชื่อ-สกุล</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>การจัดการ</th>
                        </tr>
                        <?php
                        
                            include "db.php";
                            $sql = "SELECT * FROM tb_member WHERE m_permis = 'admin'";
                            $result = mysqli_query($conn, $sql);
                        ?>
                        <?php while($row = mysqli_fetch_array($result)){ ?>

                            <tr>
                            <td><?php echo $row['m_user']; ?></td>
                            <td><?php echo $row['m_pass']; ?></td>
                            <td><?php echo $row['m_name']; ?></td>
                            <td><?php echo $row['m_phone']; ?></td>
                            <td>
                                    <a href="admin_edit.php?id=<?php echo $row['m_id'] ?>" class="btn btn-outline-primary w-100"><i class="bi bi-pencil-square"></i> แก้ไข</a>
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