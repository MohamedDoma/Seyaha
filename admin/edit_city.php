<?php

include '../config.php';

$city_id = $_GET['id'];

if (isset($_POST['submit']))
{
    $city_name = $_POST['city_name'];
    $city_name_ar = $_POST['city_name_ar'];
    $city_caption = $_POST['city_caption'];
    $city_caption_ar = $_POST['city_caption_ar'];
    $city_location = $_POST['city_location'];
    $type = $_POST['type'];
    $status = $_POST['status'];

    $image_size = $_FILES['image']['size'];

    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../city_img/'.$image;

    $cover = $_FILES['cover']['name'];
    $image_tmp_name2 = $_FILES['cover']['tmp_name'];
    $image_folder2 = '../city_cover/'.$cover;

    if(!isset($image) || trim($image) == '')
    {
        $update = "UPDATE city SET city_name = '$city_name', city_name_ar = '$city_name_ar', city_caption = '$city_caption',
        city_caption_ar = '$city_caption_ar', city_location = '$city_location', city_cover = '$cover', city_type = '$type',
        city_status = '$status'
        WHERE city_id= '$city_id'";
    }
    else if(!isset($cover) || trim($cover) == '')
    {
        $update = "UPDATE city SET city_name = '$city_name', city_name_ar = '$city_name_ar', city_caption = '$city_caption',
        city_caption_ar = '$city_caption_ar', city_location = '$city_location', city_img = '$image', city_type = '$type',
        city_status = '$status'
        WHERE city_id= '$city_id'";
    }
    else
    {
        $update = "UPDATE city SET city_name = '$city_name', city_name_ar = '$city_name_ar', city_caption = '$city_caption',
        city_caption_ar = '$city_caption_ar', city_location = '$city_location', city_img = '$image', city_cover = '$cover',
        city_status = '$status'
        WHERE city_id= '$city_id'";
    }

        $update_run = mysqli_query($conn, $update);

            if ($update)
            {
                move_uploaded_file($image_tmp_name, $image_folder);
                move_uploaded_file($image_tmp_name2, $image_folder2);
                $message[] = 'successfully!';
            }
            else
            {
                $message[] = 'registration failed!';
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
        <?php
        if(isset($_GET['id']))
        {
            $city_id = $_GET['id'];
            $cities = "SELECT * FROM city WHERE city_id='$city_id'";
            $cities_run = mysqli_query($conn, $cities);

            if(mysqli_num_rows($cities_run) > 0)
            {
                foreach($cities_run as $city)
                {
        ?>
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
        <h1>Edit City</h1>
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

            <?php
            if ($city['city_status'] == '1')
            {
                $x = "Publish";
            }
            else if ($city['city_status'] == '0')
            {
                $x = "UnPublish";
            }
            ?>

                <option selected value="<?php echo $city['city_status'] ?>"><?php echo $x ?></option>

            <?php
            if ($city['city_status'] == '1')
            {
                echo "<option value='0'>UnPublish</option>";
            }
            else if ($city['city_status'] == '0')
            {
                echo "<option value='1'>Publish</option>";
            }
            ?>                
            </select>

            <br>
            <br>

            <select name="type" class="sa from-control" required>

            <?php
            if ($city['city_type'] == '1')
            {
                $x = "منطقة جبلية";
            }
            else if ($city['city_type'] == '2')
            {
                $x = "منطقة صحراوية";
            }
            else if ($city['city_type'] == '3')
            {
                $x = "منطقة ساحلية";
            }
            ?>

                <option selected value="<?php echo $city['city_type'] ?>"><?php echo $x ?></option>

            <?php
            if ($city['city_type'] == '1')
            {
                echo "<option value='2'>منطقة صحراوية</option>";
                echo "<option value='3'>منطقة ساحلية</option>";
            }
            else if ($city['city_type'] == '2')
            {
                echo "<option value='1'>منطقة جبلية</option>";
                echo "<option value='3'>منطقة ساحلية</option>";
            }
            else if ($city['city_type'] == '3')
            {
                echo "<option value='1'>منطقة جبلية</option>";
                echo "<option value='2'>منطقة صحراوية</option>";
            }
            ?>
            </select>

            <br>
            <br>

            <div class="txt_field">
                <input type="text" name="city_name" value="<?php echo $city['city_name'];?>" required>
                <span></span>
                <label>City Name</label>
            </div>

            <div class="txt_field">
                <input type="text" name="city_name_ar" value="<?php echo $city['city_name_ar'];?>" required>
                <span></span>
                <label>إسم المدينة</label>
            </div>

            <div class="txt_field">
                <input type="text" name="city_caption" value="<?php echo $city['city_caption'];?>" required>
                <span></span>
                <label>City Caption</label>
            </div>

            <div class="txt_field">
                <input type="text" name="city_caption_ar" value="<?php echo $city['city_caption_ar'];?>" required>
                <span></span>
                <label>تسمية توضيحية للمدينة</label>
            </div>

            <div class="txt_field">
                <input type="text" name="city_location" value="<?php echo $city['city_location'];?>" required>
                <span></span>
                <label>City Location</label>
            </div>

            <div class="txt_field">
                <p>Cover1</p>
                <input type="file" name="image" value="<?php echo $city['city_img'];?>" accept="image/jpg, image/jpeg, image/png">
                <span></span>
            </div>

            <div class="txt_field">
                <p>Cover2</p>
                <input type="file" name="cover" value="<?php echo $city['city_cover'];?>" accept="image/jpg, image/jpeg, image/png">
            </div>

            <input type="submit" name="submit" value="Submit" class="btn">
        </form>
    </div>

    <?php
    }
}
}
    ?>
    </body>
</html>