<?php require 'connexion.php';



//Ajouter une nouvelle donnee
if (isset($_POST['submit-aut'])) {
   
    $file = $_FILES["aut-image"];
    $fileName = $_FILES["aut-image"]["name"];
    $fileTmpName = $_FILES["aut-image"]["tmp_name"];
    $fileSize = $_FILES["aut-image"]["size"];
    $fileError = $_FILES["aut-image"]["error"];
    $fileType = $_FILES["aut-image"]["type"];
    if ($fileError === 0) {
        $fileDestination = 'img/auteur/' . $fileName;
        echo $fileDestination;
        move_uploaded_file($fileTmpName, $fileDestination);
    } else {
        echo "There was an error";
    }
    $req = $conn->prepare("INSERT INTO auteur SET nom_aut = ?, prenom = ?, email = ?, avatar = ?");
    $req->execute([$_POST['nom-aut'], $_POST['prenom'], $_POST['email'], $fileName]);
    // $stat = "données enrégistrées";
    Header("Location: back-auteurs.php");
    exit();
}

//Supprimer une donnée avec un id
if (isset($_GET['auteur-del-id'])) {

    $pdostat = $conn->prepare('DELETE FROM auteur where id_auteur=:num LIMIT 1');
    $pdostat->bindValue(':num', $_GET["auteur-del-id"], PDO::PARAM_INT);
    $executeISOk = $pdostat->execute();
    header("location:back-auteurs.php");

    // header("location:page-tuteur.php");
}

//Modifier une donnée avec un id
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
    $sql = "UPDATE auteur SET nom_aut=?, prenom=?, email= ?, avatar= ? WHERE id_auteur = ?";
$stmt= $conn->prepare($sql);

$stmt->execute([$_POST['nom-aut'], $_POST['prenom'], $_POST['email'], $fileName,$_POST['id']]);
$a=1;
Header("Location: back-auteurs.php");




   
  
}