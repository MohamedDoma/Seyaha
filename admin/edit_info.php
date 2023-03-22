<?php

include '../config.php';

$city_id = $_GET['id'];

if (isset($_POST['submit']))
{
    $title = $_POST['title'];
    $title_ar = $_POST['title_ar'];
    $description = $_POST['description'];
    $description_ar = $_POST['description_ar'];

    $image_size = $_FILES['image']['size'];
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../info_img/'.$image;

    if(!isset($image) || trim($image) == '')
    {
        $update = "UPDATE city_info SET info_title = '$title', info_title_ar = '$title_ar',
        info_description = '$description', info_description_ar = '$description_ar'
        WHERE info_id= '$city_id'";
    }
    else
    {
        $update = "UPDATE city_info SET info_title = '$title', info_title_ar = '$title_ar',
        info_description = '$description', info_description_ar = '$description_ar',
        info_img = '$image'
        WHERE info_id= '$city_id'";
    }

        $update_run = mysqli_query($conn, $update);

            if ($update)
            {
                move_uploaded_file($image_tmp_name, $image_folder);
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
            $cities = "SELECT * FROM city_info WHERE info_id='$city_id'";
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
        <h1>Edit Information</h1>
        <form action="" method="post" enctype="multipart/form-data">

            <?php

            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class = "message">' . $message . '</div>';
                }
            }

            ?>

            <input hidden type="text" name="user_type" value="1">

            <div class="txt_field">
                <input type="text" name="title" value="<?php echo $city['info_title'];?>" required>
                <span></span>
                <label>City Name</label>
            </div>

            <div class="txt_field">
                <input type="text" name="title_ar" value="<?php echo $city['info_title_ar'];?>" required>
                <span></span>
                <label>العنوان</label>
            </div>

            <div class="txt_field">
                <textarea type="text" name="description" placeholder="Description" rows="5" cols="40" required>
                    <?php
                        echo $city['info_description'];
                    ?>
                </textarea>
            </div>

            <div class="txt_field">
                <textarea type="text" name="description_ar" placeholder="الوصف" rows="5" cols="40" required>
                    <?php
                        echo $city['info_description_ar'];
                    ?>
                </textarea>
            </div>

            <div class="txt_field">
                <p>Cover</p>
                <input type="file" name="image" value="<?php echo $city['info_img'];?>" accept="image/jpg, image/jpeg, image/png">
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