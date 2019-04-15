<?php
session_start();

// Define a function to handle failed validation attempts 
function reject()
{
//    echo 'Please <a href="login.php">Log in </a>';
   exit();    // exit the current script, no value is returned
}

function accept() {
    header('Location: home.html');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pw = $_POST['password'];

    if ($user == 'mike') {
        if ($pw != 'password') {
            echo 'Incorrect password, you dirty dirty bastard.';
            reject();
        } else {
            $_SESSION['user'] = $user;
            accept();
        }
    } else if ($user == 'noah') {
        if ($pw != 'password') {
            echo 'Incorrect password';
            reject();
        } else {
            $_SESSION['user'] = $user;
            accept();
        }
    } else {
        echo 'That user does not exist.';
        reject();
    }
}

?>