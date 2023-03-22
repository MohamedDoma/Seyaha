<?php

include '../config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id))
{
    header('location:../login.php');
}

if (isset($_GET['logout']))
{
    unset($user_id);
    session_destroy();
    header('location:../login.php');
}

?>

<?php

    $select1 = mysqli_query($conn, "SELECT * FROM `employee` WHERE employee_id = '$user_id'") or die('query failed');

    if (mysqli_num_rows($select1) > 0)
    {
        $fetch = mysqli_fetch_assoc($select1);
    }
?>

<!DOCTYPE html>

<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/admin.css">
        <script src="https://kit.fontawesome.com/b3be9c9115.js" crossorigin="anonymous"></script>
        <title>Management</title>
    </head>

    <body>
    <div class="area"></div><nav class="main-menu">
            <ul>
                <li class="has-subnav">
                    <a href="cafes.php">
                       <i class="fa fa-mug-saucer fa-2x"></i>
                        <span class="nav-text">
                            Add Cafe
                        </span>
                    </a>
                    
                </li>
                <li class="has-subnav">
                    <a href="hotels.php">
                       <i class="fa fa-hotel fa-2x"></i>
                        <span class="nav-text">
                            Add Hotel
                        </span>
                    </a>
                   
                </li>
                <li>
                    <a href="news.php">
                        <i class="fa fa-newspaper fa-2x"></i>
                        <span class="nav-text">
                            Add News
                        </span>
                    </a>
                </li>
            </ul>

            <ul class="logout">
                <li>
                   <a href="#">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>

        <p class="ftext">Welcome <?php echo $fetch['employee_name'];?></p>

    </body>
</html>