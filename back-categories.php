<?php
include 'demo.php';
require 'connexion.php';

$stmt = $conn->prepare('select * from categorie');
$excuteIsOk = $stmt->execute();
$categories = $stmt->fetchAll();


?>



<div class="cont container bg-white shadow-lg p-3 ">
    
    <a class="text-decoration-none" href="new-categorie.php">
        <h2><i class="fa fa-plus my-4 text-primary fa-fw"></i>Ajout d'une categorie</h2>
    </a>
    <h1 class="text-center">Liste des categories</h1>
    <table class="table-hover container col-lg-10">
        <thead>
            <tr>
                <th  scope="col" style="width:50px;">N°</th>
                <th scope="col">Image</th>
                <th scope="col">Nom</th>
               
                <th style="width:300px;" scope="text-center col">Action</th>
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
            foreach ($categories as $categorie) :; ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td style="width:100px;height:100px;"><img class="w-100 h-100" src="img/categorie/<?= $categorie['image'] ?>" alt=""></a></td>
                    <td><?= $categorie['nom'] ?></td>
                    



                    <td>
                        <div>
                            <div>
                                <a href="traitement-categorie.php?categorie-view-id=<?= $categorie['id_cat'] ?>" class="btn btn-primary col-md-3">View</a>
                                <a href="update-categorie.php?categorie-update-id=<?= $categorie['id_cat'] ?>" class="btn btn-success col-md-3">Edit</a>
                                <a href="traitement-categorie.php?categorie-del-id=<?= $categorie['id_cat'] ?>" class="btn btn-danger col-md-3">Delete</a>

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