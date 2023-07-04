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
                
                
                $petname = $_POST['petname'];
                $pettype = $_POST['pettype'];
                $petbreed = $_POST['petbreed'];
                $petage = $_POST['petage'];
                $petdescription = $_POST['petdescription'];
                $petgender = $_POST['petgender'];
                $location = $_POST['location'];
                $imgURL = 'http://localhost/wdt%20assignment/img/petimg/'.$fileNewName;
                $id = 0;


                include "conn.php";
                $sql = "INSERT INTO listing_t (Name, Type, Breed, Age, Description, Gender, Location, imageurl, SurrenderID, Approval) VALUES ('".$petname."', '".$pettype."', '".$petbreed."', '".$petage."', '".$petdescription."','".$petgender."','".$location."','".$imgURL."','".$id."', 'Approved');";
                mysqli_query($conn, $sql);
                
                if (mysqli_affected_rows($conn)>0)
                {
                    echo "<script>alert('Successfully added new entry.') </script>";
                }  else {

                    echo "<script>alert('Failed'); window.history.go(-1); </script>";
                }
                    mysqli_close($conn);

                    echo "<script>window.location.href = 'admin-view-all.php'; </script>";


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