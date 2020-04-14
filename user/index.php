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
    }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/index_user.css">
    <title>home student</title>
</head>
<body>
<div class="container portfolio">
	<div class="row">
		<div class="col-md-12">
			<div class="heading">
                <img class="" src="https://image.ibb.co/cbCMvA/logo.png" />
                <a href="re_comment.php" class="btn mr-auto">อ่านคำแนะนำ</a>
            </div>
            
		</div>	
	</div>
	<div class="bio-info">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<div class="bio-image">
							<img src="../db_photo/<?php echo $_SESSION['users']['photo']; ?>" alt="image" />
						</div>			
					</div>
				</div>	
			</div>
			<div class="col-md-6">
				<div class="bio-content">
					<h1 style="color:#3d009e;"><?php echo $_SESSION['users']['username']; ?></h1>
					<h6>รหัส นักศึกษา :&nbsp;<?php echo $_SESSION['users']['number_std']; ?></h6>
                    <h6>ชั้น : <?php echo $_SESSION['users']['class']; ?></h6>
                    <h6>แผนกวิชา : <?php echo $_SESSION['users']['d_partment']; ?></h6>
                    <br>
                    <h6 class='text-primary'>มาเข้าแถวเช้า : <?php echo $_SESSION['users']['c_early']; ?>&nbsp;ครั้ง</h6>
                    <h6 class='text-warning'>มาเข้าแถวสาย  : <?php echo $_SESSION['users']['late']; ?>&nbsp;ครั้ง</h6>
                    <h6 class='text-danger'>ไม่มาเข้าแถว : <?php echo $_SESSION['users']['dont_come']; ?>&nbsp;ครั้ง</h6>
                    <br>
                    
<?php
    $late = $_SESSION['users']['late'];
    $dontcome = (int)$_SESSION['users']['dont_come']; /* ค่าของการไม่มาเข้าแถว dont_come */
    $re_sult = (int)$late / (int)2; /* เอาค่าของการมาเข้าแถวสาย มาหาร2กัน ที่ต้องกำหนด(int) เพราะค่าที่อยู่ในตัวเเปร $late ไม่ไช้ number หรือ intiger แต่เป็น string*/
    $result_true = $dontcome + $re_sult;
    switch($result_true){
        case (int)51:
            echo "<h5 class='text-danger'>คุนขาดเกิน50วันแล้วเสียใจด้วยคุณไม่ผ่านการเข้าแถว</h5>";
            break;
        case (int)50:
            echo "<h5 class='text-warning'>คุนขาด50วันแล้วถ่าขาดอีก1วันคุณจะไม่ผ่านการเข้าแถว</h5>";
            break;
        case (int)49:
            echo "<h5 class='text-warning'>คุนขาด49วันแล้วถ่าขาดอีก2วันคุณจะไม่ผ่านการเข้าแถว</h5>";
            break;
        case (int)48:
            echo "<h5 class='text-warning'>คุนขาดเกิน48วันแล้วถ่าขาดอีก3วันคุณจะไม่ผ่านการเข้าแถว</h5>";
            break;
        case (int)47:
            echo "<h5 class='text-warning'>คุนขาดเกิน48วันแล้วถ่าขาดอีก4วันคุณจะไม่ผ่านการเข้าแถว</h5>";
            break;
        case (int)46:
            echo "<h5 class='text-warning'>คุนขาดเกิน48วันแล้วถ่าขาดอีก5วันคุณจะไม่ผ่านการเข้าแถว</h5>";
            break;
        default:
            echo "<h5 class='text-primary'>คุนยังผ่านกิจกรรมการเข้าแถว</h5>";
    
    }
?>
                    <br>
                    <div class="col-md-5 ml-auto">
                        <a href="logout.php" class="btn btn-outline-success">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;ออกจากระบบ
                        </a>
                    </div>
					<!-- <button class="btn btn-outline-secodary" type="button"><i class="fa fa-heart"></i> Express Interest</button> -->
				</div>
			</div>
		</div>	
	</div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
    }
?>