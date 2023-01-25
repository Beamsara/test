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

    <!-- icon -->
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
                            <a class="nav-link" href="admin.php">จัดการข้อมูลผู้ดูแลระบบ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="member.php">จัดการข้อมูลสมาชิก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="borrow_return.php">จัดการการ-ยืมคืน</a>
                        </li>
                    </ul>
                            <form  method="post" action="borrow_return_search.php" class="d-flex">
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
                    <h1 class="h1 fw-bold mt-5">การจัดการข้อมูลการยืม-คืนหนังสือ</h1>
                    <a href="#" class="btn btn-success float-end mb-3"><i class="bi bi-plus-circle"></i> ยืมหนังสือ</a>
                    <a href="#" class="btn btn-success float-end mb-3 me-2"><i class="bi bi-plus-circle"></i> คืนหนังสือ</a>
                    <a href="#" class="btn btn-success float-end mb-3 me-2"><i class="bi bi-plus-circle"></i> ข้อมูลสถิติ</a>
            </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped text-center">
                        <tr>
                            <th>รหัสหนังสือ</th>
                            <th>ชื่อหนังสือ</th>
                            <th>ชื่อผู้ยืม-คืน</th>
                            <th>วันที่ยืม</th>
                            <th>วันที่คืน</th>
                            <th>ค่าปรับ</th>
                        </tr>

                        <?php
                        
                            include "db.php";
                            $search = $_POST['search']; // name = "search"
                            $sql = "SELECT br.b_id, b.b_name, m.m_name, br.br_date_br, br.br_date_rt, br.br_fine
                            FROM tb_borrow_book AS br
                            INNER JOIN tb_book AS b
                            ON br.b_id = b.b_id
                            INNER JOIN tb_member AS m
                            ON br.m_user = m.m_user
                            WHERE b.b_name LIKE '%$search%' OR m.m_name LIKE '%$search%' ORDER BY br.br_date_br DESC";
                            $result = mysqli_query($conn, $sql);
                        ?>

                        <?php while($row = mysqli_fetch_array($result)){ ?>

                            <tr>
                            <td><?php echo $row['b_id']; ?></td>
                            <td><?php echo $row['b_name']; ?></td>
                            <td><?php echo $row['m_name']; ?></td>
                            <td><?php echo $row['br_date_br']; ?></td>
                            <td><?php echo $row['br_date_rt']; ?></td>
                            <td><?php echo $row['br_fine']; ?></td>
                        </tr>

                        <?php } ?>

                        
                    </table>
                </div>
            
        </div>
    </div>



    <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>