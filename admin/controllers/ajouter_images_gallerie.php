<?php
$success = null;
$error = null;
require_once('../database/db.php');

if (isset($_POST['add'])) {
    $filename = $_FILES["uploadfile"]["name"];
    $filesize = $_FILES["uploadfile"]["size"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./gallerie_images/" . $filename;
    $allowedExtensions = ['png', 'jpg', 'jpeg'];
    $pattern = '/\.(' . implode('|', $allowedExtensions) . ')$/i';

    if (empty($filename)) {
        $error = "Veuillez choisir une image"; 
    } elseif (!preg_match($pattern, $_FILES['uploadfile']['name']) && !empty($_FILES['uploadfile']['name'])) {
        $error = "Votre fichier doit être au format \"jpg, jpeg ou png\"";
    } elseif ($filesize > 2000000) {
        $error = "Votre fichier ne doit pas dépasser 2Mb";
    }else {
        // Check if an image already exists
        $existing_product_query = $db->prepare("SELECT * FROM images_gallerie WHERE photo=:photo  ");
        $existing_product_query->execute(array('photo' => $filename));
        $existing_product = $existing_product_query->fetch(PDO::FETCH_ASSOC);
        
        if ($existing_product) {
            $error = "Cette image existe déjà";
        } else {
           
            $query = $db->prepare('INSERT INTO images_gallerie (photo) VALUES (:photo)');
            $query->bindParam(':photo', $filename);
            if ($query->execute()) {
                // Move the uploaded file to the target folder
                if (move_uploaded_file($tempname, $folder)) {
                    $success = "Image ajouté avec succès";
                } else {
                    $error = "Échec du téléchargement de l'image";
                }
            } else {
                $error = "Erreur lors de l'ajout du produit";
            }
        }
    }
}
?>