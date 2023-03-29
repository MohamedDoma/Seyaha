<?php

include '../config.php';

if (isset($_POST['submit']))
{
    $city_name = mysqli_real_escape_string($conn, $_POST['city_name']);
    $city_name_ar = mysqli_real_escape_string($conn, $_POST['city_name_ar']);
    $city_caption = mysqli_real_escape_string($conn, $_POST['city_caption']);
    $city_caption_ar = mysqli_real_escape_string($conn, $_POST['city_caption_ar']);
    $city_location = mysqli_real_escape_string($conn, $_POST['city_location']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $image_size = $_FILES['image']['size'];

    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../city_img/'.$image;

    $cover = $_FILES['cover']['name'];
    $image_tmp_name2 = $_FILES['cover']['tmp_name'];
    $image_folder2 = '../city_cover/'.$cover;

    $select = mysqli_query($conn, "SELECT * FROM `city` WHERE city_name = '$city_name' AND city_name_ar = '$city_name_ar'") 
    or die ('query failed');

    if (mysqli_num_rows($select) > 0)
    {
        $message[] = 'user already exist';
    }
    else
    {
        if ($image_size > 2000000)
        {
            $message[] = 'image size is too large!';
        }
        else
        {
            $insert = mysqli_query($conn, "INSERT INTO `city` 
            (city_name, city_name_ar, city_caption, city_caption_ar, city_location, city_img, city_cover, city_type, city_status) VALUE
            ('$city_name', '$city_name_ar', '$city_caption', '$city_caption_ar', '$city_location','$image', '$cover', '$type', '$status')")
            or die('query failed');

            if ($insert)
            {
                move_uploaded_file($image_tmp_name, $image_folder);
                move_uploaded_file($image_tmp_name2, $image_folder2);
                $message[] = 'successfully!';
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

<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/add_city.css">
        <script src="https://kit.fontawesome.com/b3be9c9115.js" crossorigin="anonymous"></script>
        <title>Management</title>
    </head>

    <body>
    <div class="area"></div><nav class="main-menu">
    <ul>
                <li>
                    <a href="city.php">
                        <i class="fa fa-city fa-2x"></i>
                        <span class="nav-text">
                           Add City
                        </span>
                    </a>
                  
                </li>
                <li class="has-subnav">
                    <a href="info.php">
                        <i class="fa fa-file fa-2x"></i>
                        <span class="nav-text">
                            Add Info
                        </span>
                    </a>
                    
                </li>
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
                <li>
                    <a href="admin.php">
                        <i class="fa fa-lock fa-2x"></i>
                        <span class="nav-text">
                           Add Admin
                        </span>
                    </a>
                </li>
                <li>
                   <a href="employee.php">
                       <i class="fa fa-pen-to-square fa-2x"></i>
                        <span class="nav-text">
                            Add Employee
                        </span>
                    </a>
                </li>
                <li>
                   <a href="users.php">
                        <i class="fa fa-users fa-2x"></i>
                        <span class="nav-text">
                            Users
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

        <div class="center">
        <h1>Add City</h1>
        <form action="" method="post" enctype="multipart/form-data">

            <?php

            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class = "message">' . $message . '</div>';
                }
            }

            ?>

            <input hidden type="text" name="user_type" value="1">

            <select name="status" class="sa from-control" required>
                <option value="" selected="selected">-- Select Status --</option>
                <option value="1">Publish</option>
                <option value="0">UnPublish</option>
            </select>

            <div class="txt_field">
                <input type="text" name="city_name" required>
                <span></span>
                <label>City Name</label>
            </div>

            <div class="txt_field">
                <input type="text" name="city_name_ar" required>
                <span></span>
                <label>إسم المدينة</label>
            </div>

            <div class="txt_field">
                <input type="text" name="city_caption" required>
                <span></span>
                <label>City Caption</label>
            </div>

            <div class="txt_field">
                <input type="text" name="city_caption_ar" required>
                <span></span>
                <label>تسمية توضيحية للمدينة</label>
            </div>

            <div class="txt_field">
                <input type="text" name="city_location" required>
                <span></span>
                <label>City Location</label>
            </div>

            <div class="txt_field">
                <p>Cover1</p>
                <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" required>
                <span></span>
            </div>

            <div class="txt_field">
                <p>Cover2</p>
                <input type="file" name="cover" accept="image/jpg, image/jpeg, image/png" required>
            </div>

            <select name="type" class="sa from-control" required>
                <option value="" selected="selected">-- Select Type --</option>
                <option value="1">منطقة جبلية</option>
                <option value="2">منطقة صحراوية</option>
                <option value="3">منطقة ساحلية</option>
            </select>

            <br>
            <br>

            <input type="submit" name="submit" value="Submit" class="btn">
        </form>
    </div>

    </body>
</html>