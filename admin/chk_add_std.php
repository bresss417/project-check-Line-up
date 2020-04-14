<?php
    include('../db/config.php');
    session_start();
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
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $user = join(array($f_name," ",$l_name));
    $num_std = $_POST['num_std'];
    $class = $_POST['class'];
    $d_partment = $_POST['d_partment'];
    $late = "0";
    $c_early = "0";
    $dont_come = "0";
    $status = "user";
    $chk = mysqli_query($conn,"SELECT * FROM users WHERE number_std='$num_std'");
    $num = mysqli_num_rows($chk);
    if($num > (int)0){
        echo "
            <script>
                alert('รหัส น.ศ มีซํ้ากัน');
                window.location='add_std.php';
            </script>
        ";
    }else{
        $insert = mysqli_query($conn,"INSERT INTO users SET
                                number_std='$num_std',
                                username='$user',
                                class='$class',
                                d_partment='$d_partment',
                                photo='$photo',
                                late='$late',
                                c_early='$c_early',
                                status='$status',
                                dont_come='$dont_come' ");
            if($insert){
                echo "
                    <script>
                        alert('เพิ่มรายชื่อ น.ศ เรียบร้อยแล้ว');
                        window.location = 'index.php';
                    </script>
                ";
            }else{
                echo "
                    <script>
                        alert('เพิ่มข้อมูลล้มเหลว');
                        window.location = 'add_std.php';
                    </script>
                ";
            }
    }
    mysqli_close($conn);
?>