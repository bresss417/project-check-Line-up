<?php
include('../db/config.php');
session_start();
if(!isset($_SESSION['users'])){
    echo "
        <script>
            alert('pless your login');
            window.location = '../index.php';
        </script>
    ";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('../db/link.php'); ?>
    <link rel="stylesheet" href="../css/up_std.css">
    <title>add student</title>
</head>
<body>
<nav class="mb-6 navbar navbar-expand-lg navbar-dark cyan mt-1">
    <div class="container">
        <a class="navbar-brand font-bold mt-1" href="index.php">
            <i class="fa fa-home" aria-hidden="true" style="font-size: 150%; color:black;"></i> 
            Home <span class="sr-only">(current)</span>
        </a>
        <div class="collapse navbar-collapse" id="">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active" style="color:whitesmoke;margin-top:15px;">
                    <p class="" style="font-family: Arial, Helvetica, sans-serif;color:yellow" >
                        <?php echo $_SESSION["users"]["username"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                </li>
                <li class="nav-item ">
                    <a class="btn btn-warning btn-sm" href="logout.php">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;
                        logout <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="container">
        <div class="card shoppining-cart mt-2">
            <div class="card-body">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>เพิ่มรายชื่อ <b>นักศึกษา</b></h2>
                        </div>
                    </div>
                </div>
                <form class="form-signin" action="chk_add_std.php" method="post" enctype="multipart/form-data" role="form">
                    <div class="row mr-auto col-12">
                      <div class="col-lg-4">
                        <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                            <input id="upload" name="image" type="file" onchange="readURL(this);" class="form-control border-0">
                            <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                            <div class="input-group-append">
                                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> 
                                    <i class="fa fa-cloud-upload mr-2 text-muted"></i>
                                    <small class="text-uppercase font-weight-bold text-muted">Choose file</small>
                                </label>
                            </div>
                        </div>
                        <div class="image-area mt-4">
                            <img id="imageResult" src="" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                        </div>
                      </div>
                      <div class="col-md-8 mt-5">
                        
                        <div class="col-md-12 mt-2">
                            <label class="lead mb-0" style="color: rgb(6, 176, 228);">ชื่อ :
                                <input type="text" class="col-md-7 default" name="f_name" id="exampleForm2" required />
                             </label>
                             <label class="lead mb-0" style="color: rgb(6, 176, 228);">นามสกุล :
                                <input type="text" class="col-md-7 default" name="l_name" id="exampleForm2" required />
                             </label>
                        </div>
                        <div class="col-12 mt-2">
                            <label class="col-3 m-0 mb-0" style="font-size:17px;">รหัส นักศึกษา</label>:
                            <input type="text" class="col-7 default" name="num_std" id="exampleForm2" required />
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="lead mb-0 m-0" style="color:#ff1a75">ชั่น :
                                <input type="text" class="col-md-5 default" name="class" id="exampleForm2" required />
                             </label>
                             <label class="lead mb-0 m-0" style="color: #ff6600">แผนก :
                                <input type="text" class="col-7 default" name="d_partment" id="exampleForm2" required />
                             </label>
                        </div>
                        <div class="col-md-12 mt-3">
                            <button type="submit" class="ml-3 col-8 btn btn-outline-primary btn-sm">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                                    &nbsp;ยืนยัน-เพิ่มรายชื่อ
                            </button>
                        </div>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="../js/up_std.js"></script>
</body>
</html>