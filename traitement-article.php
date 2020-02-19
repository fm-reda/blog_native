<?php require 'connexion.php';



//Ajouter une nouvelle donnee

if (isset($_POST['submit-art'])) {


    $file = $_FILES["art-image"];
    $fileName = $_FILES["art-image"]["name"];
    $fileTmpName = $_FILES["art-image"]["tmp_name"];
    $fileSize = $_FILES["art-image"]["size"];
    $fileError = $_FILES["art-image"]["error"];
    $fileType = $_FILES["art-image"]["type"];
    if ($fileError === 0) {
        $fileDestination = 'img/article/' . $fileName;
        // echo $fileDestination;
        move_uploaded_file($fileTmpName, $fileDestination);
    } else {
        echo "There was an error";
    }


    // echo $_POST['categorie'];


    // echo date('Y-m-d H:i:s');

    $req = $conn->prepare("INSERT INTO article SET title = ?, contenu = ?, image_art = ?, date=?, id_cat= ?,id_auteur=?");
    $req->execute([$_POST['titre'], $_POST['contenu'],  $fileName, date('Y-m-d H:i:s'), $_POST['categorie'], $_POST['auteur']]);
    $stat = "données enrégistrées";
    Header("Location: back-articles.php");
    exit();
}


//Supprimer une donnée avec un id
if (isset($_GET['art-del-id'])) {

    $pdostat = $conn->prepare('DELETE FROM article where id_art=:num LIMIT 1');
    $pdostat->bindValue(':num', $_GET["art-del-id"], PDO::PARAM_INT);
    $executeISOk = $pdostat->execute();
    header("location:back-articles.php");
}

//Modifier une donnée avec un id
if (isset($_POST['update-art'])) {

    $file = $_FILES["art-image"];


    $file = $_FILES["art-image"];
    $fileName = $_FILES["art-image"]["name"];
    $fileTmpName = $_FILES["art-image"]["tmp_name"];
    $fileSize = $_FILES["art-image"]["size"];
    $fileError = $_FILES["art-image"]["error"];
    $fileType = $_FILES["art-image"]["type"];
    if ($fileError === 0) {
        $fileDestination = 'img/article/' . $fileName;
        // echo $fileDestination;
        move_uploaded_file($fileTmpName, $fileDestination);
    } else {
        echo "There was an error";
    }

    //test si user n'as pas mis une nouvelle photo

    if ($_FILES["art-image"]["error"]) {
        $fileName = $_POST['old-image'];
    } else {
        $fileName = $_FILES["art-image"]["name"];
    }

    $sql = "UPDATE article SET title=?, contenu=?, image_art= ?, id_cat=?, id_auteur=? WHERE id_art = ?";
    $stmt = $conn->prepare($sql);

    $stmt->execute([$_POST['titre'], $_POST['contenu'], $fileName, $_POST['categorie'], $_POST['auteur'], $_POST['id']]);

    Header("Location: back-articles.php");
}
