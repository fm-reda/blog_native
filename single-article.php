<?php
include 'demo.php';
require 'connexion.php';

$stmt = $conn->prepare('SELECT * FROM article,categorie,auteur where
 article.id_cat=categorie.id_cat AND 
 article.id_auteur=auteur.id_auteur AND id_art=?');
$stmt->execute([$_GET['id-article']]);
$articles = $stmt->fetch();
$stmt2 = $conn->prepare('SELECT * FROM commentaire where
 id_art=? order by id_com DESC');
$stmt2->execute([$_GET['id-article']]);
$coments = $stmt2->fetchAll();

?>


<div class="col-lg-8 mx-auto bg-white">
    <div class="row">

        <div class="modal-body">
            <!-- Project Details Go Here -->
            <h2 class="text-uppercase "><?= $articles['title'] ?></h2>
            <div class="w-100">
                <img style="" class="img-fluid d-block mx-auto w-100 border" src="img/article/<?= $articles['image_art'] ?>" alt="">
            </div>
            <p><?= $articles['contenu'] ?></p>


            <div class="row justify-content-between container m-0 border border-left-0 border-right-0 ">
                <ul class="list-inline my-5">
                    <li>publié: <?= $articles['date'] ?></li>
                    <li>Category: <?= $articles['nom'] ?></li>
                </ul>
                <div>
                    <ul class="list-inline my-5 mr-4">
                        <li><img class="rounded-circle border mb-3" width="50px" height="50px" src="img/auteur/<?= $articles['avatar'] ?>" alt=""></li>
                        <li class="tgold" style="font-family:arial;font-size:1.3rem;text-transform:uppercase;"><span><?= $articles['nom_aut'] ?></span></li>
                    </ul>


                </div>

            </div>

            <!-- <div class="row"><a href="index-blog.php" class="btn btn-primary">Back</a></div> -->

        </div>
    </div>
    <h1>Commentaires</h1>
    <div class="bg-light border border-left-0 border-right-0" style="min-height:300px;">
        <?php foreach ($coments as $coment) :; ?>
            <div class=" m-2 bg-white border shadow-sm">

                <div class="border-bottom mb-0">
                    <div class="row px-4 text-muted">
                        <h3 class="mr-4 "><i class="fa fa-user mr-1"></i><?= recuperation($coment['nickname']) ?></h3>
                        <h4 class=""><i class="fa fa-calendar-alt mr-1"></i><?= recuperation($coment['date_com']) ?></h4>
                    </div>
                </div>

                <p class="p-2"><?= $coment['comment'] ?></p>
            </div>

        <?php endforeach; ?>
    </div>
    <h1>Ajouter commentaire</h1>
    <div class="row p-2 m-3">

        <form class="w-50 " method="POST" action="traitement-article.php" enctype="multipart/form-data">
            <input type="text" name="id_art" id="" value="<?= $_GET['id-article'] ?>" hidden>
            <div class="form-group">
                <label for="title">Nickname</label>
                <input type="text" name="nickname" class="form-control" id="nickname" aria-describedby="titlehelp">
            </div>
            <div class="form-group">
                <label for="coment">Commentaire:</label>
                <textarea name="coment" class="form-control" rows="5" id="coment"></textarea>
            </div>


            <a href="<?= isset($_GET['from']) ? "back-articles.php" : "index-blog.php" ?>" class="btn btn-primary mr-2">Back</a><button type="submit" class="btn btn-success" name="submit-com">Valider</button>
        </form>

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