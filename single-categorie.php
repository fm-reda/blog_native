<?php
include 'demo.php' ?>



<div class="affichage p-5">
    <a class="text-decoration-none" href="new-article.php">
        <h2><i class="fa fa-plus my-4 text-primary fa-fw"></i>Ajout nouveau article</h2>
    </a>
    <h1>Liste des articles</h1>
    <table>
        <tr>
            <th>Photo</th>
            <th>Title</th>
            <th>Contenu</th>
            <th>adresse</th>
            <th>telephone</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>Lorem</td>
            <td>Lorem</td>
            <td>Lorem</td>
            <td>Lorem</td>
            <td>Lorem</td>
            <td><a href="single-article.php">Voir</a> -- Edit -- Delete</td>
        </tr>
        <tr>
            <td>Lorem</td>
            <td>Lorem</td>
            <td>Lorem</td>
            <td>Lorem</td>
            <td>Lorem</td>
            <td>Lorem</td>
        </tr>

        <!-- <?php foreach ($tuteurs as $tuteur) :; ?>
            <tr>
                <td><?= $tuteur['nom'] ?></td>
                <td><?= $tuteur['prenom'] ?></td>
                <td><?= $tuteur['email'] ?></td>
                <td><?= $tuteur['adresse'] ?></td>
                <td><?= $tuteur['telephone'] ?></td>

                <td>
                    <div>
                        <div> <a href="traitement.php?tuteur-update-id=<?= $tuteur['id_tuteur'] ?>" class="btn btn-success col-md-5">Edit</a>
                            <a href="traitement.php?tuteur-del-id=<?= $tuteur['id_tuteur'] ?>" class="btn btn-danger col-md-5">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?> -->
    </table>


    <?php
    include 'footer.php' ?>