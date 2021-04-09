<?php include("server.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration System using PHP and MySQL</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="header-triangle"></div>
        <div class="header">
            <h2>Login</h2>
        </div>
        <form action="login.php" method="post">
            <!-- display validation error -->
            <?php include("errors.php"); ?>
            <div class="input-group">
                <label for="">Username</label>
                <input type="text" name="username" id="">
            </div>

            <div class="input-group">
                <label for="">Password</label>
                <input type="password" name="password" id="">
            </div>

            <div class="input-group">
                <button type="submit" name="login">Login</button>
            </div>
            <p>
                Not yet a member ? <a href="register.php">Sign Up</a>
            </p>
        </form>
    </div>

</body>

</html>