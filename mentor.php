<?php include_once("dbconnection.php"); ?>
<!DOCTYPE html>
<div lang="en" class="smart-style-0">
<head>
    <title>MENTOR</title>
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
                <li class="nav-item">
                    <h5 class="text-white h4">
                        <a class="nav-link" href="./logbook.php">Register Company</a>
                    </h5>
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
        <h1 class="display-4 ">MENTOR</h1>
        <p class="lead">MANAGE ALL LOGBOOKS LOGGED BY INTERNS.</p>
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
<!--Logbook management tables-->
<div class="container">
    <div class="accordion" id="accordionExample">
        <!--Approve/Decline, Enable/Disable Employee-->
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <strong>APPROVE/DECLINE, ENABLE/DISABLE EMPLOYEE</strong>
                    </button>
                </h2>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <!--Search bar and button-->
                    <div style="align: center; margin: 0 auto">
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        <p></p>
                    </div>
                    <!--Table to display employee information-->
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Firstname</th>
                            <th scope="col">Lastname</th>
                            <th scope="col">D.O.B</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Start date</th>
                            <th scope="col">Employee Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Xxxx</th>
                            <td>Xxxx</td>
                            <td>xx - Xxxx - xxxx</td>
                            <td>Xxxxx Xxxxx</td>
                            <td>xx - Xxxxxx - xxxx</td>
                            <td>
                                <select class="form-control form-control-sm">
                                    <option>Approved</option>
                                    <option>Declined</option>
                                    <option>Enabled</option>
                                    <option>Disabled</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Xxxx</th>
                            <td>Xxxx</td>
                            <td>xx - Xxxx - xxxx</td>
                            <td>Xxxxx Xxxxx</td>
                            <td>xx - Xxxxxx - xxxx</td>
                            <td>
                                <select class="form-control form-control-sm">
                                    <option>Approved</option>
                                    <option>Declined</option>
                                    <option>Enabled</option>
                                    <option>Disabled</option>
                                </select>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--Lock/Unlock, View, Sign Logbook-->
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <strong>LOCK/UNLOCK, VIEW, AND SIGN LOGBOOK</strong>
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <!--Search bar and button-->
                    <div style="align: center; margin: 0 auto">
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        <p></p>
                    </div>
                    <!--Table to display Logbook information-->
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Firstname</th>
                            <th scope="col">Lastname</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Date Submitted</th>
                            <th scope="col">Logbook Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Xxxx</th>
                            <td>Xxxx</td>
                            <td>Xxxxx Xxxxx</td>
                            <td>xx - Xxxxxx - xxxx</td>
                            <td>
                                <select class="form-control form-control-sm">
                                    <option>Locked</option>
                                    <option>Unlocked</option>
                                    <option>Signed</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Xxxx</th>
                            <td>Xxxx</td>
                            <td>Xxxxx Xxxxx</td>
                            <td>xx - Xxxxxx - xxxx</td>
                            <td>
                                <select class="form-control form-control-sm">
                                    <option>Locked</option>
                                    <option>Unlocked</option>
                                    <option>Signed</option>
                                </select>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<!-- Footer -->
<footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">© 2020 Copyright. Digitised Logbook</div>
</footer>
</div>
</html>
