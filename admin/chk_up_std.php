<?php
    include('../db/config.php');
    session_start();
    $id = $_GET['id'];
    $ext = pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
    if($ext !=''){
        $new_img_name = 'img_'.uniqid().".".$ext;
        $image_path = "../db_photo/";
        $upload_path = $image_path.$new_img_name;
        move_uploaded_file($_FILES['image']['tmp_name'], $upload_path);
        $photo = $new_img_name;
    }else{
        $photo = $_POST["image"];
    }
    $user = $_POST['user'];
    $num_std = $_POST['num_std'];
    $class = $_POST['class'];
    $d_parment = $_POST['d_partment'];
    $chk = mysqli_query($conn,"SELECT * FROM users WHERE number_std ='$num_std' ") or die(mysqli_error());
    $num = mysqli_num_rows($chk)
        if($num > (int)1){
            echo "
                <script>
                    alert('รหัส น.ศ มีซํ้ากัน');
                    window.location = 'index.php';
                </script>
            ";
        }else{
            $sql = mysqli_query($conn,"UPDATE users SET

             number_std='$num_std',
             username='$user',
             class='$class',
             d_partment='$d_parment',
             photo ='$photo'
             WHERE id='$id' ");
              if($sql){
                echo "
                <script>
                    alert('แก้ไขรายชื่อ น.ศ เรียบร้อยแล้ว');
                    window.location = 'index.php';
                </script>
                ";
            }else{
                echo "
                <script>
                    alert('มีข้อผิดพลาด การupdateล้มเหลว');
                    window.location = 'index.php';
                </script>
            ";
            }
        }
?>