<?php include('server.php'); ?>
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
            <h2>Register</h2>
        </div>
        <form action="register.php" method="post">
            <!-- display validation error -->
            <?php include("errors.php"); ?>
            <div class="input-group">
                <label for="">Username</label>
                <input type="text" name="username" id="" value="<?php echo $username; ?>">
            </div>
            <div class="input-group">
                <label for="">Email</label>
                <input type="text" name="email" id="" value="<?php echo $email; ?>">
            </div>
            <div class="input-group">
                <label for="">Password</label>
                <input type="password" name="password_1" id="">
            </div>
            <div class="input-group">
                <label for="">Confirm Password</label>
                <input type="password" name="password_2" id="">
            </div>
            <div class="input-group">
                <button type="submit" name="register">Register</button>
            </div>
            <p>
                Already a member ? <a href="login.php">Sign In</a>
            </p>

        </form>
    </div>


</body>

</html>