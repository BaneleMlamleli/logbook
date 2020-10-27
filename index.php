<?php
$name = "";
$surname = "";
$email = "";
$comment = "";
// checking if the submit button is clicked
if(isset($_POST["submit"])){
    include_once("sendEmail.php");
}
?>

<!DOCTYPE html>
<html lang="en" class="smart-style-0">
<head>
    <title>Logbook</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
<header>

</header>
<!-- Error alert message div-->
<div id="alert_message"></div>
<!-- Listen for the menu-toggle bar event then display or hide the responsive navigation bar -->
<script>
    $(document).ready(function () {
        $('.menu-toggle').click(function () {
            $('nav').toggle('active')
        })
    })
</script>
<!-- Back to top button -->
<button onclick="topFunction()" class="fa fa-arrow-up" id="btnGoToTop" title="Go to top"></button>
<!-- Section for all the information about you -->
<!-- This is the Jumbotron below the navigation bar -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div style="text-align: center; padding-top: 10%;">
            <h1 class="display-5" data-text="Hi, I'm Banele Mlamleli">Hi, I'm Banele</h1>
            <p class="p1">I am an avid programmer who simply loves spending hours tinkering with the code.</p>
            <p class="p2">I am currently based in the Mother City - Cape Town.</p>
        </div>
    </div>
</div>


<!-- Section for your contact details. -->
<section id="contacts">
    <h3 class="section-header-text card-subtitle mb-2 text-muted">Send me a direct message</h3>
    <div class="main-contacts-div">
        <div class="form-div">
            <form action="sendEmail.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Your E-mail Address</label>
                    <input type="text" class="form-control" id="email" name="email" >
                </div>
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                </div>
                <button type="submit" name="submit" onclick="return formValidation()" class="btn btn-primary btn-lg btn-block" style="font-size:24px;"><i class="fa fa-mail-bulk"></i>&nbspSend</button>
            </form>
        </div>
        <div class="contacts-div">
            <h5 class="card-title">Banele Mlamleli</h5>
            <h6 class="card-subtitle mb-2 text-muted">Junior Software Developer</h6>
            <div>
                <i class="fa fa-phone"></i>
                (+27) (0)78 856 3244</br>
                <i class="fa fa-envelope"></i>
                mlamlelibanele@yahoo.com
            </div>
        </div>
    </div>
</section>
</html>