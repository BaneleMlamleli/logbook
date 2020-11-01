<?php
include_once("dbconnection.php");
// Assigning empty string values to the variables so that the table can display blank fields
session_start();
?>
<!DOCTYPE html>
<html lang="en" class="smart-style-0">
<head>
    <title>INTERN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript" src=".\clientsideUserFormValidation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
    .jumbotron-background {
        /*background: linear-gradient(to bottom, #00ffff 15%, #cc99ff 95%);*/
        background-image: url("./assets/587037221-pink-purple-and-blue-wallpapers.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
    .jumbotron-text {
        text-align: center;
        color: white;
        font-size: larger;
    }
</style>
<body>
<!--Navigation bar-->
<div class="fixed-top">
    <div class="collapse" id="navbarToggleExternalContent">
        <nav class="navbar navbar-dark bg-dark">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <h5 class="text-white h4"><a class="nav-link active" href="./index.php">Home</a></h5>
                </li>
                <li class="nav-item">
                    <h5 class="text-white h4"><a class="nav-link" href="./profile.php">Profile</a></h5>
                </li>
                <li class="nav-item">
                    <h5 class="text-white h4"><a class="nav-link" href="./logbook.php">Logbook</a></h5>
                </li>
            </ul>
        </nav>
    </div>
    <nav class="navbar navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
</div>
<!--Jumbotron-->
<div class="jumbotron jumbotron-background jumbotron-fluid">
    <div class="container jumbotron-text">
        <h1 class="display-4 ">PROFILE</h1>
        <p class="lead">View all your profile details.</p>
    </div>
</div>
</body>
<div class="container">
    <div class="card">
        <div class="card-header">
            <b>USER PROFILE DETAILS CONFIRMATION PAGE</b>
        </div>
        <img src="./assets/pic1.jpg" class="img-fluid" style="align-content: center;height: 20em;">
        <div class="card-body ">
            <!-- custom table -->
            <?php
                $eml = $_SESSION["Email"];
                $pw = $_SESSION["Password"];
                $sql = "SELECT * FROM `user` WHERE `usrEmail` = '{$eml}' AND `usrPassword` = '{$pw}'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                $correctDetails = false;
                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<ul class=\"list-group list-group-flush\">".
                                "<li class=\"list-group-item\">User Type:&nbsp;&nbsp;".$row['userType']."</li>".
                                "<li class=\"list-group-item\">Email:&nbsp;&nbsp;".$row['usrEmail']."</li>".
                                "<li class=\"list-group-item\">Firstname:&nbsp;&nbsp;".$row['firstname']."</li>".
                                "<li class=\"list-group-item\">Lastname:&nbsp;&nbsp;".$row['lastname']."</li>".
                                "<li class=\"list-group-item\">Date of birth:&nbsp;&nbsp;".$row['DOB']."</li>".
                                "<li class=\"list-group-item\">Student number:&nbsp;&nbsp;".$row['studentNumber']."</li>".
                                "<li class=\"list-group-item\">University:&nbsp;&nbsp;".$row['university']."</li>".
                                "<li class=\"list-group-item\">Qualification:&nbsp;&nbsp;".$row['qualification']."</li>".
                                "<li class=\"list-group-item\">Year of study:&nbsp;&nbsp;".$row['yearOfStudy']."</li>".
                                "<li class=\"list-group-item\">Course:&nbsp;&nbsp;".$row['course']."</li>".
                                "<li class=\"list-group-item\">Company of employment:&nbsp;&nbsp;".$row['companyOfEmployment']."</li>".
                            "</ul>";
                    }
                }else{
                    echo "<script type=text/javascript>alert('Error! Database is empty')</script>";
                }
            ?>
        </div>
    </div>
</div>
<!-- Footer -->
<footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">© 2020 Copyright. Digitised Logbook</div>
</footer>
</html>