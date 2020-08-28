<?php
session_start();
if (!(isset($_SESSION['role']) && $_SESSION['role'] == "admin")) {
    Header("Location: login.php");
}
include 'demo.php';
require 'connexion.php';

// print_r($_SESSION);



$stmt = $conn->prepare('SELECT * FROM article,categorie,auteur where
 article.id_cat=categorie.id_cat AND 
 article.id_auteur=auteur.id_auteur order by id_art DESC');
$excuteIsOk = $stmt->execute();
$articles = $stmt->fetchAll();
?>

<!-- Main pages -->


<!-- list-article -->
<div class="container w-100">
    <h1 class="tgold text-center my-5">Articles</h1>
    <div class="row my-3 cont">
        <?php foreach ($articles as $article) : ?>
            <div class="card p-0 m-2 shadow-sm" style="width:350px">
                <img class=" card-img-top rounded border" src="img/article/<?= $article['image_art'] ?>" alt="">
                <div class=" d-flex flex-column justify-content-between card-body ">
                    <div>

                        <h1 class="card-title text-dark"><?= $article['title'] ?></h1>

                        <p class="card-text text-secondary my-3"><?= substr($article['contenu'], 0, 40) . "..."; ?></p>

                        <!-- <div class="row text-secondary">
                    <span class="col-lg-4"><i class="fa fa-user-circle"><?= $article['prenom'] . " " . $article['nom_aut'] ?></i>

                    </span>
                    <span class="col-lg-4">
                        <i class=" fa fa-folder-open"><?= $article['nom'] ?></i>
                    </span>
                    <span class="col-lg-4">
                        <i class="fa fa-calendar-alt"><?= $article['date'] ?></i>
                    </span>
                </div> -->

                    </div>
                    <div class="d-flex align-items-end">
                        <div>
                            <div id="meta-post" class="text-secondary">
                                <span class="">
                                    <i class="fa fa-user"></i>
                                    <a class="text-secondary" href="" rel="author" title="Way2Themes">
                                        <span itemprop="name"><?= $article['nom_aut'] ?></span></a>
                                </span>

                                <span class="">
                                    <i aria-hidden="true" class="fa fa-folder-open"></i>
                                    <a href="#" class="text-secondary" rel="tag nofollow"><?= $article['nom'] ?></a>

                                </span>
                                <i class="fa fa-calendar-alt mr-1"></i><span class=""><?= $article['date'] ?>

                                </span>

                            </div>

                            <a href="single-article.php?id-article=<?= $article['id_art'] ?>" class="  btn btn-primary mx-auto mt-2">Read more</a>

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- <div class="card col-lg-3 p-3 m-3" style="width: 18rem;">
        <img class="card-img-top" src="http://placehold.jp/150x80.png" alt="">
        <div class="card-body">
            <h5 class="card-title">Title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="single-article.php" class="btn btn-primary">Read more</a>
        </div>
    </div>
    <div class="card col-lg-3 p-3 m-3" style="width: 18rem;">
        <img class="card-img-top" src="http://placehold.jp/150x80.png" alt="">
        <div class="card-body">
            <h5 class="card-title">Title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="single-article.php" class="btn btn-primary">Read more</a>
        </div>
    </div> -->
    </div>
</div>





<!-- fin div sidebar -->




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include 'footer.php'; ?>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html> -->