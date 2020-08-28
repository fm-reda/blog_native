<?php
require 'connexion.php';

//Logout
if (isset($_GET['logout'])) {
    session_start();

    session_destroy();

    Header("Location: main.php");
}
// request Login 
if (isset($_POST['submit-login'])) {

    $email = $_POST["email"];
    $password = $_POST["password"];
    login($email, $password, $conn);
}
//request register
if (isset($_POST['submit-register'])) {
    session_start();
    if ($_POST["password"] != $_POST["c_password"]) {
        $_SESSION['error'] = 'Password not same';
    } else {
        $name = $_POST["name"];
        $email = $_POST["email"];

        $password  = password_hash($_POST["password"], PASSWORD_DEFAULT);
        register($name, $email, $password, $conn);
    }
}

//function login
function login($email, $password, $conn)
{
    session_start();
    $req = $conn->prepare("select * from user where user_email=?");

    $req->execute([$email]);
    $user = $req->fetch();
    if ($user) {
        if (password_verify($password, $user['password'])) {

            $_SESSION['username'] = $user['name'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['user_id'] = $user['id'];

            // Header("Location: main.php");    
            if (isset($_GET['id-article'])) {
                echo $_GET['id-article'];

                Header("Location: single-art-front.php?id-article=" . $_GET['id-article'] . "&category=" . $_GET['category'] . "");
            } else {
                echo $_GET['id-article'];

                Header("Location: main.php");
            }
            exit();
        } else {
            $_SESSION['error'] = 'password invalid';
        }
    } else {

        $_SESSION['error'] = 'Email not found';
    }
}

//function register
function register($name, $email, $password, $conn)
{
    //verification email
    $reqCheck = $conn->prepare("SELECT * from user where user_email = ?");
    $executeIsOk = $reqCheck->execute([$email]);
    $userCheck = $reqCheck->fetch();
    if ($userCheck) {
        $_SESSION['error'] = 'Email already used';
    } else {

        $req = $conn->prepare("INSERT INTO user SET name = ?, user_email = ?, password = ?");
        $executeIsOk = $req->execute([$name, $email, $password]);
        if ($executeIsOk) {
            $reqUser = $conn->prepare("SELECT * from user where user_email = ?");
            $executeIsOk = $reqUser->execute([$email]);
            $user = $reqUser->fetch();
            $_SESSION['username'] = $user['name'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['user_id'] = $user['id'];

            Header("Location: main.php");

            exit();
        } else echo 'not ok';
    }
}
