<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\admin-style.css" />
    <script type="text/javascript" src="javascripts.js"></script>
    <title>Admin Page</title>
</head>

<body>

    <div class="home-container">
        <div class="home-left">
            <img src="img/Black AWW logo.png" alt="AWW logo">
        </div>

        <div class="home-right">
            <h1>AWW Admin Page</h1>

            <div class="login">
                <form class="login-form" action="admin-login.php" method="post">

                    <div class="logincreds">
                        <label>Username:
                            <input name="uname" type="text" placeholder="Enter Username" required><br>
                        </label>

                        <label>Password:
                            <input name="loginpwd" type="password" placeholder="Enter Password" id="password" required><br> 
                        </label>

                        <label>
                            <input type="checkbox" onclick="showpw()" class="show">Show Password <br>
                        </label>

                        <button type="submit" name="loginsubmit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>