<!-- 20201028 - Created a registration form - Banele -->
<!-- 20201028 - Added an MD5 encryption function for the password. Also added a link to redirect back to the login form
once user has successfully registered - Banele -->
<!-- 20201028 - Select sql statement to read all the data from the database then check if the entered ID number already exist or not  - Banele -->

<?php
  include_once("dbconnection.php");
// Assigning empty string values to the variables so that the table can display blank fields
$compName = "";
$compNumber = "";
$compType = "";
$compEmail = "";
$yearFounded = "";
$compCEO = "";

// checking if the submit button is clicked
if(isset($_POST["submit"])){
    //assigned variables with the data from the form
    // 20201028 - Added an MD5 encryption function for the password
    $compName = mysqli_real_escape_string($conn, $_POST["companyName"]);
    $compNumber = mysqli_real_escape_string($conn, $_POST["companyNumber"]);
    $compType = mysqli_real_escape_string($conn, $_POST["companyType"]);
    $compEmail = mysqli_real_escape_string($conn, $_POST["companyEmail"]);
    $yrFounded = mysqli_real_escape_string($conn, $_POST["yearFounded"]);
    $compCEO = mysqli_real_escape_string($conn, $_POST["ceo"]);

    $checkCompanyNumberExist = 0; // This value will increment by 1 everytime there is a match/similar company number found.
    // 20201028 - Select sql statement to read all the data from the database then check if the entered ID number already exist or not  - Banele
    $sql = "SELECT * FROM `company`";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    print_r($resultCheck);
    if($resultCheck >= 1){
        while($row = mysqli_fetch_assoc($result)){
            // checking to see if entered ID number exist in the database
            if($row['reg_number'] == $compNumber){
                echo "<script type=text/javascript>alert('Sorry, the company number you have entered is already associated with a company')</script>";
                $checkCompanyNumberExist++; break;
            }
        }
        // If there is no company number match the following condition will be executed
        if($checkCompanyNumberExist == 0){
            // prepared insert sql statement to insert all the data read from the form
            // 20190619 - Fixed the sql statement as it was not working because I was using the backticks signs instead of single quotes in the column names. - Banele
            $insertCompanyDetailsStmt = "INSERT INTO `company` (`reg_number`, `name`, `type`, `email`, `yearFounded`, `CEO`) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if(mysqli_stmt_prepare($stmt, $insertCompanyDetailsStmt)){
                mysqli_stmt_bind_param($stmt, "ssssis", $compNumber, $compName, $compType, $compEmail, $yearFounded, $compCEO);
                mysqli_stmt_execute($stmt);
                echo "<script type=text/javascript>alert('Company details successfully inserted')</script>";
            }else{
                echo "<script type=text/javascript>alert('Error! Company details were not inserted')</script>";
            }
        }
    }else{
        // prepared insert sql statement to insert all the data read from the form
        // 20201028 - Fixed the sql statement as it was not working because I was using the backticks signs instead of single quotes in the column names. - Banele
        $insertCompanyDetailsStmt = "INSERT INTO `company` (`reg_number`, `name`, `type`, `email`, `yearFounded`, `CEO`) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt, $insertCompanyDetailsStmt)){
            mysqli_stmt_bind_param($stmt, "ssssis", $compNumber, $compName, $compType, $compEmail, $yearFounded, $compCEO);
            mysqli_stmt_execute($stmt);
            echo "<script type=text/javascript>alert('Company details successfully inserted')</script>";
        }else{
            echo "<script type=text/javascript>alert('Error! Company details were not inserted')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="smart-style-0">
<head>
    <title>COMPANY</title>
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
        <h1 class="display-4 ">REGISTER COMPANY</h1>
        <p class="lead">Register your company so that it can be verified.</p>
    </div>
</div>
<div class="container">
<!-- form -->
    <form  action="<?php $_PHP_SELF ?>" method="post">
    <!-- Firstname input field -->
    <div class="form-group">
        <!-- company name input field -->
        <div class="form-group">
            <label for="companyName">Registered Company name:</label>
            <input type="text" class="form-control" id="companyName" name="companyName">
        </div>
        <!-- company registration number input field -->
        <div class="form-group">
            <label for="companyNumber">Company registration number:</label>
            <input type="text" class="form-control" id="companyNumber" name="companyNumber">
        </div>
        <!-- type of company input field -->
        <div class="form-group">
            <label for="companyType">Type of company:</label>
            <input type="text" class="form-control" id="companyType" name="companyType">
        </div>
        <!-- Company E-mail address input field -->
        <div class="form-group">
            <label for="companyEmail">Company E-mail address:</label>
            <input type="companyEmail" class="form-control" id="companyEmail" placeholder="name@domain.co.za" name="companyEmail">
        </div>
        <!-- Year founded input field -->
        <div class="form-group">
            <label for="yearFounded">Year company founded:</label>
            <input type="number" class="form-control" id="yearFounded" name="yearFounded">
        </div>
        <!-- CEO input field -->
        <div class="form-group">
            <label for="email">Chief Executive Officer (CEO):</label>
            <input type="text" class="form-control" id="ceo" name="ceo">
        </div>
        <!-- 20201028 - Added an inline button to clear the form called 'Cancel' - Banele -->
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
</body>
<!-- Footer -->
<footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">© 2020 Copyright. Digitised Logbook</div>
</footer>
</html>
