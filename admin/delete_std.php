<?php
    include('../db/config.php');
    $e_id = $_GET['id'];
    $De = mysqli_query($conn,"DELETE FROM users WHERE id='$e_id' LIMIT 1");
    if($De){
        echo "
            <script>
                alert('ลบเรียบร้อยแล้ว');
                window.location = 'index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('error เกิดข้อผิดพลาด');
                window.location = 'index.php';
            </script>
        ";
    }
    mysqli_close($conn);

?>
