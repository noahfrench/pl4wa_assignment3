<?php
session_start();

$user = $_SESSION['user'];
$rating = $_POST['rating'];
$petName = $_POST['petName'];
$petFile = $_POST['petFile'];

if (!isset($user)) {
    header("Location: login.html");
    exit();
}

if ($rating == NULL) {
    header("Location: home.php");
    exit();
}

// Load the data and push the pet to the appropriate star number in the appropriate user
$xml = simplexml_load_file("./register/src/app/userData.xml");

$att='name';

foreach($xml->children() as $child) {
    $curName = (string)$child->attributes()->$att;

    if ($curName == $user) {
        if ($rating == .5 || $rating == 1)
            $newPet = $child->star1->addChild("pet");
        elseif ($rating == 1.5 || $rating == 2)
            $newPet = $child->star2->addChild("pet");
        elseif ($rating == 2.5 || $rating == 3)
            $newPet = $child->star3->addChild("pet");
        elseif ($rating == 3.5 || $rating == 4)
            $newPet = $child->star4->addChild("pet");
        elseif ($rating == 4.5 || $rating == 5)
            $newPet = $child->star5->addChild("pet");
    }
}

$newPet->addAttribute("name", $petName);
$newPet->addAttribute("file", $petFile);

$xml->asXML("./register/src/app/userData.xml");

header("Location: home.php");
exit();
?>