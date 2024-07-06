<?php
$success = null;
$error = null;
require_once('../database/db.php');

if (isset($_POST['add'])) {
    $product_type = htmlspecialchars($_POST['product_name']);
    $prix = htmlspecialchars($_POST['prix']);
    $description = htmlspecialchars($_POST['description']);
    $colors=htmlspecialchars($_POST['color']);
    $sizes=htmlspecialchars($_POST['size']);
    $filename = $_FILES["uploadfile"]["name"];
    $filesize = $_FILES["uploadfile"]["size"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./product_images/" . $filename;
    $allowedExtensions = ['png', 'jpg', 'jpeg'];
    $pattern = '/\.(' . implode('|', $allowedExtensions) . ')$/i';

    if (empty($product_type)   || empty($prix) || empty($description) || empty($colors) || empty($sizes)) {
        $error = "Veuillez remplir tous les champs";
    } elseif (empty($filename)) {
        $error = "Veuillez choisir une photo pour cette collection"; 
    } elseif (!preg_match($pattern, $_FILES['uploadfile']['name']) && !empty($_FILES['uploadfile']['name'])) {
        $error = "Votre fichier doit être au format \"jpg, jpeg ou png\"";
    } elseif ($filesize > 1000000) {
        $error = "Votre fichier ne doit pas dépasser 1Mb";
    }else {
        // Check if a product already exists
        $existing_product_query = $db->prepare("SELECT * FROM produits WHERE photo=:photo AND first_product=:first_product ");
        $existing_product_query->execute(array('photo' => $filename, 'first_product' => $product_type));
        $existing_product = $existing_product_query->fetch(PDO::FETCH_ASSOC);
        
        if ($existing_product) {
            $error = "Ce produit existe déjà";
        } else {
            // Insert into collection table
            $query = $db->prepare('INSERT INTO produits (photo, first_product,description,prix,couleur,size) VALUES (:photo, :first_product,:description,:prix,:couleur,:size)');
            $query->bindParam(':photo', $filename);
            $query->bindParam(':first_product', $product_type);
            $query->bindParam(':description', $description);
            $query->bindParam(':prix', $prix);
            $query->bindParam(':couleur', $colors);
            $query->bindParam(':size', $sizes);
            if ($query->execute()) {
                // Move the uploaded file to the target folder
                if (move_uploaded_file($tempname, $folder)) {
                    $success = "Produit ajouté avec succès";
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