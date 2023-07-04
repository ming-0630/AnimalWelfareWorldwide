<?php
session_start();
if (!isset($_SESSION['surrenderId'])) {
    echo "<script>alert('Please Login to access this page.'); window.history.go(-1); </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Welfare Worldwide</title>
    <link rel="stylesheet" href="css\surrender-style.css" />
    <script type="text/javascript" src="javascripts.js"></script>
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

        <?php
            if (isset($_SESSION['surrenderId'])) {
                echo '<div class="member-container">
                <a href="surrender-profile.php"><button id="profile" class="profile">My Profile</button></a>
                <a href="surrender-logout.php"><button id="loginbtn" class="logout">Logout</button></a>
                </div>';
            }
        ?>
    </div>

    <div class="surrender-form-main">
        
        <div class="surrender-form-container">

            <h1>Find a new owner...</h1>
            <p>Many strays on the streets are due to dumping of unwanted pets. Instead of throwing them out into the
                wild and possibly dying, AWW wants to help you
                to find a new owner for your pets. Please fill in the form and upload a picture of the animal. If there
                are any interested adopters, they will contact you via
                the contacts given.
            </p>

            <form method="POST" action="insertsurrend.php" class="surrender-form" enctype="multipart/form-data">

                <input type="text" name="petname" required="required" placeholder="Pet Name">
                <input type="text" name="pettype" required="required" placeholder="Type of Pet (Dog, Cat, etc)"><br>
                <input type="text" name="petbreed" required="required" placeholder="Breed of Pet">
                <input type="text" name="petage" required="required" placeholder="Age">
                <input type="text" name="location" required="required" placeholder="Location"> <br>
                <textarea name="petdescription" required="required" placeholder="Description"></textarea>

                <div class="gender-container">
                    <label for="petgender" style="color:#E98074;">Gender:</label>
                    <input type="radio" id="male" name="petgender" value="Male" required>
                    <label for="male" style="color:#E98074;">Male</label>
                    <input type="radio" id="female" name="petgender" value="Female">
                    <label for="female" style="color:#E98074;">Female</label>
                    <input type="radio" id="other" name="petgender" value="Other">
                    <label for="other" style="color:#E98074;">Other</label> <br>
                </div>


                <div class="petimg-container">
                    <label for="petimg">Upload a picture of the pet.</label><br>
                    <input type="file" required="required" name="petimg">
                </div>

                <input type="submit" name="submit" required="required" id="submitsurrender">
            </form>
        </div>
    </div>

    <div class="footer">
    <p style="margin:5px 5px 5px 15px; color: #E98074;">WDT Asssignment</p>
    </div>
</body>

</html>