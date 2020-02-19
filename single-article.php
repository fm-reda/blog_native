<?php
include 'demo.php';



require 'connexion.php';

$stmt = $conn->prepare('SELECT * FROM article,categorie,auteur where
 article.id_cat=categorie.id_cat AND 
 article.id_auteur=auteur.id_auteur AND id_art=?');
$stmt->execute([$_GET['id-article']]);
$articles = $stmt->fetch();
?>



<div class="row">
    <div class="col-lg-8 mx-auto bg-white">
        <div class="modal-body">
            <!-- Project Details Go Here -->
            <h2 class="text-uppercase text-center"><?= $articles['title'] ?></h2>
            <div class="w-100">
                <img class="img-fluid d-block mx-auto w-100 border" src="img/article/<?= $articles['image_art'] ?>" alt="">
            </div>
            <p><?= $articles['contenu'] ?></p>
            <ul class="list-inline my-5">
                <li>Date: <?= $articles['date'] ?></li>
                <li>auteur:<?= $articles['nom_aut'] ?></li>
                <li>Category: <?= $articles['nom'] ?></li>
            </ul>
            <div class="row"><a href="index-blog.php" class="btn btn-primary">Back</a></div>

        </div>
    </div>
</div>













<!-- <div id="meta-post text-secondary">
            <span class="auth-meta">
                <i class="fa fa-user"></i>
                <a class="" href="" rel="author" title="Way2Themes">
                    <span itemprop="name"><?= $articles['nom_aut'] ?></a>
            </span>

            <span class="post-labels">
                <i aria-hidden="true" class="fa fa-folder-open"></i>
                <a href="#" rel="tag nofollow"><?= $articles['nom'] ?></a>

            </span>
            <span class="pub-meta"><i class="fa fa-calendar-o"></i>
                <?= $articles['date'] ?>
            </span>
            <span class="meta-com"><i aria-hidden="true" class="fa fa-comments"></i><a class="comments-link" href="http://eva-way2themes.blogspot.com/2015/03/handbags-accessories-totes-clutches.html#comment-form"><span>
                        3</span> Comments</a></span>
        </div> -->





















<?php
include 'footer.php' ?>