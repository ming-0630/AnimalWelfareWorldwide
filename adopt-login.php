<?php

if (isset($_POST['loginsubmit'])) {

    include "conn.php";

    $mailuname = $_POST['mailuname'];
    $password = $_POST['loginpwd'];

    $sql = "SELECT * FROM mem_t WHERE (Username = '".$mailuname."' OR Email = '".$mailuname."') AND Password = '".$password."'";
    $logincheck = mysqli_query($conn, $sql);

    if (mysqli_num_rows($logincheck) > 0) {
        $results = mysqli_fetch_assoc($logincheck);
        session_start();
        $_SESSION['userId'] = $results['uid'];
        echo "<script>alert('Login Successful'); window.history.go(-1); </script>";
    } else {
        echo "<script>alert('Your Username/Email or Password is wrong. Please try again.'); window.history.go(-1); </script>";
    }

} else {
    echo "<script>window.location.href = 'Homepage.php'; </script>";
}

?>