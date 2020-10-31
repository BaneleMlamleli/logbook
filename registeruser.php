<?php
  include_once("dbconnection.php");
// Assigning empty string values to the variables so that the table can display blank fields
$usrType = "";
$fname = "";
$lname = "";
$dateOfBirth = "";
$usrEmail = "";
$compOfEmployment = "";
$uni = "";
$crse = "";
$qual = "";
$yrOfStudy = "";
$stdntNumber = "";

// checking if the submit button is clicked
if(isset($_POST["submit"])){
    //20201030 Created a condition to check check selected user. If it's mentor, set year of study and student number to N/A
    if ($_POST["user_type"] == "Mentor"){
        $yrOfStudy = mysqli_real_escape_string($conn, "N/A");
        $stdntNumber = mysqli_real_escape_string($conn, "N/A");
    }else{
        $yrOfStudy = mysqli_real_escape_string($conn, $_POST["yearOfStudy"]);
        $stdntNumber = mysqli_real_escape_string($conn, $_POST["studentNumber"]);
    }
    // 20201029 - Added an MD5 encryption function for the password
    $usrType = mysqli_real_escape_string($conn, $_POST["user_type"]);
    $fname = mysqli_real_escape_string($conn, $_POST["firstname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lastname"]);
    $dateOfBirth = mysqli_real_escape_string($conn, $_POST["dob"]);
    $usrEmail = mysqli_real_escape_string($conn, $_POST["email"]);
    $compOfEmployment = mysqli_real_escape_string($conn, $_POST["companyOfEmployment"]);
    $uni = mysqli_real_escape_string($conn, $_POST["university"]);
    $crse = mysqli_real_escape_string($conn, $_POST["course"]);
    $qual = mysqli_real_escape_string($conn, $_POST["qualification"]);
    $usrPassword = md5(mysqli_real_escape_string($conn, $_POST["password"]));
    $checkIdExist = 0; // This value will increment by 1 everytime there is a match/similar student number found.
    // 20201029 - Select sql statement to read all the data from the database then check if the entered ID number already exist or not  - Banele
    $sql = "SELECT `usrEmail` FROM `user` WHERE `usrEmail` = '" . $usrEmail ."'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck == 0){
        // prepared insert sql statement to insert all the data read from the form
        // 20201029 - Fixed the sql statement as it was not working because I was using the backticks signs instead of single quotes in the column names. - Banele
        $insertUserStmt = "INSERT INTO `user` (`userType`, `usrEmail`, `usrPassword`, `firstname`, `lastname`, `DOB`, `studentNumber`, `university`, `qualification`, `yearOfStudy`, `course`, `companyOfEmployment`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt, $insertUserStmt)){
            mysqli_stmt_bind_param($stmt, "ssssssssssss", $usrType, $usrEmail, $usrPassword, $fname, $lname, $dateOfBirth, $stdntNumber, $uni, $qual, $yrOfStudy, $crse, $compOfEmployment);
            mysqli_stmt_execute($stmt);
            echo "<script type=text/javascript>alert('User successfully registered!')</script>";
        }else{
            echo "<script type=text/javascript>alert('Error! User was not registered!')</script>";
        }
    }else{
        echo "<script type=text/javascript>alert('Error! User with this email already exist already exist')</script>";
    }
}
?>
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
<div class="jumbotron jumbotron-background jumbotron-fluid">
    <div class="container jumbotron-text">
        <h1 class="display-4 ">NEW USER</h1>
        <p class="lead">Register as a new user.</p>
    </div>
</div>
</body>
<div class="container">
    <!-- registration form -->
    <form  action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <div class="form-group">
            <label for="user_type">Select user type</label>
            <select class="form-control" id="user_type" name="user_type" onchange="return disableFields()">
                <option>Intern</option>
                <div class="dropdown-divider"></div>
                <option>Mentor</option>
            </select>
        </div>
        <!-- Firstname input field -->
        <div class="form-group">
            <div class="form-group">
                <label for="firstname">Firstname:</label>
                <input type="text" class="form-control" id="firstname" placeholder="Enter firstname" name="firstname">
            </div>
            <!-- Lastname input field -->
            <div class="form-group">
                <label for="Lastname">Lastname:</label>
                <input type="text" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname">
            </div>
            <!-- Date of birth input field -->
            <div class="form-group">
                <label for="dob">Date of birth:</label>
                <input type="date" class="form-control" id="dob" name="dob">
            </div>
            <!-- E-mail address input field -->
            <div class="form-group">
                <label for="email">E-mail address:</label>
                <input type="email" class="form-control" id="email" placeholder="name@domain.co.za" name="email">
            </div>
            <!-- company of employment input field -->
            <div class="form-group">
                <label for="companyOfEmployment">Company Of Employment:</label>
                <input type="text" class="form-control" id="companyOfEmployment" placeholder="company of employment" name="companyOfEmployment">
            </div>
            <!-- Universities -->
            <div class="form-group">
                <label for="user-type">Select University</label>
                <select class="form-control" id="university" name="university">
                    <option>Cape Peninsula University of Technology</option>
                    <div class="dropdown-divider"></div>
                    <option>University of Western Cape</option>
                    <div class="dropdown-divider"></div>
                    <option>University of Cape Town</option>
                    <div class="dropdown-divider"></div>
                    <option>Rhodes University</option>
                    <div class="dropdown-divider"></div>
                    <option>Durban University of Technology</option>
                    <div class="dropdown-divider"></div>
                </select>
            </div>
            <!-- Course -->
            <div class="form-group">
                <label for="course">Course</label>
                <select class="form-control" id="course" name="course">
                    <option>Information Communications Technology</option>
                    <div class="dropdown-divider"></div>
                    <option>Mechanical Engineer</option>
                    <div class="dropdown-divider"></div>
                    <option>Environmental Science</option>
                </select>
            </div>
            <!-- Qualifications -->
            <div class="form-group">
                <label for="qualification">Qualification</label>
                <select class="form-control" id="qualification" name="qualification">
                    <option>Software Developer</option>
                    <div class="dropdown-divider"></div>
                    <option>Engineer</option>
                    <div class="dropdown-divider"></div>
                    <option>Network administrator</option>
                </select>
            </div>
            <!-- Year of study -->
            <div class="form-group">
                <label for="yearOfStudy">Select year of study</label>
                <select class="form-control" id="yearOfStudy" name="yearOfStudy">
                    <option>First year</option>
                    <div class="dropdown-divider"></div>
                    <option>Second year</option>
                    <div class="dropdown-divider"></div>
                    <option>Third year</option>
                    <div class="dropdown-divider"></div>
                    <option>Fourth year</option>
                    <div class="dropdown-divider"></div>
                    <option>N/A</option>
                </select>
            </div>
            <!-- Lastname input field -->
            <div class="form-group">
                <label for="Lastname">Student number:</label>
                <input type="text" class="form-control" id="studentNumber" placeholder="student number" name="studentNumber">
            </div>
            <!-- password input field -->
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
            <!-- confirm password input field -->
            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" class="form-control" id="confirmPassword" placeholder="Enter same password to confirm" name="confirmPassword">
            </div>
            <!-- 20201029 - Added an inline button to clear the form called 'Cancel' - Banele -->
            <div class="form-group row">
                <div class="col">
                    <button onclick="return validation()" type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                </div>
                <div class="form-group col">
                    <button type="reset" class="btn btn-primary btn-lg btn-block">Clear</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Footer -->
<footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">© 2020 Copyright. Digitised Logbook</div>
</footer>
</html>
