<?php
session_start();

function reject($errorType) {
    $url = './login_fail.php?error=' . $errorType;
    header('Location: ' . $url);
    exit();
}

function accept($user) {
    $_SESSION['user'] = $user;
    // Make the cookie last 100 years.
    $time = time();
    setcookie("timeStarted", $time);
    header('Location: ./home.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pw = $_POST['password'];
    $nameWord = 'name';
    $pwWord = 'password';

    $userExists = false;

    if ($user == '')
        reject('noName');
    else if ($pw == '')
        reject('noPw');

    $xml = simplexml_load_file("userData.xml");

    foreach($xml->children() as $child) {
        $curName = (string)$child->attributes()->$nameWord;
        $curPw = (string)$child->attributes()->$pwWord;

        if ($user == $curName) {
            $userExists = true;
            if ($pw == $curPw)
                accept($user);
        }
    }

    if (!$userExists)
        reject('username');
    else
        reject('password');
}

?>