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
                            <a class="nav-link" href="member.php">จัดการข้อมูลสมาชิก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="order.php">จัดการข้อมูลการสั่งซื้อ</a>
                        </li>
                    </ul>
                            <form  method="post" action="order_search.php" class="d-flex">
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
                    <h1 class="h1 fw-bold mt-5">จัดการข้อมูลการสั่งซื้อ</h1>
            </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped text-center">
                        <tr>
                            <th>ชื่อผู้ใช้</th>
                            <th>ชื่อจริง</th>
                            <th>ชื่อสินค้า</th>
                            <th>ราคาสินค้า</th>
                            <th>จำนวนสินค้า</th>
                        </tr>
                        <?php
                        
                            include "../db.php";
                            $sql = "SELECT tp.product_name, tm.member_username, tm.member_firstname, tp.product_price, tor.order_count
                            FROM tb_test02_order AS tor
                            INNER JOIN tb_test02_product AS tp
                            ON tor.product_id = tp.product_id
                            INNER JOIN tb_test02_member AS tm
                            ON tor.member_username = tm.member_username ORDER BY tor.order_id ASC";
                            $result = mysqli_query($conn, $sql);
                        ?>
                        <?php while($row = mysqli_fetch_array($result)){ ?>

                            <tr>
                            <td><?php echo $row['member_username']; ?></td>
                            <td><?php echo $row['member_firstname']; ?></td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td><?php echo $row['product_price']; ?></td>
                            <td><?php echo $row['order_count']; ?></td>
                        </tr>

                        <?php } ?>

                        
                    </table>
                </div>
            
        </div>
    </div>



    <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>