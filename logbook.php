<?php
    include_once("dbconnection.php");

    $startDate = "";
    $stopDate = "";
    $monday = "";
    $tuesday = "";
    $wednesday = "";
    $thursday = "";
    $friday = "";
    $mentorComments = "";
    $internComments = "";
    $appraisalPortrayal = "";
    $appraisalQuality = "";
    $appraisalDelivery = "";
    $appraisalDemonstration = "";
    $appraisalMotivation = "";
    $appraisalCommunication = "";

    if(isset($_POST["submit"])){
        $startDate = mysqli_real_escape_string($conn, date("Y-m-d"));
        $stopDate = mysqli_real_escape_string($conn, date("Y-m-d"));
        $internSignedDate = mysqli_real_escape_string($conn, date("Y-m-d"));
        $monday = mysqli_real_escape_string($conn, $_POST[""]);
        $tuesday = mysqli_real_escape_string($conn, $_POST[""]);
        $wednesday = mysqli_real_escape_string($conn, $_POST[""]);
        $thursday = mysqli_real_escape_string($conn, $_POST[""]);
        $friday = mysqli_real_escape_string($conn, $_POST[""]);
        $mentorComments = mysqli_real_escape_string($conn, $_POST[""]);
        $internComments = mysqli_real_escape_string($conn, $_POST[""]);
        $appraisalPortrayal = mysqli_real_escape_string($conn, $_POST[""]);
        $appraisalQuality = mysqli_real_escape_string($conn, $_POST[""]);
        $appraisalDelivery = mysqli_real_escape_string($conn, $_POST[""]);
        $appraisalDemonstration = mysqli_real_escape_string($conn, $_POST[""]);
        $appraisalMotivation = mysqli_real_escape_string($conn, $_POST[""]);
        $appraisalCommunication = mysqli_real_escape_string($conn, $_POST[""]);

        $usrEmail = $_SESSION["Email"];
        $usrType = $_SESSION["userType"];
        $firstname = $_SESSION["Name"];
        $lastname = $_SESSION["Surname"];

        $logbookSql = "SELECT * FROM `logbook`
                WHERE `email`= '{$usrEmail}' AND `firstname` = '{$firstname}' AND `lastname` = '{$lastname}'";
        $result = mysqli_query($conn, $logbookSql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck == 1){
            // UPDATE the table if there is date already
            $updateUserStmt = "UPDATE `logbook` SET `start_date`=?, `stop_date`=?, `monday`=?, `tuesday`=?, `wednesday`=?,
                                `thursday`=?, `friday`=?, `mentor_comments`=?, `intern_comments`=?, `intern_signed_date`=?,
                                WHERE `firstname`='{$firstname}' AND `lastname`='{$lastname}' AND `email`='{$usrEmail}'";
            $stmt = mysqli_stmt_init($conn);
            if(mysqli_stmt_prepare($stmt, $updateUserStmt)){
                mysqli_stmt_bind_param($stmt, "sssssssssssss",$startDate, $stopDate, $monday, $tuesday, $wednesday, $thursday, $friday,
                $mentorComments, $internComments, $internSignedDate);
                mysqli_stmt_execute($stmt);
                echo "<script type=text/javascript>alert('User details successfully updated')</script>";
            }else{
                echo "<script type=text/javascript>alert('Error! User details were not update')</script>";
            }
        }else{
            // INSERT new record if there is no data recorded already
            $insertUserStmt = "INSERT INTO `logbook` (`firstname`, `lastname`, `email`, `portrayal_of_skills_and_knowledge`,
                                `quality_of_work_and_attention_to_detail`, `delivering_according_to_specification`,
                                `demonstration_of_responsibility`, `motivation_for_tasks`, `communication`)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if(mysqli_stmt_prepare($stmt, $insertUserStmt)){
                mysqli_stmt_bind_param($stmt, "sssssssssss", $firstname, $lastname, $usrEmail, $appraisalPortrayal,
                $appraisalQuality, $appraisalDelivery, $appraisalDemonstration, $appraisalMotivation, $appraisalCommunication);
                mysqli_stmt_execute($stmt);
                echo "<script type=text/javascript>alert('User details successfully inserted')</script>";
            }else{
                echo "<script type=text/javascript>alert('Error! User details were not inserted')</script>";
            }
        }

        $performanceSql = "SELECT * FROM `performance`
                WHERE `email`= '{$usrEmail}' AND `firstname` = '{$firstname}' AND `lastname` = '{$lastname}'";
        $result = mysqli_query($conn, $logbookSql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck == 1){
        }
    }
?>
<!DOCTYPE html>
<html lang="en" class="smart-style-0">
<head>
    <title>LOGBOOK</title>
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
        <h1 class="display-4 ">LOGBOOK</h1>
        <p class="lead">Fill your logbook activities.</p>
    </div>
</div>
<div class="container">
    <form action="<?php $_PHP_SELF ?>" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="startDate">Start Date</label>
                <input type="date" class="form-control" id="startDate">
            </div>
            <div class="form-group col-md-6">
                <label for="stopDate">Stop Date</label>
                <input type="date" class="form-control" id="stopDate">
            </div>
        </div>
        <div class="form-group">
            <label for="monday">Monday</label>
            <textarea class="form-control" id="monday" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="tuesday">Tuesday</label>
            <textarea class="form-control" id="tuesday" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="wednesday">Wednesday</label>
            <textarea class="form-control" id="wednesday" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="thursday">Thursday</label>
            <textarea class="form-control" id="thursday" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="friday">Friday</label>
            <textarea class="form-control" id="friday" rows="3"></textarea>
        </div>
        <hr>
        <hr>
        <div class="form-group">
            <label for="mentorComments">Comments from Mentor</label>
            <textarea class="form-control border-primary" id="mentorComments" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="internComments">Comments from Intern</label>
            <textarea class="form-control border-primary" id="internComments" rows="3"></textarea>
        </div>
        <h4>Performance Appraisal (1 - 5)</h4>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Performance Skill</th>
                <th scope="col">Rated score</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Portrayal of skills and knowledge</td>
                <td>
                    <select class="form-control form-control-sm">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Quality of work and attention to detail</td>
                <td>
                    <select class="form-control form-control-sm">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Delivering according to specification</td>
                <td>
                    <select class="form-control form-control-sm">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Demonstration of responsibility</td>
                <td>
                    <select class="form-control form-control-sm">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Motivation for tasks</td>
                <td>
                    <select class="form-control form-control-sm">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Communication</td>
                <td>
                    <select class="form-control form-control-sm">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="form-group row">
            <div class="col">
                <button onclick="return registerUserValidation()" type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Save changes</button>
            </div>
            <div class="col">
                <button onclick="return registerUserValidation()" type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Submit logbook for signing</button>
            </div>
        </div>
    </form>
</div>
</body>
<!-- Footer -->
<footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">© 2020 Copyright. Digitised Logbook</div>
</footer>
</html>
