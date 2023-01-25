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
                            <a class="nav-link" href="admin.php">จัดการข้อมูลผู้ดูแลระบบ</a>
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
<!-- ส่วน carousel -->
                <!-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/1.png" style="height: 100vh;" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/2.jpg" style="height: 100vh;" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/3.png" style="height: 100vh;" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/4.jpg" style="height: 100vh;" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/5.jpg" style="height: 100vh;" class="d-block w-100" alt="...">
                </div>
            </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div> -->

            <div class="container">
                <div class="row mt-5 align-items-center">
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bold">ยินดีต้อนรับ</h1>
                        <p class="lead">ห้องสมุดของเราเปิดให้บริการ 24 ชั่วโมง เรียนรูทักษะใหม่ๆ ไปกับหนังสือชั้นนำทั้วประเทศ หวังว่าท่านจะได้รับความรู้อย่างเต็มเปี่ยม</p>
                    </div>
                    <div class="col-md-6">
                        <img class="img-fluid img-thumbnail rounded-3 shadow" src="img/4.jpg">
                    </div>
                </div>
            </div>

            <!-- card -->
            <div class="container-fluid bg-light">
                <div class="row mt-5">
                    <h1 class="text-center">หนังสือมาใหม่</h1>
                    <?php
                    
                        include 'db.php';
                        $sql = "SELECT * FROM tb_new_book";
                        $result = mysqli_query($conn, $sql);
                    
                    ?>

                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <div class="col-md-3 col-sm-5 mt-2">
                        <div class="card" style="display: table-cell; text-align: center; vertical-align: middle;">
                            <img src="img/<?php echo $row['nb_img']; ?>" class="card-img-top" style="height: 490px; width: 300px;">
                            <div class="crad-body text-center mt-2" style="height: 80px;">
                                <h5 class="card-title"> <?php echo $row['nb_name']; ?> </h5>
                                <p class="card-text"> <?php echo $row['nb_price']; ?> บาท </p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>


    <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>