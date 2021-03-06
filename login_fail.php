<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <style>
    .error-message
         {
            padding-top: 15px;
        }
    </style>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark" style="background-color:#232D4B !important;">
        <a class="navbar-brand" href="./">
            <img alt="Rate these Pets!" class="top-logo" src="logo_transparent1.png">
        </a>
        <a class="navbar-brand" href="./">Rate These Pets!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./PetsRated.php">Pets I've Rated</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Animal</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">Dogs</a>
                        <a class="dropdown-item" href="#">Cats</a>
                        <a class="dropdown-item" href="#">Lizards</a>
                        <a class="dropdown-item" href="#">Rabbits</a>
                        <a class="dropdown-item" href="#">Birds</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <button class="btn btn-secondary" style="width: 90px;">
                    <a class="nav-link" href="./login.html">Log In</a>
                </button>
            </ul>
        </div>
    </nav>
</body>

<div class="container error-message">
<?php
    if ($_GET['error'] == 'username') {
        echo "Username does not exist.";
    } else if ($_GET['error'] == 'password') {
        echo "Incorrect password.";
    } else if ($_GET['error'] == 'noName') {
        echo "Please enter a username.";
    } else if ($_GET['error'] == 'noPw') {
        echo "Please enter a password.";
    }
?>
<br/>
<a class="btn btn-light" href="login.html" style="margin-top: 10px;">Back</a>
</div>

</html>