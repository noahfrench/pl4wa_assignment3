<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="styles/style.css">
	<!--Authors: Mike Wood (mgw3pf) and Noah French (njf5c)-->

</head>

<body class="rated-pets">
<nav class="navbar navbar-expand-md bg-dark navbar-dark" style="background-color:#232D4B !important;">
		<a class="navbar-brand" href="./">
			<img class="top-logo" alt="Rate these Pets!" src="logo_transparent1.png">
		</a>
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
				<li class="nav-item">
					<a class="nav-link" href="http://localhost:4200">Create Account</a>
				</li>
				<button class="btn btn-secondary" style="width: 90px;">
					<a class="nav-link" href="./login.html">Log In</a>
				</button>
			</ul>
		</div>
	</nav>
    <?php 

        $xml = simplexml_load_file("./register/src/app/userData.xml");
        //if ($_SESSION['user'] == 'mike') {}
        foreach ($xml->children() as $users) {
            if ($users['name'] == $_SESSION['user']) {
                echo "<h1><strong>" . $users['name'] . "</strong></h1>" . "<br/>";
                foreach($users->children() as $stars) {
                    echo "<br/>";
                    echo "<h5><u>" . $stars['title'] . "</u></h5>" . "<br/>";
                    echo "<ul>";
                    foreach($stars->children() as $pets) {
												echo "<li>" . $pets['name'] . "</li>";
												echo "<img  class='rated-item' src= '" . $pets['file'] . "' alt= '" . $pets['name'] . "'>";
                    }
                    echo "</ul>";
                }              
            }
        }
?>
</body>

</html>