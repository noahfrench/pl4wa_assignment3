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

    if ($user == 'mike') {
        if ($pw != 'password') {
            reject('password');
        } else {
            accept($user);
        }
    } else if ($user == 'noah') {
        if ($pw != 'password') {
            reject('password');
        } else {
            accept($user);
        }
    } else if ($user == '') {
        reject('noName');
    } else if ($pw == '') {
        reject('noPw');
    } else {
        reject('username');
    }
}

?>