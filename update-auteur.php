<?php include 'demo.php';
require 'connexion.php';
if (isset($_GET["auteur-update-id"])){
    $stmt=$conn->prepare('select * from auteur where id_auteur=:num');
$stmt->bindValue(':num', $_GET["auteur-update-id"], PDO::PARAM_INT);  
$stmt->execute();
$singleAuteur=$stmt->fetchAll();
// print_r($singleAuteur);


}

if(isset($_POST['update-aut'])){
   
    $file = $_FILES["aut-image"];
    if(!$_FILES["aut-image"]["name"]==""){
    
        
        
        $fileName = $_FILES["aut-image"]["name"];
        
    }else{
       
        $fileName=$_POST['old-avatar'];

    }
    
    $fileTmpName = $_FILES["aut-image"]["tmp_name"];
    $fileSize = $_FILES["aut-image"]["size"];
    $fileError = $_FILES["aut-image"]["error"];
    $fileType = $_FILES["aut-image"]["type"];
    if ($fileError === 0) {
        $fileDestination = 'img/auteur/' . $fileName;
        echo $fileDestination;
        move_uploaded_file($fileTmpName, $fileDestination);
    } else {
        echo "There was an error or same picture";
    }
    $sql = "UPDATE auteur SET nom=?, prenom=?, email= ?, avatar= ? WHERE id_auteur = ?";
$stmt= $conn->prepare($sql);

$stmt->execute([$_POST['nom'], $_POST['prenom'], $_POST['email'], $fileName,$_POST['id']]);
$a=1;
Header("Location: back-auteur.php");




   
  
}


   


?>

<!-- Main pages -->

<!-- <div class="col-lg-9 my-5 ml-auto mr-auto"> -->
  <div class="cont">
<h2 class="text-center p-4">Modification d'un auteur</h2>
<div class="row justify-content-center mb-5 ">

    <form class="w-50" action="traitement-auteur.php" method="POST" enctype="multipart/form-data">
        <input type="text" hidden name="id" id="" value="<?= $singleAuteur[0]['id_auteur'];?>">
        <div class="form-group">
            <label for="title">Nom</label>
            <input type="text" name="nom-aut" class="form-control" id="title" aria-describedby="titlehelp" value="<?= $singleAuteur[0]['nom_aut'];?>">
        </div>
        <div class="form-group">
            <label for="title">Prenom</label>
            <input type="text" name="prenom" class="form-control" id="title" aria-describedby="titlehelp" value="<?= $singleAuteur[0]['prenom'];?>">
        </div>
        <div class="form-group">
            <label for="title">email</label>
            <input type="text" name="email" class="form-control" id="title" aria-describedby="titlehelp" value="<?= $singleAuteur[0]['email'];?>">
        </div>


        <!-- <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->




        <div class="form-group">
            <label for="art-image">Photo de l'auteur</label>
            <input type="text" hidden name="old-avatar" id="" value="<?= $singleAuteur[0]['avatar'];?>">
            <div style="width:100px;height:100px;"><img class="m-2 w-100 h-100" src="img/auteur/<?= $singleAuteur[0]['avatar'] ?>" alt=""></a></div><br>
            <input type="file" class=" form-control-file" id="art-image" name="aut-image"> 
        </div>

        <a href="back-auteurs.php" class="btn btn-primary mr-2">Back</a><button type="submit" class="btn btn-success" name="update-aut">Modifier</button>
    </form>
</div>
</div>  




<?php include 'footer.php'; 
if (isset($a)){
    echo "a=1";
    Header("Location: back-auteurs.php");

}

?>