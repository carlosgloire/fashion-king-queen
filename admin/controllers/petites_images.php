<?php
$success = null;
$error = null;
require_once('../database/db.php');
// Get the class id
if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    $id = $_GET['product_id'];
    $recupcourseid = $db->prepare('SELECT * FROM produits WHERE product_id = ?');
    $recupcourseid->execute(array($id));
    $infos = $recupcourseid->fetch();
    if($infos){
        $id_fetched= $infos['product_id'];
    }
    else{

        echo '<script>alert("No product found");</script>';
        echo '<script>window.location.href="../produit.php";</script>';
        exit;
    }
}
if (isset($_POST['add'])) {
    $filename = $_FILES["uploadfile"]["name"];
    $filesize = $_FILES["uploadfile"]["size"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./petites_images/" . $filename;
    $allowedExtensions = ['png', 'jpg', 'jpeg'];
    $pattern = '/\.(' . implode('|', $allowedExtensions) . ')$/i';

    if (empty($filename)) {
        $error = "Veuillez choisir une image"; 
    } elseif (!preg_match($pattern, $_FILES['uploadfile']['name']) && !empty($_FILES['uploadfile']['name'])) {
        $error = "Votre fichier doit être au format \"jpg, jpeg ou png\"";
    } elseif ($filesize > 1000000) {
        $error = "Votre fichier ne doit pas dépasser 1Mb";
    }else {
        // Check if a product already exists
        $existing_product_query = $db->prepare("SELECT * FROM petites_images WHERE photo=:photo  AND product_id=:product_id ");
        $existing_product_query->execute(array('photo' => $filename,  'product_id' => $id));
        $existing_product = $existing_product_query->fetch(PDO::FETCH_ASSOC);
        
        if ($existing_product) {
            $error = "Cette image existe déjà";
        } else {
            // Insert into collection table
            $query = $db->prepare('INSERT INTO petites_images (photo, product_id) VALUES (:photo, :product_id)');
            $query->bindParam(':photo', $filename);
            $query->bindParam(':product_id', $id);
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