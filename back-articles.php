<?php
include 'demo.php';
require 'connexion.php';
$stmt = $conn->prepare('SELECT * FROM article,categorie,auteur where
 article.id_cat=categorie.id_cat AND 
 article.id_auteur=auteur.id_auteur order by id_art DESC');
$excuteIsOk = $stmt->execute();
$articles = $stmt->fetchAll();


?>

<div class="cont container bg-white shadow-lg p-3  ">

    <a class="text-decoration-none" href="new-article.php">
        <h2><i class="fa fa-plus my-4 text-primary fa-fw"></i>Ajout d'un article</h2>
    </a>
    <h1>Liste des articles</h1>
    <table class="table-hover">
        <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Contenu</th>
                <th scope="col">Categorie</th>
                <th scope="col">Auteur</th>
                <th scope="col">Date création</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            <!-- <tr>
                <td>1</td>
                <td class="text-center">
                    <a style=" display:block ;width:100px" href="single-article.php">
                        <img class="w-100" src="img/article/article2.jpg" alt=""></a>
                </td>
                <td scope="row">titre</td>
                <td>lorem lorem</td>
                <td>20/12/2020</td>
                <td>
                    <a type="button" href="single-article.php" class="btn btn-primary">Voir</a>
                    <a type="button" href="edit-article.php" class="btn btn-warning">Edit</a>
                    <a type="button" class="btn btn-danger">Delete</a>
                </td>

            </tr> -->

            <?php $i = 1;
            foreach ($articles as $article) :; ?>
                <?php



                $stmt2 = $conn->prepare('select count(id_com) as nb_com from commentaire where id_art=?');
                $excuteIsOk = $stmt2->execute([$article['id_art']]);
                $com = $stmt2->fetch();




                // print_r($com); 
                ?>

                <tr>
                    <td><?= $i; ?></td>
                    <td style="width:100px;height:100px;"><img class="w-100 h-100" src="img/article/<?= $article['image_art'] ?>" alt=""></a></td>
                    <td><?= $article['title'] ?></td>
                    <td><?= substr($article['contenu'], 0, 20) . "..."; ?></td>
                    <td><?= $article['nom'] ?></td>
                    <td><?= $article['nom_aut'] . " " . $article['prenom'] ?></td>
                    <td><?= $article['date'] ?></td>
                    <td>
                        <div>
                            <div>
                                <a href="traitement-article.php?art-view-id=<?= $article['id_art'] ?>" class="btn btn-primary col-md-2"><i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="update-article.php?art-update-id=<?= $article['id_art'] ?>" class="btn btn-success col-md-2"> <i class="fa fa-wrench" aria-hidden="true"></i></a>
                                <a href="traitement-article.php?art-del-id=<?= $article['id_art'] ?>" class="btn btn-danger col-md-2"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                <a href="traitement-article.php?art-com-id=<?= $article['id_art'] ?>" class="btn btn-warning col-md-3"><i class="fa fa-comment mr-1" aria-hidden="true"></i><?= $com['nb_com'] ?></a>

                            </div>
                        </div>
                    </td>
                </tr>
            <?php $i++;
            endforeach; ?>

        </tbody>
    </table>
</div>

<?php
include 'footer.php' ?>