<?php
    include('db/config.php');
    session_start();

    $num_std = $_POST['num_std'];
    $d_partment = $_POST['d_partment'];

    $chk_login = mysqli_query($conn,"SELECT * FROM users WHERE number_std ='$num_std' AND d_partment='$d_partment' ") or die(mysqli_error());
    $num = mysqli_fetch_assoc($chk_login);
    $_SESSION['status'] = $num['status'];
    if($num['status'] == 'admin'){
        $_SESSION['users'] = $num;
        echo "
            <script>
                alert('pless your admin');
                window.location = 'admin';
            </script>
        ";
    }else if($num['status'] == 'user'){
        $_SESSION['users'] = $num;
        echo "
            <script>
                alert('pless your student');
                window.location = 'user';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('login ไม่ถูกต้อง login ใหม่');
                window.location = 'index.php';
            </script>
        ";
    }
?>