<?php

include '../config.php';

?>

<!DOCTYPE html>

<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/admin.css">
        <script src="https://kit.fontawesome.com/b3be9c9115.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/b3be9c9115.js" crossorigin="anonymous"></script>
        <title>Management</title>

        <style>
            .table-wrapper{
    width: 50%;
    margin: 30px auto;
    background: rgba(255, 255, 255, 0.8);
    padding: 50px;
    box-shadow: 0 0 1000px rgb(147, 146, 146);
    border-radius: 15px;
}

.table-title{
    padding-bottom: 10px;
    margin: 0 0 10px;
}

.table-title h2{
    margin: 6px 0 0;
    font-size: 22px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.table-title .add-new{
    float: right;
    height: 30px;
    font-weight: bold;
    font-size: 12px;
    text-shadow: none;
    min-width: 100px;
    border-radius: 50px;
    line-height: 13px;
}

.table-title .add-new i{
    margin-right: 4px;
}

table.table{
    table-layout: fixed;
    background: #fff;
}

table.table tr th, table.table tr td{
    border-color: #a3a1a1;
}

table.table th i{
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}

table.table th:last-child{
    width: 100px;
}

table.table td a{
    cursor: pointer;
    display: inline-block;
    margin: 0 5px;
    min-width: 24px;
}
table.table td a.add {
    color: #27C46B;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}
table.table td a.add i {
    font-size: 24px;
 margin-right: -1px;
    position: relative;
    top: 3px;
}    
table.table .form-control {
    height: 32px;
    line-height: 32px;
    box-shadow: none;
    border-radius: 2px;
}
table.table .form-control.error {
border-color: #f50000;
}
table.table td .add {
display: none;
}

.dropbtn {
    background-color: #04AA6D;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
  }
  
  .dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
  }
  
  #myInput {
    box-sizing: border-box;
    background-image: url('searchicon.png');
    background-position: 14px 12px;
    background-repeat: no-repeat;
    font-size: 16px;
    padding: 14px 20px 12px 45px;
    border: none;
    border-bottom: 1px solid #ddd;
  }
  
  #myInput:focus {outline: 3px solid #ddd;}
  
  .dropdown {
    position: relative;
    display: inline-block;
  }
  
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f6f6f6;
    min-width: 230px;
    overflow: auto;
    border: 1px solid #ddd;
    z-index: 1;
  }
  
  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }
  
  .dropdown a:hover {background-color: #ddd;}
  
  .show {display: block;}
        </style>
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

        <diV class="table-wrapper">
            <div class="table-title">
                <div class="row">
                <a href="add_city.php" type="button" class="btn btn-info "><i class="fa fa-plus"></i> Add New</a>
                    <div><h2>City <b></b></h2></div>
                </div>
            </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 7%;">NO.</th>
                    <th>Name</th>
                    <th>إسم المدينة</th>
                    <th>Type</th>
                    <th>Views</th>
                    <th style="width: 10%;">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    include "../config.php";
                    $query_pag_data = "SELECT * FROM city";

                    // $sql = mysqli_query($conn, "SELECT * FROM students 
                    // INNER JOIN course_type ON course_type.c_id = students.course_type_id
                    // WHERE course_type_id = '4'");

                    $result_pag_data = mysqli_query($conn, $query_pag_data);

                    $i = 1;

                    while($row = mysqli_fetch_assoc($result_pag_data))
                    {
                        $city_id = $row['city_id'];
                        $city_name = $row['city_name'];
                        $city_name_ar = $row['city_name_ar'];
                        $city_type = $row['city_type'];
                        $views = $row['views'];
                ?>

                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $city_name; ?></td>
                    <td><?php echo $city_name_ar; ?></td>

                    <td><?php 
                        if ($city_type == 1)
                        {
                            echo "منطقة جبلية";
                        }
                        else if ($city_type == 2)
                        {
                            echo "منطقة صحراوية";
                        }
                        else if ($city_type == 3)
                        {
                            echo "منطقة ساحلية";
                        }
                    ?></td>
                    
                    <td><?php echo $views ?></td>

                    <td><?php echo "<a href='edit_city.php?id=$row[city_id]'><i class='fa-solid fa-pen-to-square'></a>" ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </diV>
    </body>
</html>