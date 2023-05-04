<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:../login-reg-img/login.php');
}

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:login-reg-img/login.php');
}
?>

<?php

$select1 = mysqli_query($conn, "SELECT * FROM `users` WHERE users_id = '$user_id'") or die('query failed');

if (mysqli_num_rows($select1) > 0) {
    $fetch = mysqli_fetch_assoc($select1);
}
?>

<?php
$sql = "SELECT * FROM city WHERE city_type = $fetch[type_city] ORDER BY views DESC LIMIT 4";
$result = $conn->query($sql);
?>

<?php
    if (isset($_POST['submitll']))
    {
        $typell = mysqli_real_escape_string($conn, $_POST['typell']);

        $update = "UPDATE users SET language = '$typell'
        WHERE users_id = '$fetch[users_id]'";

        $update_run = mysqli_query($conn, $update);

        if ($update)
        {
            header('location:index.php');
        }
    }
?>

<?php
    if (isset($_POST['submit']))
    {
        $type = mysqli_real_escape_string($conn, $_POST['type']);

        $update = "UPDATE users SET type_city = '$type'
        WHERE users_id = '$fetch[users_id]'";

        $update_run = mysqli_query($conn, $update);

        if ($update)
        {
            header('location:index.php');
        }
    }
?>

<!--  -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.sbox input[type="text"]').on("keyup input", function(){
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if(inputVal.length){
                    $.get("backend-search.php", {term: inputVal}).done(function(data){
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else{
                    resultDropdown.empty();
                }
            });
        
        // Set search input value on click of result item
            $(document).on("click", ".result p", function(){
                $(this).parents(".sbox").find('input[type="text"]').val($(this).text());
                $(this).parent(".result").empty();
            });
        });
    </script>

<script>
        $(document).ready(function(){
            $('.sbox input[type="text"]').on("keyup input", function(){
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result-ar");
                if(inputVal.length){
                    $.get("backend-search-ar.php", {term: inputVal}).done(function(data){
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else{
                    resultDropdown.empty();
                }
            });
        
        // Set search input value on click of result item
            $(document).on("click", ".result-ar p", function(){
                $(this).parents(".sbox").find('input[type="text"]').val($(this).text());
                $(this).parent(".result-ar").empty();
            });
        });
    </script>


    <title> tourist website</title>
    <link rel="stylesheet" href="styleee.css">
    <style>
        p {
            letter-spacing: 1px;
            line-height: 30px;
        }

        .sbox{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .sbox input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
        background-color: #fff;
        color: #000;
    }
    .sbox input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
        color: #000;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
        color: #000;
    }
    .result p:hover{
        background: #f2f2f2;
    }

    .result-ar{
        text-align: right;
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
        background-color: #fff;
        color: #000;
    }
    .sbox input[type="text"], .result-ar{
        width: 100%;
        box-sizing: border-box;
        color: #000;
    }
    /* Formatting result items */
    .result-ar p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
        color: #000;
    }
    .result-ar p:hover{
        background: #f2f2f2;
    }
    </style>

    <script defer src="script.js"></script>
    <script src="https://kit.fontawesome.com/b3be9c9115.js" crossorigin="anonymous"></script>
</head>

<body>
            <!-- <button data-close-button class="close-button">&times;</button> -->

    <?php
    if ($fetch['language'] == '0') {
        echo "<div class='modal active' id='modal'>";
            echo "<div class='modal-header'>";
                echo "<div class='title'>Welcome To Libya</div>";
            echo "</div>";

            echo "<div class='modal-body'>";
                echo "<form method='post'>";
                    echo "<p>Language / اللغة</p>";

                    echo "<input type='radio' id='arabic' name='typell' value='1'>";
                    echo "<label for='arabic'> العربية</label><br>";

                    echo "<input type='radio' id='english' name='typell' value='2'>";
                    echo "<label for='english'> English</label><br>";
                    
                    echo "<br>";
                    
                    echo "<input type='submit' name='submitll' value='Submit' class='btn'>";
                echo "</form>";
            echo "</div>";
        echo "</div>";
        echo "<div id='overlay' class='active'></div>";
    } else if ($fetch['language'] == '1') {
        if ($fetch['type_city'] == '0') {
            echo "<div class='modal active' id='modal'>";
                echo "<div class='modal-header'>";
                    echo "<div class='title'>Welcome To Libya</div>";
                echo "</div>";

                echo "<div class='modal-body'>";
                    echo "<form method='post'>";
                        echo "<p>ما هو صنف المدينة الذي تفضله؟</p>";

                        echo "<input type='radio' id='mountain' name='type' value='1'>";
                        echo "<label for='mountain'> مناطق جبلية</label><br>";

                        echo "<input type='radio' id='desert' name='type' value='2'>";
                        echo "<label for='desert'> مناطق صحراوية</label><br>";

                        echo "<input type='radio' id='coastal' name='type' value='3'>";
                        echo "<label for='coastal'> مناطق ساحلية</label><br>";
                        
                        echo "<br>";
                        
                        echo "<input type='submit' name='submit' value='Submit' class='btn'>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";

            echo "<div id='overlay' class='active'></div>";
        }
    }   
    else if ($fetch['language'] == '2') {
        if ($fetch['type_city'] == '0') {
            echo "<div class='modal active' id='modal'>";
                echo "<div class='modal-header'>";
                    echo "<div class='title'>Welcome To Libya</div>";
                echo "</div>";

                echo "<div class='modal-body'>";
                    echo "<form method='post'>";
                        echo "<p>What type of city do you prefer?</p>";

                        echo "<input type='radio' id='mountain' name='type' value='1'>";
                        echo "<label for='mountain'> mountainous areas</label><br>";

                        echo "<input type='radio' id='desert' name='type' value='2'>";
                        echo "<label for='desert'> desert areas</label><br>";

                        echo "<input type='radio' id='coastal' name='type' value='3'>";
                        echo "<label for='coastal'> coastal areas</label><br>";
                        
                        echo "<br>";
                        
                        echo "<input type='submit' name='submit' value='Submit' class='btn'>";
                    echo "</form>";
                echo "</div>";
            echo "</div>";

            echo "<div id='overlay' class='active'></div>";
        }
    }   
    ?>

    <div class="container">
        <div class="navbar">
            <!----imglogo---->
            <nav id="navbar">
                <ul id="menu">
                    <li><a href="">HOME</a></li>
                    <li><a href="tripoli/index.html">TRIPOLI</a></li>
                    <li><a href="#aboutus">ABOUT US</a></li>
                    <li><a href="#CATEGORIES">CATEGORIES</a></li>
                    <li><a class="news" href="NEWS/index.php">NEWS</a></li>
                    <li><a href="index.php?logout=<?php echo $user_id; ?>">LOG OUT</a></li>
                </ul>
            </nav>
            <img src="img/menu.png" class="menu-icon">

        </div>

        <!---that row has tow col--->
        <div class="row">
            <div class="col">
                <h1> LIBYA </h1>
                <p> Explore the landmarks and monument of our country</p>
                <!-- <div class="sbox">

                    <input class="inp" style="color: white;" type="text" autocomplete="off" placeholder="Search country..." />
                    <div class="result"></div>

                </div> -->

                <div class="sbox">
                    <?php
                        if ($fetch['language'] == '1')
                        {
                            echo "<input class='inp' style='color: white; text-align:right;' type='text' autocomplete='off' placeholder='إبحث عن مدينة' />";
                            echo "<div class='result-ar'></div>";
                        }
                        else {
                            echo "<input class='inp' style='color: white;' type='text' autocomplete='off' placeholder='Search country...' />";
                            echo "<div class='result'></div>";
                        }
                    ?>
                    
                </div>
            </div>
            <!---second col--->
            <div class="col">

                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<a href='city_disc/city.php?id=$row[city_id]'>";
                        echo "<div style='background-image: url(city_img/" . $row['city_img'] . ")' class='card'>";
                        if ($fetch['language'] == '1')
                        {
                            echo "<h5 style='text-align: right;'> $row[city_name_ar] <h5>";
                            echo "<p style='text-align: right;'> $row[city_caption_ar] </p>";
                        }
                        else{
                            echo "<h5> $row[city_name] <h5>";
                            echo "<p> $row[city_caption] </p>";
                        }
                        echo "</div>";
                        echo "</a>";
                    }
                }
                ?>
            </div>
        </div>
    </div>






    <!----section for more--->

    <div class="more">
        <section class="sec3">
            <h1>our website</h1>
            <p>to know more about libya to know more about libya to know more about libya to know more about libya to know more about libya to know more about libya to know more about libya to know more about liby</p>
            <hr>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

        </section>

        <div class="row">
            <div class="more-col">
                <h3> Restraunts, cafes, and hotels</h3>
                <p> Attend the opening ceremonies and be prepared to start the first match directly following the ceremony. </p>
            </div>
            <div class="more-col">
                <h3>Tourist cities </h3>
                <p> We offer you tourist cities of different kinds، including desert climate, and others overlooking the sea, and many other classifications.</p>
            </div>
            <div class="more-col">
                <h3>Archaeological sites</h3>
                <p> Our country is characterized by archaeological sites and museums that reflect the culture of previous eras and the history of nations, and here we are providing a glimpse of this ancient treasure.</p>
            </div>
        </div>
    </div>


    <!-----section2---->
    <section class="sec2" id="CATEGORIES">
        <h1> CATEGORIES</h1>

        <div class="row">
            <div class="sec2-cl2">
                <img class="imgcl" src="img/.0.0.0.png">
                <div class="layer">
                    <h3> LAKE </h3>
                </div>
            </div>

            <div class="sec2-cl2">
                <img class="imgcl2" src="img/desertt.png">
                <div class="layer">
                    <h3>DESERT</h3>
                </div>
            </div>

            <div class="sec2-cl2">
                <img class="imgcl3" src="img/Untitled.png">
                <div class="layer">
                    <h3> MOUNTEN </h3>
                </div>
            </div>
        </div>
    </section>
    <!-----sec3---->


    <!----contact sec----->
    <section class="contactsec">
        <h1>subscribe for more info<br> about libya</h1>
        <!-- <a href="login-reg-img/index.html" class="btncont"> REGISTER</a> -->

    </section>

    <!-----footer---->
    <div class="about-section" id="aboutus">
        <div class="inner-container">
            <h1>About Us</h1>
            <p class="text">
                A tourist guide to the distinctive and popular landmarks and cities in beloved Libya.<br>
                A project submitted for a bachelor's degree of information technology college،Under the supervision of the honorable Dr Mohammed Abduldaiem.
            </p>

        </div>
    </div>

    <section class="ourteam">
        <div class=" col1">
            <h1 class="title">our team</h1>
            <p> In an effort to introduce the culture of Libya across the world and highlight the Libyan identity for every explorer.<br>this project is submitted by the students: </p>
            <div class="team-row">
                <div class="member">
                    <img src=img/mom.jpg>
                    <h2>Alaa Elhouni</h2>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum similique eligendi numquam.</p>
                </div>
                <div class="member">
                    <img src=img/mom.jpg>
                    <h2>Hanan Swissi </h2>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum similique eligendi numquam.</p>
                </div>
                <div class="member">
                    <img src=img/mom.jpg>
                    <h2>Samah Ghnia</h2>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum similique eligendi numquam.</p>
                </div>
            </div>
        </div>
    </section>

    <div style="display: flex; flex-direction: row; justify-content: space-evenly; align-items: center; margin-bottom: 3%; font-size: 50px;">
        <a href="https://facebook.com"><i class="fa-brands fa-square-facebook" style="color: #3b5998;"></i></a>
        <a href="https://google.com"><i class="fa-brands fa-google" style="color: #4285f4;"></i></a>
        <a href="https://youtube.com"><i class="fa-brands fa-youtube" style="color: #ff0000;"></i></a>
        <a href="https://www.tripadvisor.com/"><img src="img/trip.png" style="width: 45px; margin: 0; padding: 0;"></a>
    </div>
</body>

</html>