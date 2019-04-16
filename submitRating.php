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
$xml = simplexml_load_file("userData.xml");

if ($user == 'noah')
    $indexNum=0;
elseif ($user == 'mike')
    $indexNum=1;

if ($rating == .5 || $rating == 1)
    $newPet = $xml->user[$indexNum]->star1->addChild("pet");
elseif ($rating == 1.5 || $rating == 2)
    $newPet = $xml->user[$indexNum]->star2->addChild("pet");
elseif ($rating == 2.5 || $rating == 3)
    $newPet = $xml->user[$indexNum]->star3->addChild("pet");
elseif ($rating == 3.5 || $rating == 4)
    $newPet = $xml->user[$indexNum]->star4->addChild("pet");
elseif ($rating == 4.5 || $rating == 5)
    $newPet = $xml->user[$indexNum]->star5->addChild("pet");

$newPet->addAttribute("name", $petName);
$newPet->addAttribute("file", $petFile);

$xml->asXML("userData.xml");

header("Location: home.php");
exit();
?>