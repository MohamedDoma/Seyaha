<?php

include '../config.php';

if (isset($_POST['submit']))
{
    $hotel_name = mysqli_real_escape_string($conn, $_POST['hotel_name']);
    $hotel_name_ar = mysqli_real_escape_string($conn, $_POST['hotel_name_ar']);
    $hotel_location = mysqli_real_escape_string($conn, $_POST['hotel_location']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);

    $image_size = $_FILES['cover']['size'];

    $image = $_FILES['cover']['name'];
    $image_tmp_name = $_FILES['cover']['tmp_name'];
    $image_folder = '../hotel_img/'.$image;

    $select = mysqli_query($conn, "SELECT * FROM `hotel` WHERE hotel_name = '$hotel_name' AND hotel_name_ar = '$hotel_name_ar' 
    AND hotel_city_id = '$country'") 
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
            $insert = mysqli_query($conn, "INSERT INTO `hotel` 
            (hotel_name, hotel_name_ar, hotel_location, hotel_img, hotel_city_id) VALUE
            ('$hotel_name', '$hotel_name_ar', '$hotel_location', '$image','$country')")
            or die('query failed');

            if ($insert)
            {
                move_uploaded_file($image_tmp_name, $image_folder);
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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

        <div class="center">
        <h1>Add Hotel</h1>
        <form action="" method="post" enctype="multipart/form-data">

            <?php

            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class = "message">' . $message . '</div>';
                }
            }

            ?>

            <input hidden type="text" name="user_type" value="1">

            <select name="country" class="sa from-control" required>
                <option value="" selected="selected">-- Select Country --</option>
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM city ORDER BY city_id");
            
                while($row = mysqli_fetch_array($sql))
                {
                    ?>
                    <option value="<?php echo $row['city_id']; ?>">
                    <?php echo $row['city_name'];?>
                    </option>
                    <?php
                }
                ?>
            </select>

            <div class="txt_field">
                <input type="text" name="hotel_name" required>
                <span></span>
                <label>Hotel Name</label>
            </div>

            <div class="txt_field">
                <input type="text" name="hotel_name_ar" required>
                <span></span>
                <label>إسم الفندق</label>
            </div>

            <div class="txt_field">
                <input type="text" name="hotel_location" required>
                <span></span>
                <label>Hotel Location</label>
            </div>

            <div class="txt_field">
                <p>Cover</p>
                <input type="file" name="cover" accept="image/jpg, image/jpeg, image/png" required>
            </div>

            <input type="submit" name="submit" value="Submit" class="btn">
        </form>
    </div>

    </body>
</html>