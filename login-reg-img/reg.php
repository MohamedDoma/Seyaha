<?php
include '../config.php';

if (isset($_POST['submit']))
{
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE users_name = '$user_name' AND users_password = '$pass'") 
    or die ('query failed');

    if (mysqli_num_rows($select) > 0)
        {
            $message[] = 'user already exist';
        }
        else
        {
            if ($pass != $cpass)
            {
                $message[] = 'confirm password not matched!';
            }
            else
            {
                $insert = mysqli_query($conn, "INSERT INTO `users` 
                (users_name, users_email, users_password, users_type) VALUE
                ('$user_name', '$email', '$pass', '$user_type')")
                or die('query failed');

                if ($insert)
                {
                    $message[] = 'registred successfully!';
                    // header('location:login.php');
                }
                else
                {
                    $message[] = 'registration failed!';
                }
            }
        }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title> Register Form </title>
    <link rel="stylesheet" href="stylee.css">
</head>

<body>
    <img class="img" src="Libyan%20Desert3.jpg">
    <div class="center">
        <h1>Register</h1>
        <form method="post">

            <?php

            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class = "message">' . $message . '</div>';
                }
            }

            ?>

            <input hidden type="text" name="user_type" value="1">

            <div class="txt_field">
                <input type="text" name="user_name" required>
                <span></span>
                <label>Username</label>
            </div>

            <div class="txt_field">
                <input type="email" name="email" required>
                <span></span>
                <label>Email</label>
            </div>

            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>

            <div class="txt_field">
            <input type="password" name="cpassword" required>
                <span></span>
                <label>Confirm Password</label>
            </div>

            <input type="submit" name="submit" value="Submit" class="btn">
            <div class="signup_link">
                Already have an account? <a href="login.php">Login</a>
            </div>
        </form>
    </div>

</body>

</html>