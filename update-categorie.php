<?php include 'demo.php';
require 'connexion.php';
if (isset($_GET["categorie-update-id"])) {
    $stmt = $conn->prepare('select * from categorie where id_cat=:num');
    $stmt->bindValue(':num', $_GET["categorie-update-id"], PDO::PARAM_INT);
    $stmt->execute();
    $singleCategorie = $stmt->fetchAll();
    // print_r($singleAuteur);


}

// if(isset($_POST['update-cat'])){

//     $file = $_FILES["cat-image"];
//     if(!$_FILES["cat-image"]["name"]==""){



//         $fileName = $_FILES["cat-image"]["name"];

//     }else{

//         $fileName=$_POST['old-image'];

//     }

//     $fileTmpName = $_FILES["cat-image"]["tmp_name"];
//     $fileSize = $_FILES["cat-image"]["size"];
//     $fileError = $_FILES["cat-image"]["error"];
//     $fileType = $_FILES["cat-image"]["type"];
//     if ($fileError === 0) {
//         $fileDestination = 'img/categorie/' . $fileName;
//         echo $fileDestination;
//         move_uploaded_file($fileTmpName, $fileDestination);
//     } else {
//         echo "There was an error or same picture";
//     }
//     $sql = "UPDATE categorie SET nom=?, image= ? WHERE id_cat = ?";
// $stmt= $conn->prepare($sql);

// $stmt->execute([$_POST['nom'], $fileName,$_POST['id']]);

// Header("Location: back-categories.php");






// }





?>

<!-- Main pages -->

<!-- <div class="col-lg-9 my-5 ml-auto mr-auto"> -->
<div class="cont">
    <h2 class="text-center p-4">Modification d'un auteur</h2>
    <div class="row justify-content-center mb-5 ">

        <form class="w-50" action="traitement-categorie.php" method="POST" enctype="multipart/form-data">
            <input type="text" hidden name="id" id="" value="<?= $singleCategorie[0]['id_cat']; ?>">
            <div class="form-group">
                <label for="title">Nom</label>
                <input type="text" name="nom" class="form-control" id="title" aria-describedby="titlehelp" value="<?= $singleCategorie[0]['nom']; ?>">
            </div>
            <!-- <div class="form-group">
            <label for="title">Prenom</label>
            <input type="text" name="prenom" class="form-control" id="title" aria-describedby="titlehelp" value="<?= $singleCategorie[0]['prenom']; ?>">
        </div>
        <div class="form-group">
            <label for="title">email</label>
            <input type="text" name="email" class="form-control" id="title" aria-describedby="titlehelp" value="<?= $singleCategorie[0]['email']; ?>">
        </div> -->


            <!-- <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->




            <div class="form-group">
                <label for="art-image">Photo de l'auteur</label>
                <input type="text" hidden name="old-image" id="" value="<?= $singleCategorie[0]['image']; ?>">
                <div style="width:100px;height:100px;"><img class="m-2 w-100 h-100" src="img/categorie/<?= $singleCategorie[0]['image'] ?>" alt=""></a></div><br>
                <input type="file" class=" form-control-file" id="cat-image" name="cat-image">
            </div>

            <a href="back-categories.php" class="btn btn-primary mr-2">Back</a><button type="submit" class="btn btn-success" name="update-cat">Modifier</button>
        </form>
    </div>
</div>




<?php include 'footer.php';


?>