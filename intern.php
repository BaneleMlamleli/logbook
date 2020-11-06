<?php include_once("dbconnection.php"); ?>
<!DOCTYPE html>
<html lang="en" class="smart-style-0">
<head>
    <title>INTERN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript" src=".\form_validation.js"></script>
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
        <h1 class="display-4 ">INTERN</h1>
        <p class="lead">View and download logbook.</p>
    </div>
</div>
<!--User profile information-->
<div class="container">
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="./assets/image1.png" class="card-img" alt="image placeholder" style="height: 12em; width: 15em">
            </div>
            <?php
                session_start();
                $usrEmail = $_SESSION["Email"];
                $usrType = $_SESSION["userType"];
                $firstname = $_SESSION["Name"];
                $lastname = $_SESSION["Surname"];

                $sql = "SELECT * FROM `logbook`
                        WHERE `email`= '{$usrEmail}' AND `firstname` = '{$firstname}' AND `lastname` = '{$lastname}'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<div class=\"col-md-8\">
                                <div class=\"card-body\">
                                    <h5 class=\"card-title\">".$row['firstname']." ".$row['lastname']."</h5>
                                    <p class=\"card-text\">Position: ".$usrType."</p>
                                    <p class=\"card-text\">Company: ".ucwords(explode('@', explode('.', $usrEmail)[0])[1])."</p>
                                    <p class=\"card-text\"><small class=\"text-muted\">Last updated 3 mins ago</small></p>
                                </div>
                            </div>";
                    }
                }else{
                    echo "<script type=text/javascript>alert('Error! No data to read from Database.')</script>";
                }
            ?>
        </div>
    </div>
</div>
<!--Intern logbook information-->
<div class="container">
    <div class="card">
        <div class="card-header">
            <b>INTERN LOGBOOK INFORMATION PAGE</b>
        </div>
        <div class="card-body ">
            <button type="button" class="btn btn-primary btn-lg btn-block">Download logbook</button>
            <p></p>
            <table id="internLogbooks" name="internLogbooks" class="table table-striped container container-fluid">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Start date</th>
                    <th scope="col">Stop date</th>
                    <th scope="col">Intern signed date</th>
                    <th scope="col">Mentor signed date</th>
                    <th scope="col">Signed by (Mentor)</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tr>
                    <!-- 20201106 - Selecting all data from the database and display it on the table - Banele -->
                    <?php
                        $usrEmail = $_SESSION["Email"];
                        $usrType = $_SESSION["userType"];
                        $firstname = $_SESSION["Name"];
                        $lastname = $_SESSION["Surname"];
                        $randomMentors = array("James Cutter", "Looney Tunes", "Siphosethu Mhlanga", "Cipher Breaker", "Tania Mlamleli", "Caroline Mokhoathi", "Michael Booty", "Last Born");

                        $logbookSql = "SELECT * FROM `logbook`
                        WHERE `email`= '{$usrEmail}' AND `firstname` = '{$firstname}' AND `lastname` = '{$lastname}'";
                        $logbookResult = mysqli_query($conn, $logbookSql);
                        $logbookResultCheck = mysqli_num_rows($logbookResult);
                        if($logbookResultCheck > 0){
                            while($row = mysqli_fetch_assoc($logbookResult)){
                                echo "<tr><th scope=\"row\">".$row['start_date']."</th>".
                                    "<td>".$row['stop_date']."</td>".
                                    "<td>".$row['intern_signed_date']."</td>".
                                    "<td>".$row['mentor_signed_date']."</td>".
                                    "<td>".$randomMentors[rand(0,7)]."</td>".
                                    "<td>".$row['status']."</td>".
                                    "</tr>";
                            }
                        }else{
                            echo "<script type=text/javascript>alert('Error! No data to read from Database.')</script>";
                        }
                    ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
<!-- Footer -->
<footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">© 2020 Copyright. Digitised Logbook</div>
</footer>
</html>
