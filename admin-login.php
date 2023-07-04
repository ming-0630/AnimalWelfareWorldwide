<?php

if (isset($_POST['loginsubmit'])) {

    include "conn.php";

    $uname = $_POST['uname'];
    $password = $_POST['loginpwd'];

    $sql = "SELECT * FROM admin_t WHERE Username = '".$uname."' AND Password = '".$password."'";
    $logincheck = mysqli_query($conn, $sql);
    if (mysqli_num_rows($logincheck) > 0) {
        $results = mysqli_fetch_assoc($logincheck);
        session_start();
        $_SESSION['adminId'] = $results['id'];
        echo "<script>alert('Login Successful'); window.location.href='admin-view-all.php';</script>";
    } else {
        echo "<script>alert('Your Username or Password is wrong. Please try again.'); window.history.go(-1);</script>";
    }

} else {
    echo "<script>window.location.href='admin-home.php';</script>";
}

?>