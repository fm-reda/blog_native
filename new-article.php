<?php include 'demo.php';
require 'connexion.php';

$stmtA = $conn->prepare('select * from auteur');
$excuteIsOk = $stmtA->execute();
$auteurs = $stmtA->fetchAll();
$stmtC = $conn->prepare('select * from categorie');
$excuteIsOk = $stmtC->execute();
$categories = $stmtC->fetchAll();


?>

<!-- Main pages -->

<!-- <div class="col-lg-9 my-5 ml-auto mr-auto"> -->
<div class="cont container bg-white my-shadow p-3">
    <h2 class="text-center p-4">Création d'un article</h2>
    <div class="row justify-content-center mb-5">

        <form class="w-50" method="POST" action="traitement-article.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="titre" class="form-control" id="title" aria-describedby="titlehelp">
            </div>
            <div class="form-group">
                <label for="comment">Contenu:</label>
                <textarea name="contenu" class="form-control" rows="5" id="comment"></textarea>
            </div>

            <!-- <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
            <!-- <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="art-date" class="form-control" id="art-date">
            </div> -->
            <label for="auteur">auteur</label>
            <select name="auteur" class=" form-control form-group">
                <?php foreach ($auteurs as $auteur) :; ?>
                    <option value="<?= $auteur['id_auteur']; ?>"><?= $auteur['nom_aut'] . " " . $auteur['prenom'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="categorie">categorie</label>
            <select name="categorie" class=" form-control form-group">
                <?php foreach ($categories as $categorie) :; ?>
                    <option value="<?= $categorie['id_cat']; ?>"><?= $categorie['nom']; ?></option>
                <?php endforeach; ?>
            </select>
            <div class="form-group">
                <!-- <label for="art-image">Example file input</label> -->
                <input type="file" class=" form-control-file" id="art-image" name="art-image">
            </div>

            <a href="back-articles.php" class="btn btn-primary mr-2">Back</a><button type="submit" class="btn btn-success" name="submit-art">Valider</button>
        </form>
    </div>
</div>




<?php include 'footer.php'; ?>