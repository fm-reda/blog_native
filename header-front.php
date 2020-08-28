<?php
// include 'demo.php';
require 'connexion.php';
session_start();
$stmtCategories = $conn->prepare('SELECT * FROM categorie  order by nom DESC');
$excuteIsOk = $stmtCategories->execute();
$categories = $stmtCategories->fetchAll();
// var_dump($categories);
// $stmt = $conn->prepare('SELECT * FROM article,categorie,auteur where
//  article.id_cat=categorie.id_cat AND 
//  article.id_auteur=auteur.id_auteur order by id_art DESC');
// $excuteIsOk = $stmt->execute();
// $articles = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>World Blog</title>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/style-blog.css">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->


    <script src="js/jquery-3.4.1.min.js"></script>
</head>

<body>
    <header class='bg-white'>


        <nav class="navbar px-md-0 navbar-expand-lg navbar-white bg-white ftco-navbar-light fixed" id="ftco-navbar">
            <div class="container">

                <div>
                    <a class="navbar-brand" href="main.php">Blog<i>Native</i>.</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto fz-20">
                        <li class="nav-item active">
                            <a class="nav-link" href="main.php">Home <span class="sr-only">(current)</span></a>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php foreach ($categories as $category) : ?>

                                    <a class="dropdown-item" href=" category-page-front.php?id-cat=<?= $category['id_cat'] ?>"><?= $category['nom'] ?></a>

                                <?php endforeach; ?>

                            </div>
                        </li>
                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
                            <li class="nav-item">
                                <a class="ml-5 nav-link" href="index-blog.php">Dashboard</a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto fz-20">
                        <?php if (isset($_SESSION['username'])) : ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?= $_SESSION['username']  ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">


                                    <a class="dropdown-item" href="userFunctions.php?logout=1">Logout</a>


                                </div>
                            </li>

                          
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.php">Register</a>
                            </li>

                        <?php endif; ?>

                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>