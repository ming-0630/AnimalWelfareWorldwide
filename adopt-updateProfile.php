<?php
session_start();
include "conn.php";

if (isset($_POST['submitEdit'])) {
    include "conn.php";

    $phoneNum = $_POST['phone_num'];
    $email = $_POST['email_address'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $uid = $_SESSION['userId'];

    $emailcheck = "SELECT * FROM mem_t WHERE Email = '$email'";
    $checkresults = mysqli_query($conn, $emailcheck);

    if (mysqli_num_rows($checkresults) > 0) {
        echo "<script>alert('This email has been binded to another account. Please try another email.'); window.location.href = 'adopt-profile.php'; </script>";
    } else {
        $sql = "UPDATE mem_t SET PhoneNumber = '$phoneNum', Email = '$email', Gender = '$gender', DateOfBirth = '$dob' WHERE uid = '$uid'";
        mysqli_query($conn, $sql);
        if (mysqli_affected_rows($conn) > 0 ) {
            echo "<script>alert('User information updated successfully!'); window.history.go(-1); </script>";
        } else {
            die("<script>alert('Unable to update data! Please try again.'); window.history.go(-1); </script>");
        }
    }
}

?>