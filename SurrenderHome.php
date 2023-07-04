<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Animal Welfare Worldwide</title>
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

        <?php
            if (isset($_SESSION['surrenderId'])) {
                echo '<div class="member-container">
                <a href="surrender-profile.php"><button id="profile" class="profile">My Profile</button></a>
                <a href="surrender-logout.php"><button class="logout">Logout</button></a>
                </div>';
            }
        ?>

    </div>

    <div id="openlogin" class="login">
        <form class="login-form animate" action="surrender-login.php" method="post">
            <span onclick="document.getElementById('openlogin').style.display='none';"
                class="closelogin">&times;</span>
            <p> Login to start the surrender process! </p>

            <div class="logincreds">
                <label style="color:#E98074;">Username
                    <input name="mailuname" type="text" placeholder="Enter Username or Email" required>
                </label>

                <label style="color:#E98074;">Password
                    <input name="loginpwd" type="password" placeholder="Enter Password" id="password" required>
                </label>

                <label style="color:#E98074;">
                    <input type="checkbox" onclick="showpw()" class="show">Show Password
                </label>

                <button type="submit" name="loginsubmit">Login</button>
            </div>
        </form>
    </div>

    <div id="openregister" class="registerbg">

        <div class="register-container animate">

            <div class="registerimg">
                <img src="img/cat6.jpg" alt="Cat Image">
            </div>

            <div class="register-form">

                <div class="form-header">
                    <h1>Register to start the surrender process!</h1>
                    <span
                        onclick="document.getElementById('openregister').style.display='none';"
                        class="closeregister">&times;</span>
                </div>

                <form method="POST" action="surrender-signup.php" onsubmit="check_pw()">

                    <input type="text" name="username" required="required" placeholder="Username"> <br>
                    <input type="password" name="password" required="required" placeholder="Password" id="registerpw">
                    <br>
                    <input type="password" name="repeatpassword" required="required" placeholder="Retype Password"
                        id="repeatpw"> <br>
                    <input type="tel" name="phone_num" required="required" placeholder="Phone Number (012-3456789)"
                        pattern="[0-9]{3}[-][0-9]{7}[0-9]?"> <br>
                    <input type="email" name="email_address" required="required" placeholder="Email Address"> <br>


                    <label for="gender" style="color:#E98074;">Gender:</label>
                    <input type="radio" id="male" name="gender" value="male" required>
                    <label for="male" style="color:#E98074;">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female" style="color:#E98074;">Female</label>
                    <input type="radio" id="other" name="gender" value="other">
                    <label for="other" style="color:#E98074;">Other</label> <br>


                    <label for="dob" style="color:#E98074;">Date of Birth:</label>
                    <input type="date" name="dob" required="required"> <br>
                    <input type="submit" name="regissubmit" required="required" id="submitregis">
                </form>
            </div>
        </div>
    </div>

    <div class="surrender-main">
        <img src="img\White AWW logo.png" alt="AWW logo here" />
        <h2>Surrender<br> Your Pet</h2>
        <p>Note: This account is seperate from Adoption Account.</p>

        <div class="surrender-container">

            <?php
            if (isset($_SESSION['surrenderId'])) {
                echo "<div class='surrender-form-button'>
                    <a href='surrender-form.php'><button>Surrender Form</button></a>
                    </div>"; 
            } else {
                echo "<div class='surrender-buttons'>
                    <button onclick='document.getElementById(\"openlogin\").style.display=\"block\";'>Login</button>
                    </div>
    
                    <div class='surrender-buttons surrender-register'>
                        <button onclick='document.getElementById(\"openregister\").style.display=\"block\";'>Register</button>
                    </div>";
            }
        ?>
        </div>

    </div>

    <div class="footer">
        <p style="margin:5px 5px 5px 15px; color: #E98074;">WDT Asssignment</p>
    </div>


</body>

</html>