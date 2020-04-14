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
$id = $_GET['id'];
$g_select = mysqli_query($conn,"SELECT * FROM users WHERE id='$id'") or die(mysqli_error());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('../db/link.php'); ?>
    <link rel="stylesheet" href="../css/up_std.css">
    <title>update student</title>
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
<div class="container col-md-8">
    <div class="card shoppining-cart mt-2">
        <div class="card-body">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>แก้ไขรายชื่อ <b>นักศึกษา</b></h2>
                    </div>
                </div>
            </div>
<?php while($rows = mysqli_fetch_assoc($g_select)){ ?>
            <form class="form-signin" action="chk_up_std.php?id=<?php echo $rows['id']; ?>" method="post" enctype="multipart/form-data" id="image-form" role="form">
                <div class="row mr-auto">
                    <div class="col-lg-5">
                        <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                            <input id="upload" name="image" type="file" onchange="readURL(this);" class="form-control border-0" value="<?php echo $rows['photo']; ?>">
                            <label id="upload-label" for="upload" class="font-weight-light text-muted"><?php echo $rows['photo']; ?></label>
                            <div class="input-group-append">
                                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> 
                                    <i class="fa fa-cloud-upload mr-2 text-muted"></i>
                                    <small class="text-uppercase font-weight-bold text-muted">Choose file</small>
                                </label>
                            </div>
                        </div>
                        <div class="image-area mt-4">
                            <img id="imageResult" src="../db_photo/<?php echo $rows['photo']; ?>" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                        </div>
                    </div>
                    <div class="col-md-7 mt-5">
                      <div class="col-md-12 mt-2">
                        <label class="lead mb-0" style="color: rgb(6, 176, 228);">ชื่อ น.ศ :
                            <input type="text" class="col-md-7 default" name="user" value="<?php echo $rows['username']; ?>" id="exampleForm2" required />
                        </label>
                      </div>
                      <div class="col-md-12 mt-3">
                        <label class="lead mb-0" style="color: rgb(6, 176, 228);">รหัส น.ศ :
                            <input type="text" class="col-md-7 default" name="num_std" value="<?php echo $rows['number_std']; ?>" id="exampleForm2" required />
                        </label>
                      </div>
                      <div class="col-md-12 mt-3">
                        <label class="lead mb-0" style="color: rgb(6, 176, 228);">ชั่น :
                            <input type="text" class="col-md-3 default" name="class" value="<?php echo $rows['class']; ?>" id="exampleForm2" required />
                        </label>
                      </div>
                      <div class="col-md-12 mt-3">
                        <label class="lead mb-0" style="color: rgb(6, 176, 228);">แผนก :
                            <input type="text" class="col-md-7 default" name="d_partment" value="<?php echo $rows['d_partment']; ?>" id="exampleForm2" required />
                        </label>
                      </div>
                      <div class="col-md-12 mt-3">
                        <button type="submit" class="ml-3 col-8 btn btn-warning btn-sm">
                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                &nbsp;ยืนยันupdate
                        </button>
                      </div>
                    </div>
                </div>
            </form> 
<?php  }  ?>
        </div>
    </div>
</div>
<script src="../js/up_std.js"></script>
</body>
</html>