<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pet Details</title>
    <link rel="stylesheet" href="css\surrender-style.css" />
    <script type="text/javascript" src="javascripts.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="topnav">
        <div class="nav">
            <a href="index.php" class="hovereffect">HOME</a>
            <a href="Homepage.php" class="hovereffect">ADOPT</a>
            <a href="SurrenderHome.php" class="hovereffect">SURRENDER</a>
            <a href="AboutUs.php" class="hovereffect">ABOUT US</a>
            <a href="ContactUs.php" class="hovereffect">CONTACT US</a>
        </div>

        <a href="surrender-profile.php"><button id="profile" class="profile" style="margin-right: 30px;">My Profile</button></a>
    </div>

    <div class="surrender-edit-main">
                <?php
                    include "conn.php";

                    $sql = "SELECT * FROM listing_t WHERE id = '".$_GET['id']."'";
                    $query = mysqli_query($conn, $sql);

                    $results = mysqli_fetch_assoc($query);

                    $id= $results['id'];
                    $name= $results['Name'];
                    $breed= $results['Breed'];
                    $age= $results['Age'];
                    $type= $results['Type'];
                    $location= $results['Location'];
                    $description= $results['Description'];
                    $gender= $results['Gender'];
                    $status= $results['Status'];
                    $petimg= $results['imageurl'];
                ?>

        <div class="petimg-edit-container">
            <h1>Edit Pet Picture</h1>
            <div class="current-img">
                <p>Current Image: </p>
                <img src="<?php echo $petimg?>" alt="Current Pet Image">
            </div>

            <div class="upload-img-container">
                <form action="edit-reupload.php?id=<?php echo $id ?>" enctype="multipart/form-data" method="post"
                    class="upload-img">
                    <label for="petimg">Upload a picture of the pet.</label><br>
                    <input type="file" required="required" name="petimg"><br>
                    <input type="submit" name="submit" value="Upload Picture">
                </form>
            </div>
        </div>

        <div class="surrender-edit-container">

            <a href="surrender-delete.php?id=<?php echo $id?>" onclick="return confirm('Are you sure you want to delete this entry?')"><button class= deleteBtn>Delete</button></a>
            <h1>Edit Pet Details</h1>

            <form method="POST" action="edit-surrender.php?id=<?php echo $id ?>" class="surrender-edit-form">

                <label for="petname">Name: </label>
                <input type="text" name="petname" required="required" placeholder="Pet Name" value="<?php echo $name?>">

                <label for="pettype">Type: </label>
                <input type="text" name="pettype" required="required" placeholder="Type of Pet (Dog, Cat, etc)"
                    value="<?php echo $type?>"><br>

                <label for="petbreed">Breed: </label>
                <input type="text" name="petbreed" required="required" placeholder="Breed of Pet"
                    value="<?php echo $breed?>">

                <label for="petage">Age: </label>
                <input type="text" name="petage" required="required" placeholder="Age" value="<?php echo $age?>">

                <label for="location">Location: </label>
                <input type="text" name="location" required="required" placeholder="Location"
                    value="<?php echo $location?>"> <br>

                <label for="petdescription">Description: </label>
                <textarea name="petdescription" required="required"
                    placeholder="Description"><?php echo $description?></textarea>

                <div class="gender-edit-container">
                    <label for="petgender" style="color:#E98074;">Gender:</label>
                    <input type="radio" id="male" name="petgender" value="Male" required
                        <?php if($gender== "Male")echo "checked='checked'";?>>
                    <label for="male" style="color:#E98074;">Male</label>
                    <input type="radio" id="female" name="petgender" value="Female"
                        <?php if($gender== "Female")echo "checked='checked'";?>>
                    <label for="female" style="color:#E98074;">Female</label>
                    <input type="radio" id="other" name="petgender" value="Other"
                        <?php if($gender== "Other")echo "checked='checked'";?>>
                    <label for="other" style="color:#E98074;">Other</label> <br>
                </div>
                <input type="submit" name="submit" onclick="windows.location.href='edit-surrender.php'">
            </form>
        </div>


    </div>

    <div class="footer">
        <p style="margin:10px 5px 5px 15px; color: #E98074;">WDT Asssignment</p>
    </div>

</body>

</html>