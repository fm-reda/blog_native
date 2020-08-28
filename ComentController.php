<?php
session_start();
require 'connexion.php';
if (isset($_POST['submit-coment'])) {



    $req = $conn->prepare("INSERT INTO commentaire SET id_user = ?, date_com = ?, comment = ?, id_art=?");
    $req->execute([$_SESSION['user_id'], validation(date('Y-m-d H:i:s')), validation($_POST['content']), $_POST['id-article']]);
    // $stat = "données enrégistrées";
    Header("Location: single-art-front.php?id-article=" . $_POST['id-article'] . "category=" . $_POST['category']);
    exit();


    // echo $_POST['content'];
    // $req = $conn->prepare("INSERT INTO coment SET name = ?, user_email = ?, password = ?");
    // $executeIsOk = $req->execute([$name, $email, $password]);
    // if ($executeIsOk) {
    //     $reqUser = $conn->prepare("SELECT * from user where user_email = ?");
    //     $executeIsOk = $reqUser->execute([$email]);
    //     $user = $reqUser->fetch();
    //     $_SESSION['username'] = $user['name'];
    //     $_SESSION['role'] = $user['role'];
    //     Header("Location: main.php");

    //     exit();
    // } else echo 'not ok';
}
