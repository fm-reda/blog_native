<?php include 'demo.php';
?>

<!-- Main pages -->

<!-- <div class="col-lg-9 my-5 ml-auto mr-auto"> -->
  <div class="cont container bg-white shadow-lg">
<h2 class="text-center p-4">Création d'un auteur</h2>
<div class="row justify-content-center mb-5 ">

    <form class="w-50" action="traitement-auteur.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Nom</label>
            <input type="text" name="nom-aut" class="form-control" id="title" aria-describedby="titlehelp">
        </div>
        <div class="form-group">
            <label for="title">Prenom</label>
            <input type="text" name="prenom" class="form-control" id="title" aria-describedby="titlehelp">
        </div>
        <div class="form-group">
            <label for="title">email</label>
            <input type="text" name="email" class="form-control" id="title" aria-describedby="titlehelp">
        </div>


        <!-- <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->




        <div class="form-group">
            <label for="art-image">Photo de l'auteur</label>
            <input type="file" class=" form-control-file" id="art-image" name="aut-image">
        </div>

        <a href="back-auteurs.php" class="btn btn-primary mr-2">Back</a><button type="submit" class="btn btn-success" name="submit-aut">Valider</button>
    </form>
</div>
</div>  




<?php include 'footer.php'; ?>