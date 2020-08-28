<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"> -->

    <!-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Mon blog</title>
    <meta name="description" content="Pushy is an off-canvas navigation menu for your website.">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/style-blog.css">
    <!-- Pushy CSS -->
    <link rel="stylesheet" href="css/pushy.css">

    <!-- jQuery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <style>
        p {
            word-break: break-all;
        }

        .tgold {
            color: #c38953;
        }

        .bg-gold {
            background-color: #c38953;
        }

        .cont {
            min-height: 600px;

        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }



        .dropdown>.dropdown-menu {
            top: 200%;
            transition: 0.3s all ease-in-out;
        }

        .dropdown:hover>.dropdown-menu {
            display: block;
            top: 100%;
        }

        .dropdown>.dropdown-toggle:active {
            /*Without this, clicking will make it sticky*/
            pointer-events: none;
        }
    </style>

</head>

<body class="bg-light">
    <?php include 'nav.php'; ?>

    <!-- <header class="row site-header push">
        

        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <div><button class="mx-3 px-3 menu-btn justify-content-start">&#9776; Menu</button></div>
            </li>
            <li class="nav-item">
                <div class="text-white display-5 align-center"><a class="navbar-brand text-white" href="index-blog.php">Mon blog</a></div>
            </li>
            <li class="nav-item">
                <div class="container">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown button
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>




    </header> -->


    <!-- Pushy Menu -->
    <nav class="pushy pushy-left" data-focus="#first-link">
        <div class="pushy-content">
            <ul>
                <li class="pushy-link"><a href="back-articles.php">Article</a></li>
                <li class="pushy-link"><a href="back-categories.php">Categorie</a></li>
                <li class="pushy-link"><a href="back-auteurs.php">Auteur</a></li>
                <li class="pushy-link"><a href="main.php">Website</a></li>
                <!-- <li class="pushy-submenu">
                    <button id="first-link"><a href="new-article.php"></a>Article</button>
                    <ul>
                        <li class="pushy-submenu">
                            <button>Sub-Submenu 1</button>
                            <ul>
                                <li class="pushy-link"><a href="#">Item 1</a></li>
                                <li class="pushy-link"><a href="#">Item 2</a></li>
                            </ul>
                        </li>
                        <li class="pushy-submenu">
                            <button>Sub-Submenu 2</button>
                            <ul>
                                <li class="pushy-link"><a href="#">Item 1</a></li>
                                <li class="pushy-link"><a href="#">Item 2</a></li>
                            </ul>
                        </li>
                        <li class="pushy-link"><a href="#">Item 1</a></li>
                        <li class="pushy-link"><a href="#">Item 2</a></li>
                    </ul>
                </li>
                <li class="pushy-submenu">
                    <button>Categorie</button>
                    <ul>
                        <li class="pushy-link"><a href="#">Item 1</a></li>
                        <li class="pushy-link"><a href="#">Item 2</a></li>
                        <li class="pushy-link"><a href="#">Item 3</a></li>
                    </ul>
                </li>
                <li class="pushy-submenu">
                    <button>Auteur</button>
                    <ul>
                        <li class="pushy-link"><a href="#">Item 1</a></li>
                        <li class="pushy-link"><a href="#">Item 2</a></li>
                        <li class="pushy-link"><a href="#">Item 3</a></li>
                    </ul>
                </li>
                <li class="pushy-submenu">
                    <button>Admin</button>
                    <ul>
                        <li class="pushy-link"><a href="#">Item 1</a></li>
                        <li class="pushy-link"><a href="#">Item 2</a></li>
                        <li class="pushy-link"><a href="#">Item 3</a></li>
                    </ul>
                </li>
                <li class="pushy-link"><a href="#">Item 1</a></li>
                <li class="pushy-link"><a href="#">Item 2</a></li>
                <li class="pushy-link"><a href="#">Item 3</a></li>
                <li class="pushy-link"><a href="#">Item 4</a></li> -->
            </ul>
        </div>
    </nav>

    <!-- Site Overlay -->
    <div class="site-overlay">


    </div>

    <!-- Your Content -->
    <div id="container">
        <!-- Menu Button -->


        <!-- Main page  -->



    </div>



    <!-- Pushy JS -->