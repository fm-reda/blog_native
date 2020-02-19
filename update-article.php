<?php include 'demo.php';
require 'connexion.php';
if (isset($_GET["art-update-id"])) {

    $stmt = $conn->prepare('SELECT * FROM article,categorie,auteur where
 article.id_cat=categorie.id_cat AND 
 article.id_auteur=auteur.id_auteur AND id_art=?');
    $excuteIsOk = $stmt->execute([$_GET["art-update-id"]]);
    $singleArticle = $stmt->fetch();


    //appel donnée auteur et categorie pour input select 
    $stmtA = $conn->prepare('select * from auteur');
    $excuteIsOk = $stmtA->execute();
    $auteurs = $stmtA->fetchAll();
    $stmtC = $conn->prepare('select * from categorie');
    $excuteIsOk = $stmtC->execute();
    $categories = $stmtC->fetchAll();

    // $stmt = $conn->prepare('select * from auteur where id_auteur=:num');
    // $stmt->bindValue(':num', $_GET["auteur-update-id"], PDO::PARAM_INT);
    // $stmt->execute();
    // $singleAuteur = $stmt->fetchAll();
    // print_r($singleAuteur);
}
?>

<!-- Main pages -->

<!-- <div class="col-lg-9 my-5 ml-auto mr-auto"> -->
<div class="cont">
    <h2 class="text-center p-4">Modification d'un article</h2>
    <div class="row justify-content-center mb-5 ">

        <form class="w-50" method="POST" action="traitement-article.php" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" hidden name="id" id="" value="<?= $singleArticle['id_art']; ?>">
                <label for="title">Title</label>
                <input type="text" name="titre" class="form-control" id="title" aria-describedby="titlehelp" value="<?= $singleArticle['title'] ?>">
            </div>
            <div class="form-group">
                <label for="comment">Contenu:</label>
                <textarea name="contenu" class="form-control" rows="5" id="comment"><?= $singleArticle['contenu'] ?></textarea>
            </div>


            <label for="auteur">auteur</label>
            <select name="auteur" class=" form-control form-group">
                <option value="<?= $singleArticle['id_auteur'] ?>"><?= $singleArticle['nom_aut'] ?></option>
                <option value="<?= $singleArticle['id_auteur'] ?> ?>">------------------</option>
                <?php foreach ($auteurs as $auteur) :; ?>
                    <option value="<?= $auteur['id_auteur']; ?>"><?= $auteur['nom_aut'] . " " . $auteur['prenom'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="categorie">categorie</label>
            <select name="categorie" class=" form-control form-group">
                <option value="<?= $singleArticle['id_cat'] ?>"><?= $singleArticle['nom'] ?></option>
                <option value="<?= $singleArticle['id_cat'] ?>">------------------</option>
                <?php foreach ($categories as $categorie) :; ?>
                    <option value="<?= $categorie['id_cat']; ?>"><?= $categorie['nom']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="art-image">Photo de l'article</label>
            <input type="text" hidden name="old-image" id="" value="<?= $singleArticle['image_art']; ?>">
            <div style="width:100px;height:100px;"><img class="m-2 w-100 h-100" src="img/article/<?= $singleArticle['image_art'] ?>" alt=""></a></div><br>
            <div class="form-group">
                <label for="art-image">Example file input</label>
                <input type="file" class=" form-control-file" id="art-image" name="art-image">
            </div>

            <a href="back-articles.php" class="btn btn-primary mr-2">Back</a><button type="submit" class="btn btn-success" name="update-art">Valider</button>
        </form>
    </div>
</div>




<?php include 'footer.php';
if (isset($a)) {
    echo "a=1";
    Header("Location: back-auteurs.php");
}

?>