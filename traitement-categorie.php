<?php require 'connexion.php';



//Ajouter une nouvelle donnee
if (isset($_POST['submit-cat'])) {

    $file = $_FILES["cat-image"];
    $fileName = $_FILES["cat-image"]["name"];
    $fileTmpName = $_FILES["cat-image"]["tmp_name"];
    $fileSize = $_FILES["cat-image"]["size"];
    $fileError = $_FILES["cat-image"]["error"];
    $fileType = $_FILES["cat-image"]["type"];
    if ($fileError === 0) {
        $fileDestination = 'img/categorie/' . $fileName;
        echo $fileDestination;
        move_uploaded_file($fileTmpName, $fileDestination);
    } else {
        echo "There was an error";
    }
    $req = $conn->prepare("INSERT INTO categorie SET nom = ?, image = ?");
    $req->execute([$_POST['nom'], $fileName]);
    // $stat = "données enrégistrées";
    Header("Location: back-categories.php");
    exit();
}

//Supprimer une donnée avec un id
if (isset($_GET['categorie-del-id'])) {

    $pdostat = $conn->prepare('DELETE FROM categorie where id_cat=:num LIMIT 1');
    $pdostat->bindValue(':num', $_GET["categorie-del-id"], PDO::PARAM_INT);
    $executeISOk = $pdostat->execute();
    header("location:back-categories.php");

    // header("location:page-tuteur.php");
}

//Modifier une donnée avec un id
if (isset($_POST['update-cat'])) {

    $fileName = $_FILES["cat-image"]["name"];

    $fileTmpName = $_FILES["cat-image"]["tmp_name"];
    $fileSize = $_FILES["cat-image"]["size"];
    $fileError = $_FILES["cat-image"]["error"];
    $fileType = $_FILES["cat-image"]["type"];
    if ($fileError === 0) {
        $fileDestination = 'img/categorie/' . $fileName;
        echo $fileDestination;
        move_uploaded_file($fileTmpName, $fileDestination);
    } else {
        echo "There was an error or same picture";
    }
    if ($fileError) {

        $fileName = $_POST['old-image'];
        echo $fileName;
    } else {

        $fileName = $_FILES["cat-image"]["name"];
    }

    $sql = "UPDATE categorie SET nom=?,  image= ? WHERE id_cat = ?";
    $stmt = $conn->prepare($sql);

    $stmt->execute([$_POST['nom'], $fileName, $_POST['id']]);
    $a = 1;
    Header("Location: back-categories.php");
}
