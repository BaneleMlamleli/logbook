<?php
    include_once("dbconnection.php");

    $mon = "";
    $tue = "";
    $wed = "";
    $thu = "";
    $fri = "";
    $mentorComments = "";
    $internComments = "";
    $internSignedDate = "";
    $appraisalPortrayal = "";
    $appraisalQuality = "";
    $appraisalDelivery = "";
    $appraisalDemonstration = "";
    $appraisalMotivation = "";
    $appraisalCommunication = "";
    $status = "";
    $usrEmail = "";
    $usrType = "";
    $firstname = "";
    $lastname = "";

    if(isset($_GET["save_changes"])){
        $mon = mysqli_real_escape_string($conn, $_GET["monday"]);
        $tue = mysqli_real_escape_string($conn, $_GET["tuesday"]);
        $wed = mysqli_real_escape_string($conn, $_GET["wednesday"]);
        $thu = mysqli_real_escape_string($conn, $_GET["thursday"]);
        $fri = mysqli_real_escape_string($conn, $_GET["friday"]);
        $mentorComments = mysqli_real_escape_string($conn, $_GET["mentorComments"]);
        $internComments = mysqli_real_escape_string($conn, $_GET["internComments"]);
        $internSignedDate = mysqli_real_escape_string($conn, date("Y-m-d"));
        $appraisalPortrayal = mysqli_real_escape_string($conn, $_GET["appraisalPortrayal"]);
        $appraisalQuality = mysqli_real_escape_string($conn, $_GET["appraisalQuality"]);
        $appraisalDelivery = mysqli_real_escape_string($conn, $_GET["appraisalDelivery"]);
        $appraisalDemonstration = mysqli_real_escape_string($conn, $_GET["appraisalDemonstration"]);
        $appraisalMotivation = mysqli_real_escape_string($conn, $_GET["appraisalMotivation"]);
        $appraisalCommunication = mysqli_real_escape_string($conn, $_GET["appraisalCommunication"]);
        $status = "unlocked"; //locked/unlocked
        $usrEmail = $_SESSION["Email"];
        $usrType = $_SESSION["userType"];
        $firstname = $_SESSION["Name"];
        $lastname = $_SESSION["Surname"];

        // UPDATE the table if there is date already
        $updateLogbookStmt = "UPDATE `logbook` SET `monday`=?, `tuesday`=?, `wednesday`=?, `thursday`=?, `friday`=?,
                                `mentor_comments`=?, `intern_comments`=?, `intern_signed_date`=?, `status`=?,
                                `portrayal_of_skills_and_knowledge`=?, `quality_of_work_and_attention_to_detail`=?,
                                `delivering_according_to_specification`=?, `demonstration_of_responsibility`=?, `motivation_for_tasks`=?,`communication`=?
                                WHERE `firstname`='{$firstname}' AND `lastname`='{$lastname}' AND `email`='{$usrEmail}' AND `status`='{$status}'";
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt, $updateLogbookStmt)){
            mysqli_stmt_bind_param($stmt, "sssssssssiiiiii",$mon, $tue, $wed, $thu, $fri,
                $mentorComments, $internComments, $internSignedDate, $status, $appraisalPortrayal, $appraisalQuality,
                $appraisalDelivery, $appraisalDemonstration, $appraisalMotivation, $appraisalCommunication);
            mysqli_stmt_execute($stmt);
            echo "<script type=text/javascript>alert('Logbook entries successfully updated')</script>";
        }else{
            echo "<script type=text/javascript>alert('Error! Logbook entries were not update')</script>";
        }
    }

    if(isset($_GET["submit_for_signing"])){
        $mon = mysqli_real_escape_string($conn, $_GET["monday"]);
        $tue = mysqli_real_escape_string($conn, $_GET["tuesday"]);
        $wed = mysqli_real_escape_string($conn, $_GET["wednesday"]);
        $thu = mysqli_real_escape_string($conn, $_GET["thursday"]);
        $fri = mysqli_real_escape_string($conn, $_GET["friday"]);
        $mentorComments = mysqli_real_escape_string($conn, $_GET["mentorComments"]);
        $internComments = mysqli_real_escape_string($conn, $_GET["internComments"]);
        $internSignedDate = mysqli_real_escape_string($conn, date("Y-m-d"));
        $appraisalPortrayal = mysqli_real_escape_string($conn, $_GET["appraisalPortrayal"]);
        $appraisalQuality = mysqli_real_escape_string($conn, $_GET["appraisalQuality"]);
        $appraisalDelivery = mysqli_real_escape_string($conn, $_GET["appraisalDelivery"]);
        $appraisalDemonstration = mysqli_real_escape_string($conn, $_GET["appraisalDemonstration"]);
        $appraisalMotivation = mysqli_real_escape_string($conn, $_GET["appraisalMotivation"]);
        $appraisalCommunication = mysqli_real_escape_string($conn, $_GET["appraisalCommunication"]);
        $status = "locked"; //locked/unlocked
        $usrEmail = $_SESSION["Email"];
        $usrType = $_SESSION["userType"];
        $firstname = $_SESSION["Name"];
        $lastname = $_SESSION["Surname"];


        $updateLogbkStmt = "UPDATE `logbook` SET `firstname`=?, `lastname`=?, `email`=?, `monday`=?, `tuesday`=?, `wednesday`=?, `thursday`=?, `friday`=?, `mentor_comments`=?,
                                    `intern_comments`=?, `intern_signed_date`=?, `status`=?,
                                    `portrayal_of_skills_and_knowledge`=?, `quality_of_work_and_attention_to_detail`=?,
                                    `delivering_according_to_specification`=?, `demonstration_of_responsibility`=?, `motivation_for_tasks`=?, `communication`=?
                                WHERE `firstname`='{$firstname}' AND `lastname`='{$lastname}' AND `email`='{$usrEmail}' AND `status`='unlocked'";
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt, $updateLogbkStmt)){
            mysqli_stmt_bind_param($stmt, "ssssssssssssiiiiii",$firstname, $lastname,
                $usrEmail, $mon, $tue, $wed, $thu, $fri, $mentorComments, $internComments, $internSignedDate,
                $status, $appraisalPortrayal, $appraisalQuality, $appraisalDelivery, $appraisalDemonstration, $appraisalMotivation, $appraisalCommunication);
            mysqli_stmt_execute($stmt);
            echo "<script type=text/javascript>alert('Logbook entries successfully updated')</script>";
        }else{
            echo "<script type=text/javascript>alert('Error! Logbook entries were not update')</script>";
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
        <h1 class="display-4 ">LOGBOOK</h1>
        <p class="lead">Fill your logbook activities.</p>
    </div>
</div>
<div class="container">
    <form action="<?php $_PHP_SELF ?>" method="GET">
        <?php
            session_start();
            $usrEmail = $_SESSION["Email"];
            $usrType = $_SESSION["userType"];
            $firstname = $_SESSION["Name"];
            $lastname = $_SESSION["Surname"];

            $dt =  mysqli_real_escape_string($conn, date("Y-m-d"));
            $startDt = date("Y-m-d");
            $stopDt = date('Y-m-d', strtotime(date("Y-m-d"). ' + 5 days'));
            $empty = "empty";
            $defValue = 0;
            $status = "unlocked"; //locked/unlocked

            //=======================================================================================
            //INSERTING INTO logbook table
            $logbookSql = "SELECT * FROM `logbook`
                    WHERE `email`= '{$usrEmail}' AND `firstname` = '{$firstname}' AND `lastname` = '{$lastname}' AND `status` = '{$status}'";
            $result = mysqli_query($conn, $logbookSql);
            $resultCheck = mysqli_num_rows($result);
            //if the database is empty then we insert the data
            if(!($resultCheck == 1)){
                // INSERT new record if there is no data recorded already
                $insertUserStmt = "INSERT INTO `logbook` (`firstname`, `lastname`, `email`, `start_date`, `stop_date`, `monday`,
                                    `tuesday`, `wednesday`, `thursday`, `friday`, `mentor_comments`, `intern_comments`,
                                    `intern_signed_date`, `mentor_signed_date`, `status`, `portrayal_of_skills_and_knowledge`,
                                    `quality_of_work_and_attention_to_detail`, `delivering_according_to_specification`,
                                    `demonstration_of_responsibility`, `motivation_for_tasks`, `communication`)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(mysqli_stmt_prepare($stmt, $insertUserStmt)){
                    mysqli_stmt_bind_param($stmt, "sssssssssssssssiiiiii",$firstname, $lastname,
                        $usrEmail, $startDt, $stopDt, $empty, $empty, $empty, $empty, $empty, $empty, $empty, $dt,
                        $dt, $status, $defValue, $defValue, $defValue, $defValue, $defValue, $defValue);
                    mysqli_stmt_execute($stmt);
                    //echo "<script type=text/javascript>alert('Initial logbook successfully inserted')</script>";
                }else{
                    echo "<script type=text/javascript>alert('Error! Initial logbook entries are not inserted')</script>";
                }
            }
            //=======================================================================================

            $logbookSql = "SELECT * FROM `logbook`
                    WHERE `email`= '{$usrEmail}' AND `firstname` = '{$firstname}' AND `lastname` = '{$lastname}' AND `status` = '{$status}'";
            $logbookResult = mysqli_query($conn, $logbookSql);
            $logbookResultCheck = mysqli_num_rows($logbookResult);

            if($logbookResultCheck > 0){
                while($row = mysqli_fetch_assoc($logbookResult)){
                    echo " <div class=\"form-row\">
                                <div class=\"form-group col-md-6\">
                                    <label for=\"startDate\">Start Date</label>
                                    <input type=\"date\" class=\"form-control\" id=\"startDate\" disabled value=".$row['start_date'].">
                                </div>
                                <div class=\"form-group col-md-6\">
                                    <label for=\"stopDate\">Stop Date</label>
                                    <input type=\"date\" class=\"form-control\" id=\"stopDate\" disabled value=".$row['stop_date'].">
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"monday\">Monday</label>
                                <textarea class=\"form-control\" id=\"monday\" rows=\"3\">".$row['monday']."</textarea>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"tuesday\">Tuesday</label>
                                <textarea class=\"form-control\" id=\"tuesday\" rows=\"3\">".$row['tuesday']."</textarea>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"wednesday\">Wednesday</label>
                                <textarea class=\"form-control\" id=\"wednesday\" rows=\"3\">".$row['wednesday']."</textarea>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"thursday\">Thursday</label>
                                <textarea class=\"form-control\" id=\"thursday\" rows=\"3\">".$row['thursday']."</textarea>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"friday\">Friday</label>
                                <textarea class=\"form-control\" id=\"friday\" rows=\"3\">".$row['friday']."</textarea>
                            </div>
                            <hr>
                            <hr>
                            <div class=\"form-group\">
                                <label for=\"mentorComments\">Comments from Mentor</label>
                                <textarea class=\"form-control border-primary\" id=\"mentorComments\" rows=\"3\">".$row['mentor_comments']."</textarea>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"internComments\">Comments from Intern</label>
                                <textarea class=\"form-control border-primary\" id=\"internComments\" rows=\"3\">".$row['intern_comments']."</textarea>
                            </div>";
                }
            }
        ?>
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
                    <select class="form-control form-control-sm" id="appraisalPortrayal">
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
                    <select class="form-control form-control-sm" id="appraisalQuality">
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
                    <select class="form-control form-control-sm" id="appraisalDelivery">
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
                    <select class="form-control form-control-sm" id="appraisalDemonstration">
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
                    <select class="form-control form-control-sm" id="appraisalMotivation">
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
                    <select class="form-control form-control-sm" id="appraisalCommunication">
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
                <button type="submit" name="save_changes" class="btn btn-primary btn-lg btn-block">Save changes</button>
            </div>
            <div class="col">
                <button type="submit" name="submit_for_signing" class="btn btn-primary btn-lg btn-block">Submit logbook for signing</button>
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
