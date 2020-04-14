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
    $x = 1;
    $select = mysqli_query($conn,"SELECT * FROM users WHERE status='user' ") or die(mysqli_error());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('../db/link.php'); ?>
    <link rel="stylesheet" href="../css/index_admin.css">
    <title>admin page</title>
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
<div class="container col-md-12">
    <div class="d-flex mt-3 ml-auto">
        <a href="add_std.php" class="btn btn-outline-secondary">
            + เพิ่มรายชื่อนักศึกษา
        </a>
    </div>
    <div class="card shoppining-cart mt-2">
        <div class="card-body">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>รายชื่อ <b>นักศึกษา</b></h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
            <thead>
                    <tr>
                        <th>#</th>
                        <th>แก้ไข & ลบ-รายชื่อ</th>     
                        <th>รายชื่อ นักศึกษา</th>
                        <th>รหัส-นักศึกษา</th>
                        <th>ชั้น</th>
                        <th>แผนก</th>
                        
                        <th>มาเช้า</th>
                        <th>มาสาย</th>
                        <th>ไม่มา</th>
                        <th>สถานะ</th>
                        <th>ยืนยัน-เช็ค</th>
                        
                    </tr>
                </thead>
<?php while($x <= $rows = mysqli_fetch_assoc($select)){ ?>
                <tbody>
                    <tr>
                        <td scope="row">
                          <b style="font-size:15px;font-weight: bold;color: #0d0d0d;"> <?php echo $x; ?> </b>
                        </td>
                        <td  style="margin:0%;padding:0%;width:13%">
                            <a href="update_std.php?id=<?php echo $rows['id']; ?>" class="btn btn-sx btn-sm btn-warning">
                                แก้ไข
                            </a>
                            <a href="delete_std.php?id=<?php echo $rows['id']; ?>" class="btn btn-sm btn-danger">
                                ลบ
                            </a>
                        </td>
                      <form action="up_lineup.php?id=<?php echo $rows['id']; ?>" method="post">
                        
                        <td style="">
                            <a href="#">
                                <img src="../db_photo/<?php echo $rows['photo']; ?>" class="avatar" alt="" srcset="">
                                <?php echo $rows['username']; ?>
                            </a>
                        </td>
                        <td>
                           <b style="font-size:15px;font-weight: bold;color: #0d0d0d;"> <?php echo $rows['number_std']; ?> </b>
                        </td>
                        <td>
                           <b style="font-size:15px;font-weight: bold;color: blueviolet;"> <?php echo $rows['class']; ?> </b><br>
                        </td>
                        <td>
                            <b style="font-size:17px;font-weight: bold;color: rgb(7, 17, 150);"> <?php echo $rows['d_partment']; ?> </b>
                        </td>
                        <td style="margin:0%;padding:0%;width:8%">
                            <input type="text" class="col-2" name="c_early" value="<?php echo $rows['c_early']; ?> ">: ครั้ง</b>
                        </td>
                        <td style="margin:0%;padding:0%;width:8%">
                            <input type="text" name="late" class="col-2" value="<?php echo $rows['late']; ?> ">: ครั้ง</b> 
                        </td>
                        <td style="margin:0%;padding:0%;width:8%">
                            <input type="text" class="col-2" name="dont_come" value="<?php echo $rows['dont_come']; ?> ">: ครั้ง</b>
                        </td>
                        <td>
<?php
/* การคำนวน จำนวนการเข้าแถว เป็นการตัดสินว่า ผ่านการเข้าเเถว รีม่ */
    $late = (int)$rows['late'];
    $dont_come = (int)$rows['dont_come'];
    $dvder =(int)2;
    $result = $late / $dvder;  /* ผลลัพธ์ จากการ หาร นี้เครื่องหมาหาร => (/)  */
    $result_true = $result + $dont_come;
        if($result_true >= (int)51){
           echo "<b style='font-size:15px;font-weight: bold;color: #f510b0;'>ไม่ผ่าน</b>";
        }else{
           echo "<b style='font-size:15px;font-weight: bold;color: #f510b0;'>ผ่าน</b>";
        }
?>                    
                        </td>  
                        <td style="margin:0%;padding:0%;width:8%">
                           <input type="submit" class="btn btn-sm btn-primary" value="ยืนยัน">
                        </td>  
                      </form>
                    </tr>
                </tbody>
                              
<?php } ?>
            </table> 
        </div>
    </div>
</div>
</body>
</html>