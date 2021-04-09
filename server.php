    <?php
    //declare var
    $username = '';
    $email = '';
    $errors = array();
    //content to database
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "registration");

    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die($db);
    //if register button is clicked
    if (isset($_POST['register'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


        //ensure that the form field are filled properly


        if (empty($username)) {
            array_push($errors, 'username is required'); //add error to error array
        }
        if (empty($email)) {
            array_push($errors, 'email is required'); //add error to error array
        }
        if (empty($password_1)) {
            array_push($errors, 'password is required'); //add error to error array
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The Two Password don't match");
        }
        //if there is no errors
        if (count($errors) == 0) {
            $password = md5($password_1); //encrypt password before storing it in database(security)

            $sql = "INSERT INTO users (username,email,password) 
                VALUES ('$username','$email','$password')";

            mysqli_query($db, $sql);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = 'You are now logged in';
            header('location:  index.php'); //redirect to home page
        }
    }
    //log user in form login page
    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        //ensure that the form field are filled properly

        if (empty($username)) {
            array_push($errors, 'username is required'); //add error to error array
        }
        if (empty($password)) {
            array_push($errors, 'password is required'); //add error to error array
        }
        if (count($errors) == 0) {
            $password = md5($password); //encrypt password before comparing with one on database
            $query = "SELECT * FROM  users WHERE username='$username' AND password='$password' ";
            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) == 1) {
                //log user in
                $_SESSION['username'] = $username;
                $_SESSION['success'] = 'You are now logged in';
                header('location:  index.php'); //redirect to home page

            } else {
                array_push($errors, 'Wrong username/password combination');
                // header('location:')
            }
        }
    }
    // logout
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location:login.php');
    }
