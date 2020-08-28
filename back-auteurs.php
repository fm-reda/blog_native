<?php
include 'demo.php';
require 'connexion.php';

$stmt = $conn->prepare('select * from auteur');
$excuteIsOk = $stmt->execute();
$auteurs = $stmt->fetchAll();


?>



<div class="cont container bg-white shadow-lg p-3">

    <a class="text-decoration-none" href="new-auteur.php">
        <h2><i class="fa fa-plus my-4 text-primary fa-fw"></i>Ajout d'un auteur</h2>
    </a>
    <h1>Liste des auteurs</h1>
    <table class="table-hover">
        <thead class="bg-dark text-white">
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Avatar</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Email</th>
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
            foreach ($auteurs as $auteur) :; ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td style="width:100px;height:100px;"><img class="w-100 h-100" src="img/auteur/<?= $auteur['avatar'] ?>" alt=""></a></td>
                    <td><?= $auteur['nom_aut'] ?></td>
                    <td><?= $auteur['prenom'] ?></td>
                    <td><?= $auteur['email'] ?></td>



                    <td>
                        <div>
                            <div>
                                <!-- <a href="traitement-auteur.php?auteur-view-id=<?= $auteur['id_auteur'] ?>" class="btn btn-primary col-md-3"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                                <a href="update-auteur.php?auteur-update-id=<?= $auteur['id_auteur'] ?>" class="btn btn-success col-md-5"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <a href="traitement-auteur.php?auteur-del-id=<?= $auteur['id_auteur'] ?>" class="btn btn-danger col-md-5"><i class="fa fa-trash" aria-hidden="true"></i></a>

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