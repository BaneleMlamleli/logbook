<?php ?>
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
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Title</p>
                    <p class="card-text">company name</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
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
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Start date</th>
                    <th scope="col">Stop date</th>
                    <th scope="col">Signed by</th>
                    <th scope="col">Date signed</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">xx - Xxxxxx - xxxx</th>
                    <td>xx - Xxxxxx - xxxx</td>
                    <td>Xxxxx Xxxxx</td>
                    <td>xx - Xxxxxx - xxxx</td>
                    <td>Locked, Unlocked, Pending, Signed, Cancelled</td>
                </tr>
                <tr>
                    <th scope="row">xx - Xxxxxx - xxxx</th>
                    <td>xx - Xxxxxx - xxxx</td>
                    <td>Xxxxx Xxxxx</td>
                    <td>xx - Xxxxxx - xxxx</td>
                    <td>Locked, Unlocked, Pending, Signed, Cancelled</td>
                </tr>
                <tr>
                    <th scope="row">xx - Xxxxxx - xxxx</th>
                    <td>xx - Xxxxxx - xxxx</td>
                    <td>Xxxxx Xxxxx</td>
                    <td>xx - Xxxxxx - xxxx</td>
                    <td>Locked, Unlocked, Pending, Signed, Cancelled</td>
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
