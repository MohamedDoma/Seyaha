<?php

include '../config.php';

$city_id = $_GET['id'];

if (isset($_POST['submit']))
{
    $hotel_name = $_POST['hotel_name'];
    $hotel_name_ar = $_POST['hotel_name_ar'];
    $hotel_location = $_POST['hotel_location'];

    $image_size = $_FILES['image']['size'];
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../cafe_img/'.$image;

    if(!isset($image) || trim($image) == '')
    {
        $update = "UPDATE hotel SET hotel_name = '$hotel_name', hotel_name_ar = '$hotel_name_ar', hotel_location = '$hotel_location'
        WHERE hotel_id= '$city_id'";
    }
    else
    {
        $update = "UPDATE hotel SET hotel_name = '$hotel_name', hotel_name_ar = '$hotel_name_ar', hotel_location = '$hotel_location',
        hotel_img = '$image'
        WHERE hotel_id= '$city_id'";
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
            $cities = "SELECT * FROM hotel WHERE hotel_id='$city_id'";
            $cities_run = mysqli_query($conn, $cities);

            if(mysqli_num_rows($cities_run) > 0)
            {
                foreach($cities_run as $city)
                {
        ?>
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

        <div class="center">
        <h1>Edit Hotel</h1>
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
                <input type="text" name="hotel_name" value="<?php echo $city['hotel_name'];?>" required>
                <span></span>
                <label>Hotel Name</label>
            </div>

            <div class="txt_field">
                <input type="text" name="hotel_name_ar" value="<?php echo $city['hotel_name_ar'];?>" required>
                <span></span>
                <label>إسم الفندق</label>
            </div>

            <div class="txt_field">
                <input type="text" name="hotel_location" value="<?php echo $city['hotel_location'];?>" required>
                <span></span>
                <label>Hotel Location</label>
            </div>

            <div class="txt_field">
                <p>Cover</p>
                <input type="file" name="image" value="<?php echo $city['hotel_img'];?>" accept="image/jpg, image/jpeg, image/png">
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