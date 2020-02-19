<?php include 'demo.php';
?>

<!-- Main pages -->

<!-- <div class="col-lg-9 my-5 ml-auto mr-auto"> -->








<!-- Main pages -->

<!-- <div class="col-lg-9 my-5 ml-auto mr-auto"> -->
  <div class="cont container">
  <h2 class="text-center p-4">Création d'une categorie</h2>
<div class="row justify-content-center mb-5 ">

    <form class="w-50" action="traitement-categorie.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
            <label for="title">Nom</label>
            <input type="text" name="nom" class="form-control" id="nom" >
        </div>






        <div class="form-group">
            <label for="cat-image">Photo categorie</label>
            <input type="file" class=" form-control-file" id="cat-image" name="cat-image">
        </div>

        <a href="back-categories.php" class="btn btn-primary mr-2">Back</a><button type="submit" class="btn btn-success" name="submit-cat">Valider</button>
    </form>
</div>
</div>  




<?php include 'footer.php'; ?>