<?php ?>
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
