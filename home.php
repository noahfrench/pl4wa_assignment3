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
<script>
	if (getCookie("petNum") == "") {
		document.cookie = "petNum=0";
	}
	var pets = [];
	var pet1 = {
		file: "pet1.jpg",
		name: "Rufus"
	};
	var pet2 = {
		file: "pet2.jpg",
		name: "Eduardo"
	};
	var pet3 = {
		file: "pet3.jpg",
		name: "Angelica"
	};
	var pet4 = {
		file: "pet4.jpg",
		name: "Salad"
	};
	var pet5 = {
		file: "pet5.jpg",
		name: "Mittens"
	};
	var pet6 = {
		file: "pet6.jpg",
		name: "Nancy"
	};
	var pet7 = {
		file: "pet7.jpg",
		name: "Alejandro"
	};
	var pet8 = {
		file: "pet8.jpg",
		name: "Upsorn"
	};
	var pet9 = {
		file: "pet9.jpg",
		name: "Biscuits"
	};
	var pet10 = {
		file: "pet10.jpg",
		name: "Guillermo"
	}

	pets.push(pet2);
	pets.push(pet3);
	pets.push(pet4);
	pets.push(pet5);
	pets.push(pet6);
	pets.push(pet7);
	pets.push(pet8);
	pets.push(pet9);
	pets.push(pet10);
	pets.push(pet1);

	function getCookie(cname) {
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for(var i = 0; i <ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
			c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
			}
		}
		return "";
	}

	function skipPet() {
		changeImage();
		document.getElementById("stars").reset();
	}

	function submitRating() {
		document.getElementById('ratedPetName').value = pets[getCookie('petNum')].name;
		document.getElementById('ratedPetFile').value = pets[getCookie('petNum')].file;
		changeImage();
	}

	function changeImage() {
		var nextNum = parseInt(getCookie("petNum")) + 1;
		if (nextNum >= pets.length) {
			nextNum = 0;
		}

		document.cookie = "petNum=" + nextNum;

		console.log(nextNum);
		document.getElementById("animal-image").src = pets[nextNum].file;
		document.getElementById("pet-name").innerHTML = getName(pets[nextNum]);
	}

	// Arrow function
	var getName = pet => pet.name;
</script>

<body>
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

	<div class="container text-center">

		<img class="animal-pic" alt="slideshow" src="pet1.jpg" id="animal-image" />

		<span>
			<?php
			if (isset($_SESSION['user']))
				echo "Hello, " . $_SESSION['user'] . "!";
			?>
		</span>

		<div id="pet-name">
			<script>
				document.write(getName(pet1));
			</script>
		</div>

		<div class="d-flex justify-content-center" style="padding-top: 10px;">
			<form id="stars" method="POST" action="submitRating.php">
				<span class="rating">
					<input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5"
						title="Awesome - 5 stars"></label>
					<input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half"
						title="Pretty good - 4.5 stars"></label>
					<input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4"
						title="Pretty good - 4 stars"></label>
					<input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half"
						title="Meh - 3.5 stars"></label>
					<input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3"
						title="Meh - 3 stars"></label>
					<input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half"
						title=" bad - 2.5 stars"></label>
					<input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2"
						title="Kinda bad - 2 stars"></label>
					<input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half"
						title="Kinda bad - 1.5 stars"></label>
					<input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1"
						title="Sucks big time - 1 star"></label>
					<input type="radio" id="starhalf" name="rating" value=".5" /><label class="half" for="starhalf"
						title="Sucks big time - 0.5 stars"></label>
				</span>
				<span>
					<button type="submit" class="btn btn-primary" style="height: 100%; margin-left: 10px;"
						onclick="submitRating();">submit
						rating!</button>
				</span>
				<input type="hidden" id="ratedPetName" name="petName" value="" />
				<input type="hidden" id="ratedPetFile" name="petFile" value="" />
			</form>
		</div>

		<div class="skip-pet" onclick="skipPet();">
			skip this pet :/
		</div>

		<div style="position: absolute; bottom: 0;">
			<?php
			if(isset($_COOKIE['timeStarted'])) {
				$totalTime = time() - $_COOKIE['timeStarted'];
				echo "Total time spent rating pets: " . $totalTime . " seconds";
			}
			?>
		</div>
		<p>   </p>
		<div id="ajax-test" style="position: relative; top: 1;">
			<form>
				Select an author:
				<select name="authors" onchange="showAuthor(this.value)">
					<option value="">Select an author:</option>
					<option value="Mike Wood">Mike Wood</option>
					<option value="Noah French">Noah French</option>
				</select>
			</form>
			<div id="txtHint"><b>Author info will be listed here...</b></div>
		</div>
		<p>   </p>
		<p>   </p>
	</div>

	<script>
		document.getElementById("animal-image").src = pets[getCookie('petNum')].file;
		document.getElementById("pet-name").innerHTML = getName(pets[getCookie('petNum')]);

		// Event listener and anonymous function
		document.getElementById("animal-image").addEventListener("click", function () {
			if (document.getElementById("animal-image").classList.contains("loading")) {
				document.getElementById("animal-image").classList.remove("loading");
			} else {
				document.getElementById("animal-image").classList.add("loading");
			}
		});
	</script>
	<script>
		function showAuthor(str) {
  		if (str=="") {
    		document.getElementById("txtHint").innerHTML="";
    		return;
  		} 
  		if (window.XMLHttpRequest) {
    		// code for IE7+, Firefox, Chrome, Opera, Safari
    		xmlhttp=new XMLHttpRequest();
  		} else {  // code for IE6, IE5
    		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
  		xmlhttp.onreadystatechange=function() {
    		if (this.readyState==4 && this.status==200) {
      			document.getElementById("txtHint").innerHTML=this.responseText;
    		}
  		}
  		xmlhttp.open("GET","authorInfo.php?q="+str,true);
  		xmlhttp.send();
}

	</script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>

</html>