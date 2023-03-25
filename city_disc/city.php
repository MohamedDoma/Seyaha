<?php

include '../config.php';

?>

<?php
    $city_id = $_GET['id'];
    $sql = "SELECT * FROM city_info WHERE info_city_id = $city_id";
    $result = $conn -> query($sql);

    $sql1 = "SELECT * FROM cafe WHERE cafe_city_id = $city_id";
    $result1 = $conn -> query($sql1);

    $sql2 = "SELECT * FROM hotel WHERE hotel_city_id = $city_id";
    $result2 = $conn -> query($sql2);
?>


<?php
    session_start();

    $user_id = $_SESSION['user_id'];

    // $u_id = $_GET['uid'];

    $select1 = mysqli_query($conn, "SELECT * FROM `users` WHERE users_id = '$user_id'") or die('query failed');

    if (mysqli_num_rows($select1) > 0) {
        $fetch = mysqli_fetch_assoc($select1);
    }
?>

<?php
    $city_id = $_GET['id'];
    $query_pag_data1 = "SELECT * FROM city WHERE city_id = $city_id";
    $result_pag_data1 = mysqli_query($conn, $query_pag_data1);
    while($row = mysqli_fetch_assoc($result_pag_data1))
    $city_name = $row['city_name'];
{
?>

<!DOCTYPE html>
<html>
 <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
     <title><?php echo $city_name ?></title>
     <?php } ?>
      <link rel="stylesheet" href="stylee.css">
      <?php
        if(isset($_GET['id']))
        {
            $city_id = $_GET['id'];
            $city = "SELECT * FROM city WHERE city_id='$city_id'";
            $city_run = mysqli_query($conn, $city);

            if(mysqli_num_rows($city_run) > 0)
            {
                foreach($city_run as $cities)
                {
        ?>

        <?php
            echo "<div style='background-image: url(../city_cover/".$cities['city_cover'].")' class='container'>";
        ?>
   <div class="navbar">
        <!----imglogo---->
        <nav id="navbar">
            <ul id="menu">
                <li><a href="../index.php">HOME</a></li>
                <li><a href="../tripoli/index.html">TRIPOLI</a></li>
                <li><a href="../index.php#aboutus">ABOUT US</a></li>
                <li><a href="../index.php#CATEGORIES">CATEGORIES</a></li>
                <li><a class="news" href="../NEWS/index.php">NEWS</a></li>
            </ul>
        </nav>
        <img src="timg/menu.png" class="menu-icon">
        
        </div>
     </div>
     </head>
     
     <body>
         <!--- MAP SEC--->
            <section class="map">
                <?php
                    if ($fetch['language'] == '1')
                    {
                        echo "<a href='$cities[city_location]' class='btnMAP'>زر الموقع</a>";
                    }
                    else
                    {
                        echo "<a href='$cities[city_location]' class='btnMAP'>VISIT LOCATION</a>";
                    }
                ?>
    </section>
         
         <!---sec3--->

         <?php
            if ($result -> num_rows > 0)
            {
                while ($row = $result -> fetch_assoc())
                {
                    echo "<section class='sec3'>";
                    echo "<div class='wrapper'>";
                    if ($fetch['language'] == '1')
                    {
                        echo "<img style='float: right; margin-left: 20px' class='img' src='../info_img/".$row['info_img']."'>";
                        echo "<div style='text-align: right; margin-right: 26%;' class='text'>";
                        echo "<h2>$row[info_title_ar]</h2>";
                        echo "<p>$row[info_description_ar]</p>";
                    }
                    else
                    {
                        echo "<img class='img' src='../info_img/".$row['info_img']."'>";
                        echo "<div class='text'>";
                        echo "<h2>$row[info_title]</h2>";
                        echo "<p>$row[info_description]</p>";
                    }
                    echo "</div>";
                    echo "</div>";
                    echo "</section>";
                }
            }
          ?>

         
         <!---caffes--->
        <section class="ourteam">
            <div class=" col1">
                <?php
                    if ($fetch['language'] == '1')
                    {
                        echo "<h1 class='title'>المقاهي</h1>";
                    }
                    else
                    {
                        echo "<h1 class='title'>Cafes</h1>";
                    }
                ?>
                <div class="team-row">

                <?php
                    if ($result1 -> num_rows > 0)
                    {
                        while ($row1 = $result1 -> fetch_assoc())
                        {
                            echo "<div class='member'>";
                            echo "<img src='../cafe_img/".$row1['cafe_img']."'>";
                            if ($fetch['language'] == '1')
                            {
                                echo "<h2>$row1[cafe_name_ar]</h2>";
                            }
                            else
                            {
                                echo "<h2>$row1[cafe_name]</h2>";
                            }
                            echo "<a href='$row1[cafe_location]' class='btnMAP'> VISIT LOCATION </a>";
                            echo "</div>";
                        }
                    }
                ?>
                </div>
            </div>
        </section>
         <!----hotels--->
         
        <section class="ourteam">
            <div class=" col1">
                <?php
                    if ($fetch['language'] == '1')
                    {
                        echo "<h1 class='title'>الفنادق</h1>";
                    }
                    else
                    {
                        echo "<h1 class='title'>Hotels</h1>";
                    }
                ?>                <div class="team-row">

                <?php
                    if ($result2 -> num_rows > 0)
                    {
                        while ($row2 = $result2 -> fetch_assoc())
                        {
                            echo "<div class='member'>";
                            echo "<img src='../hotel_img/".$row2['hotel_img']."'>";
                            if ($fetch['language'] == '1')
                            {
                                echo "<h2>$row2[hotel_name_ar]</h2>";
                            }
                            else
                            {
                                echo "<h2>$row2[hotel_name]</h2>";
                            }
                            echo "<a href='$row2[hotel_location]' class='btnMAP'> VISIT LOCATION </a>";
                            echo "</div>";
                        }
                    }
                ?>
                </div>
            </div>
        </section>
    <?php
    }
}
}
    ?>
    </body>
    
</html>