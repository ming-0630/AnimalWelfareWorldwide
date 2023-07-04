<?php

if (isset($_POST['regissubmit'])) {
    $username= $_POST['username'];
    $password= $_POST['password'];
    $phonenum= $_POST['phone_num'];
    $email= $_POST['email_address'];
    $gender= $_POST['gender'];
    $dob= $_POST['dob'];
    
    include "conn.php";
    
    $unamecheck = mysqli_query($conn, "SELECT * FROM surrender_t WHERE Username= '$username'");
    $emailcheck = mysqli_query($conn, "SELECT * FROM surrender_t WHERE Email= '$email'");  
    
    if (mysqli_num_rows($unamecheck) > 0 ) {
        echo "<script>alert('Username is Taken, Please login instead'); window.history.go(-1); </script>";
    } else {

        $emailcheck = mysqli_query($conn, "SELECT * FROM surrender_t WHERE Email= '$email'");  
        if (mysqli_num_rows($emailcheck) > 0) {
            echo "<script>alert('Email is Taken, Please login instead'); window.history.go(-1); </script>";
        } else {
            $sql = "INSERT INTO surrender_t (Username, Password, PhoneNumber, Email, Gender, DateOfBirth) VALUES ('".$username."', '".$password."', '".$phonenum."', '".$email."', '".$gender."', '".$dob."');";
            mysqli_query($conn, $sql);

            if (mysqli_affected_rows($conn)>0 ) {

                echo "<script>alert('Successfully created account. Please Login to continue.') </script>";
                mysqli_close($conn);
                echo "<script>window.location.href = 'SurrenderHome.php'; </script>";

            } else {

                echo ("<script>alert('Failed); window.history.go(-1); </script>");
                mysqli_close($conn);
            }
        }
    }
}

?>