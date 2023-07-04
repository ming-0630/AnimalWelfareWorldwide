<?php
session_start();
define ('SITE_ROOT', realpath(dirname(__FILE__)));

if(isset($_POST['submit'])){
    $file = $_FILES['petimg'];

    $fileName = $_FILES['petimg']['name'];
    $fileTmpName = $_FILES['petimg']['tmp_name'];
    $fileSize = $_FILES['petimg']['size'];
    $fileError = $_FILES['petimg']['error'];
    $fileType = $_FILES['petimg']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowedFileType = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowedFileType)) {
        if($fileError === 0 ){
            if($fileSize < 10000000) {
                $fileNewName = uniqid().".".$fileActualExt;
                $fileDestination = SITE_ROOT."/img/petimg/".$fileNewName;
                move_uploaded_file($fileTmpName, $fileDestination);
                $imgURL = 'http://localhost/wdt%20assignment/img/petimg/'.$fileNewName;

                include "conn.php";         
                $sql = "UPDATE listing_t SET imageurl = '$imgURL' WHERE id ='".$_GET['id']."'";

                mysqli_query($conn, $sql);
                
                if (mysqli_affected_rows($conn)>0)
                {
                    echo "<script>alert('Successfully uploaded your new picture!');</script>";
                }  else {
                    echo "<script>alert('Failed'); </script>";
                }
                    mysqli_close($conn);
                    echo "<script>window.history.go(-1);</script>";

            } else {
                echo "<script> alert('Your file is too big!'); window.history.go(-1); </script>";
            }

        } else {
            echo "<script> alert('There was an error uploading your file. Please try again.'); window.history.go(-1); </script>";
        }
    } else {
        echo "<script> alert('You cannot upload files of this type!'); window.history.go(-1); </script>";
    }
}

?>