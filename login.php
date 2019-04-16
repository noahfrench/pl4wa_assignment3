<?php
session_start();

function reject($errorType) {
    $url = 'login_fail.php?error=' . $errorType;
    header('Location: ' . $url);
    exit();
}

function accept() {
    $_SESSION['user'] = $user;
    header('Location: home.html');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pw = $_POST['password'];

    if ($user == 'mike') {
        if ($pw != 'password') {
            reject('password');
        } else {
            accept();
        }
    } else if ($user == 'noah') {
        if ($pw != 'password') {
            reject('password');
        } else {
            accept();
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