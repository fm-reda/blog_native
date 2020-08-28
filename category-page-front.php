<?php
// include 'demo.php';
// require 'connexion.php';
include 'header-front.php';
//fetch categories
$stmtCategories = $conn->prepare('SELECT * FROM categorie  order by nom DESC');
$excuteIsOk = $stmtCategories->execute();
$categories = $stmtCategories->fetchAll();

//fetch articles by id category
$stmt = $conn->prepare('SELECT * FROM article,categorie,auteur where
 article.id_cat=categorie.id_cat AND 
 article.id_auteur=auteur.id_auteur AND categorie.id_cat=?');
// var_dump($_GET['id-cat']);
$stmt->execute([$_GET['id-cat']]);
$articles = $stmt->fetchAll();

$stmtCategory = $conn->prepare('SELECT * FROM categorie  where id_cat=?');
$excuteIsOk = $stmtCategory->execute([$_GET['id-cat']]);
$category = $stmtCategory->fetch();

// $stmtRecent = $conn->prepare('SELECT * FROM article,auteur,categorie where
//  article.id_auteur=auteur.id_auteur AND article.id_cat=categorie.id_cat 
//   order by id_art DESC limit 3');
// $stmtRecent->execute();
// $recents = $stmtRecent->fetchAll();


//fetch comments
// $stmt2 = $conn->prepare('SELECT * FROM commentaire where
//  id_art=? order by id_com DESC');
// $stmt2->execute([$_GET['id-article']]);
// $coments = $stmt2->fetchAll();
?>

<section class="ftco-section bg-light pt-0">
    <div class=" m-t-68">
        <div class="w-100 banner-cat p-0 mb-5" style=" background-image: url('img/article/<?= $category['image'] ?>');">
            <div class="banner-tp p-3 flex-c-c"><?= $category['nom'] ?></div>
        </div>
   

    </div>
    <div class="container">
        <div class="row d-flex">
            <?php foreach ($articles as $article) : ?>


                <div class="col-md-4 d-flex ftco-animate mb-5 p-2 ">
                    <div class="blog-entry justify-content-end over  shadow-sm test">

                        <a href="blog-single.html" class="block-20 border" style="background-image: url('img/article/<?= $article['image_art'] ?>');">
                        </a>

                        <div class="text p-4 float-right d-block bg-white">
                            <div class="topper d-flex align-items-center">
                                <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                    <?php
                                        $date = date_create($article['date']);
                                        $day = date_format($date, 'd');
                                        $year = date_format($date, 'Y');
                                        $month = date_format($date, 'M');

                                        ?>
                                    <span class="day"><?= $day ?></span>
                                </div>
                                <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                    <span class="yr"><?= $year ?></span>
                                    <span class="mos"> <?= $month ?></span>
                                </div>
                            </div>

                            <div style="height:200px;" class="bloc d-flex flex-column justify-content-between  ">
                                <div class="row justify-content-between m-0">
                                    <div class="text-muted">
                                        <i class="fa fa-user mr-1" aria-hidden="true"></i>
                                        <span class="mr-4"><?= $article['nom_aut']; ?></span>
                                    </div>
                                    <div>

                                        <i class="fa fa-folder mr-1" aria-hidden="true"></i>
                                        <span><?= $article['nom']; ?></span>
                                    </div>

                                </div>
                                <!-- <div class="text-center "><span><a href="#" class=""><?= substr($article['nom'], 0, 50); ?></a></span></div> -->
                                <div class="row">

                                </div>
                                <h3 class="heading mb-3"><a href="#"><?= substr($article['title'], 0, 50); ?></a></h3>
                                <p><?= substr($article['contenu'], 0, 40) . "..."; ?></p>

                                <div class="mt-4 mx-auto">
                                    <a href="single-art-front.php?id-article=<?= $article['id_art'] ?>&category=<?= $article['nom'] ?>" class="btn-custom aaa text-white" id="aaa">Read more</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
        <!-- <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div> -->
    </div>
</section>


<?php include 'footer-front.php'; ?>