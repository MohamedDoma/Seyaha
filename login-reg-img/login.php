<?php
  include '../config.php';
  session_start();

  if(isset($_POST['submit'])){

    $username = mysqli_real_escape_string($conn, $_POST['user_name']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select1 = mysqli_query($conn, "SELECT * FROM `users` WHERE users_name = '$username' AND users_password = '$pass'")
    or die('query failed');

    $select2 = mysqli_query($conn, "SELECT * FROM `admin` WHERE admin_name = '$username' AND admin_password = '$pass'")
    or die('query failed');
    
    $select3 = mysqli_query($conn, "SELECT * FROM `employee` WHERE employee_name = '$username' AND employee_password = '$pass'")
    or die('query failed');

    if (mysqli_num_rows($select1) > 0)
    {
        $row = mysqli_fetch_assoc($select1);

        if ($row['users_type'] == '1')
        {
            $_SESSION['user_id'] = $row['users_id'];
            header('location:../index.php');
        }
    }
    else if(mysqli_num_rows($select2) > 0){
        $row = mysqli_fetch_assoc($select2);

        if ($row['users_type'] == '2')
        {
            $_SESSION['user_id'] = $row['admin_id'];
            header('location:../admin/dashboard.php');
        }
    }
    else if(mysqli_num_rows($select3) > 0){
      $row = mysqli_fetch_assoc($select3);

      if ($row['users_type'] == '3')
      {
          $_SESSION['user_id'] = $row['employee_id'];
          header('location:../employee/dashboard.php');
      }
  }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title> Login Form </title>
  <link rel="stylesheet" href="stylee.css">
</head>

<body>
  <img class="img" src="Libyan%20Desert3.jpg">
    <div class="center">
    <h1>Login</h1>
    <form method="post">
      <div class="txt_field">
        <input type="text" name="user_name" required>
        <span></span>
        <label>Username</label>
      </div>
      <div class="txt_field">
        <input type="password" name="password" required>
        <span></span>
        <label>Password</label>
      </div>
      <!-- <div class="pass">Forgot Password?</div> -->
      <input type="submit" name="submit" value="Login">
      <div class="signup_link">
        Not a member? <a href="reg.php">Signup</a>
      </div>
    </form>
  </div>

</body>

</html>