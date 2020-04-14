<?php
    include('../db/config.php');
    session_start();
    $id = $_GET['id'];
    $c_early = $_POST['c_early'];
    $late = $_POST['late'];
    $dont_come = $_POST['dont_come'];

    $up_date = mysqli_query($conn,"UPDATE users SET
                                late='$late',
                                c_early='$c_early',
                                dont_come='$dont_come'
                                WHERE id='$id'
                            ");
        if($up_date){
            echo "
                <script>
                    alert('แก้ไข การข้าแถวของ น.ศ เรียบร้อยแล้ว');
                    window.location='index.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('มีข้อผิดพลาด error');
                window.location='index.php';
            </script>
        " + mysqli_error();
        }
?>