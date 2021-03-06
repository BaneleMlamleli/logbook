<!-- 20201027 - Created a index.php for users to login - Banele -->
<!-- 20201027 - Created an SQL statement that will read all the database field then verify the entered user details against the read data.
If the login entered details are correct the variable 'correctDetails' will be true then immediately break out of the while condition.
Redirect to userForm.php page once the user login detail have been correctly verified else it will display an error message -->
<!-- 20201027 -  - Added an MD5 encryption function for the password - Banele -->

<?php
include_once("dbconnection.php");
// checking if the submit button is clicked
if(isset($_POST["submit"])){
    //20201027 - getting values passed from the login form and sanitise the data to prevent injection
    //20201027 - Added an MD5 encryption function for the password
    $usrEmail = mysqli_real_escape_string($conn, stripcslashes($_POST["email"]));
//    $usrPassword = md5(mysqli_real_escape_string($conn, stripcslashes($_POST["password"])));
    echo $_POST["password"];
    $usrPassword = md5(mysqli_real_escape_string($conn, $_POST["password"]));
    var_dump($usrPassword);
    $sql = "SELECT * FROM `user` 
            WHERE `usrEmail`= '{$usrEmail}' AND `usrPassword` = '{$usrPassword}'";
    $result = mysqli_query($conn, $sql);
    echo "\n============================\n";
    var_dump($result);
    echo "\n============================\n";
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 1){
        session_start();
        while($row = mysqli_fetch_assoc($result)){
            // checking to see if entered ID number exist in the database
            if(($row['usrEmail'] == $usrEmail) && ($row['usrPassword'] == $usrPassword)){
                $_SESSION["Email"] = $usrEmail;
                $_SESSION["userType"] = $_POST["userType"];
                $_SESSION["Name"] = $row['firstname'];
                $_SESSION["Surname"] = $row['lastname'];
                break;
            }
        }
        echo ($_POST["user_type"] == "Mentor")? header("Location: mentor.php") : header("Location: logbook.php");
    }else{
        echo "<script type=text/javascript>alert('Incorrect login details')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" class="smart-style-0">
<head>
    <title>Login</title>
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
        <h1 class="display-4 ">DIGITISED LOGBOOK</h1>
        <p class="lead">Easy to access, secured and decentralised.</p>
    </div>
</div>
<div class="container">
    <!-- form -->
    <form  action="<?php $_PHP_SELF ?>" method="post">
        <div class="form-group">
            <label for="lblUserType">Select user type</label>
            <select class="form-control" id="userType">
                <option>Intern</option>
                <option>Mentor</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email address">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-group row">
            <div class="col">
                <button onclick="return loginValidation()" type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
            </div>
            <div class="form-group col">
                <button type="reset" class="btn btn-primary btn-lg btn-block">Clear</button>
            </div>
        </div>
        <a href="./registeruser.php"><p style="text-align: center;">Register as a new user</p></a>
    </form>
</div>
</body>
<!-- Footer -->
<footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">© 2020 Copyright. Digitised Logbook</div>
</footer>
</html>