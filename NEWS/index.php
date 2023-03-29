<?php
    include '../config.php';
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
    $sql = "SELECT * FROM news WHERE news_status = '1'";
    $result = $conn -> query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title> NEWS </title>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <link rel="stylesheet" href="stylee.css">
    </head>
    
    <body>
    <div class="navbar">
        <!----imglogo---->
        <nav id="navbar">
            <ul id="menu">
                <li><a href="../index.php">HOME</a></li>
                <li><a href="../tripoli/index.html">TRIPOLI</a></li>
                <li><a href="../index.php#aboutus">ABOUT US</a></li>
                <li><a href="../index.php#CATEGORIES">CATEGORIES</a></li>
                <li><a  href="#">NEWS</a></li>
            </ul>
        </nav>
        <img src="../img/menu.png" class="menu-icon">
        </div>

        <?php
            if ($result -> num_rows > 0)
            {
                while ($row = $result -> fetch_assoc())
                {
                    echo "<div style='background-size: 60%; background-image: url(../news_img/".$row['news_img'].")' class='about-section'>";
                    echo "<div class='inner-container'>";
                    if ($fetch['language'] == '1')
                    {
                        echo "<h1> $row[news_title_ar] <h1>";
                        echo "<p class='text'> $row[news_description_ar] </p>";                    }
                    else
                    {
                        echo "<h1> $row[news_title] <h1>";
                        echo "<p class='text'> $row[news_description] </p>";
                    }
                    echo "</div>";
                    echo "</div>";
                }
            }
        ?>
    
    </body>
</html>