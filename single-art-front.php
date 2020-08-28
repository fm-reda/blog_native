<?php
// include 'demo.php';
// require 'connexion.php';
include 'header-front.php';
session_start();
//fetch comments
$stmtComents = $conn->prepare('SELECT * FROM user,commentaire where
 commentaire.id_user=user.id AND id_art=? order by id_com DESC');
$stmtComents->execute([$_GET['id-article']]);
$coments = $stmtComents->fetchAll();

// $stmtComents = $conn->prepare('SELECT * FROM user,commentaire where 
// user.id=commentaire.id_user AND id_art=?');
// $excuteIsOk = $stmtComents->execute([$_GET['id-article']]);
// $coments = $stmtComents->fetchAll();
//count comments
$stmtCount = $conn->prepare('SELECT count(id_com) as nb_com from commentaire where 
  id_art=?');
$excuteIsOk = $stmtCount->execute([$_GET['id-article']]);
$comCount = $stmtCount->fetch();

//fetch categories
$stmtCategories = $conn->prepare('SELECT * FROM categorie  order by nom DESC');
$excuteIsOk = $stmtCategories->execute();
$categories = $stmtCategories->fetchAll();

//fetch articles
$stmt = $conn->prepare('SELECT * FROM article,categorie,auteur where
 article.id_cat=categorie.id_cat AND 
 article.id_auteur=auteur.id_auteur AND id_art=?');
$stmt->execute([$_GET['id-article']]);
$articles = $stmt->fetch();

$stmtRecent = $conn->prepare('SELECT * FROM article,auteur,categorie where
 article.id_auteur=auteur.id_auteur AND article.id_cat=categorie.id_cat 
  order by id_art DESC limit 3');
$stmtRecent->execute();
$recents = $stmtRecent->fetchAll();


//Add comments

// $stmt2 = $conn->prepare('SELECT * FROM commentaire where
//  id_art=? order by id_com DESC');
// $stmt2->execute([$_GET['id-article']]);
// $coments = $stmt2->fetchAll();

?>

<section class="ftco-section ftco-degree-bg">


    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <p class="mb-5">
                    <img src="img/article/<?= $articles['image_art'] ?>" alt="" class="img-fluid">
                </p>
                <h2 class="mb-3"><?= $articles['title'] ?></h2>
                <p><?= $articles['contenu'] ?></p>


                <div class="about-author d-flex p-4 bg-light">
                    <div class="mr-3 " style="width:60px;height:60px;">
                        <img src="img/auteur/<?= $articles['avatar'] ?>" alt="Image placeholder" class="rounded-circle w-100 h-100">
                    </div>
                    <!-- <div class="bio mr-5">
                        <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
                    </div> -->
                    <div class="desc">
                        <h3><a href="auteur-page-front.php?id-auteur=<?= $articles['id_auteur'] ?>"><?= $articles['nom_aut'] ?></a></h3>
                        <h5 class="text-muted">Author</h5>
                    </div>
                </div>


                <div class="pt-5 mt-5">
                    <h3 class="mb-5"><?= $comCount['nb_com'] ?> Comments</h3>

                    <?php
                    // print_r($coments);
                    ?>
                    <ul class="comment-list">

                        <?php foreach ($coments as $coment) : ?>


                            <li class="comment border-bottom">
                                <div class="vcard bio">
                                    <img src="img/<?= $coment['user_avatar'] ?>" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h5><?= $coment['name'] ?></h5>
                                    <h6 class="meta mb-3 text-muted"><?= $coment['date_com'] ?></h6>
                                    <p class="fz-20 w-100 blockCom"><?= $coment['comment'] ?></p>
                                    <!-- <p><a href="#" class="reply">Reply</a></p> -->
                                </div>
                            </li>

                        <?php endforeach; ?>



                    </ul>
                    <!-- END comment-list -->
                    <?php if (isset($_SESSION['username'])) : ?>

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>
                            <form action="ComentController.php" method="POST" class="p-5 bg-light">
                                <!-- <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" class="form-control" id="website">
                                </div> -->
                                <input type="hidden" name="id-article" value="<?= $articles['id_art'] ?>">
                                <input type="hidden" name="category" value="<?= $articles['nom'] ?>">

                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="content" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" name="submit-coment" class="btn py-3 px-4 btn-primary">
                                </div>

                            </form>
                        </div>
                    <?php else : ?>
                        You want Leave a comment? <a href="login.php?id-article=<?= $articles['id_art'] ?>&category=<?= $articles['nom'] ?>"> Sign in</a>


                    <?php endif; ?>

                </div>

            </div> <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">

                <div class="sidebar-box ftco-animate">
                    <div class="categories">
                        <h3>Categories</h3>
                        <?php foreach ($categories as $value) : ?>

                            <li class="nav-item page-item "><a href="category-page-front.php?id-cat=<?= $value['id_cat'] ?>" class="nav-link <?= ($_GET['category'] == $value['nom']) ? 'active' : '' ?>">
                                    <?= $value['nom'] ?> </a></li>

                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3>Recent Blog</h3>
                    <?php foreach ($recents as $recent) : ?>

                        <div class="block-21 mb-4 d-flex">

                            <a class="blog-img mr-4" style="background-image: url(img/article/<?= $recent['image_art'] ?>);"></a>
                            <div class="text">

                                <h3 class="nav-item"><a class=" nav-link p-0" href="single-art-front.php?id-article=<?= $recent['id_art'] ?>&category=<?= $recent['nom'] ?>">
                                        <?= $recent['title'] ?></a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> <?= $recent['date'] ?></a></div>
                                    <div><a href="#"><span class="icon-person"></span> <?= $recent['nom_aut'] ?></a></div>
                                    <!-- <div><a href="#"><span class="icon-chat"></span> 19</a></div> -->
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>


                </div>


            </div>

        </div>
    </div>
</section> <!-- .section -->



<?php include 'footer-front.php'; ?>