<?php
session_start();
             
$id = $_GET['id'];
$petname = $_POST['petname'];
$pettype = $_POST['pettype'];
$petbreed = $_POST['petbreed'];
$petage = $_POST['petage'];
$petdescription = $_POST['petdescription'];
$petgender = $_POST['petgender'];
$location = $_POST['location'];
                
                
include "conn.php";
$sql = "UPDATE listing_t SET Name = '$petname', Type = '$pettype', Breed = '$petbreed', Age = '$petage', Description = '$petdescription', Gender = '$petgender', Location = '$location' WHERE id = '$id'";
mysqli_query($conn, $sql);
                
if (mysqli_affected_rows($conn)>0) {
    echo "<script>alert('Successfully edited!')</script>";
}  else {
    echo "<script>alert('Failed'); window.history.go(-1); </script>";
}
mysqli_close($conn);

echo "<script>window.history.go(-1);</script>";

?>