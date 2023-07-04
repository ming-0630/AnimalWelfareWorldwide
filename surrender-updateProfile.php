<?php
session_start();
include "conn.php";

if (isset($_POST['submitEdit'])) {

    include "conn.php";
    $phoneNum = $_POST['phone_num'];
    $email = $_POST['email_address'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $id = $_SESSION['surrenderId'];

    $emailcheck = "SELECT * FROM surrender_t WHERE Email = '$email'";
    $checkresults = mysqli_query($conn, $emailcheck);

    if (mysqli_num_rows($checkresults) > 0) {
        echo "<script>alert('This email has been binded to another account. Please try another email.'); window.location.href = 'surrender-profile.php'; </script>";
    } else {
        $sql = "UPDATE surrender_t SET PhoneNumber = '$phoneNum', Email = '$email', Gender = '$gender', DateOfBirth = '$dob' WHERE SurrenderID = '$id'";
        mysqli_query($conn, $sql);
        
        if (mysqli_affected_rows($conn) > 0 ) {
            echo "<script>alert('User information updated successfully!'); window.location.href = 'surrender-profile.php'; </script>";
        } else {
            die("<script>alert('Unable to update data! Please try again.'); window.history.go(-1); </script>");
        }
    } 
}

?>