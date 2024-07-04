<?php
$success = null;
$error = null;
require_once('../database/db.php');

if (isset($_POST['add'])) {
    $product_type = htmlspecialchars($_POST['product-type']);
    $category = htmlspecialchars($_POST['category']);
    $filename = $_FILES["uploadfile"]["name"];
    $filesize = $_FILES["uploadfile"]["size"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./collection_images/" . $filename;
    $allowedExtensions = ['png', 'jpg', 'jpeg'];
    $pattern = '/\.(' . implode('|', $allowedExtensions) . ')$/i';

    if (empty($product_type) || empty($category)  || empty($filename)) {
        $error = "Veuillez remplir tous les champs";
    } elseif (empty($filename)) {
        $error = "Veuillez choisir une photo pour cette collection"; 
    } elseif (!preg_match($pattern, $_FILES['uploadfile']['name']) && !empty($_FILES['uploadfile']['name'])) {
        $error = "Votre fichier doit être au format \"jpg, jpeg ou png\"";
    } elseif ($filesize > 1000000) {
        $error = "Votre fichier ne doit pas dépasser 1Mb";
    }elseif($category == 'select'){
        $error = " Veillez selectionner la catégorie";  
    }else {
        // Check if a product already exists
        $existing_product_query = $db->prepare("SELECT * FROM collections WHERE photo=:photo AND product_type=:product_type AND cat_id=:cat_id ");
        $existing_product_query->execute(array('photo' => $filename, 'product_type' => $product_type, 'cat_id' => $category));
        $existing_product = $existing_product_query->fetch(PDO::FETCH_ASSOC);
        
        if ($existing_product) {
            $error = "Ce produit existe déjà";
        } else {
            // Insert into collection table
            $query = $db->prepare('INSERT INTO collections (photo, product_type, cat_id) VALUES (:photo, :product_type, :cat_id)');
            $query->bindParam(':photo', $filename);
            $query->bindParam(':product_type', $product_type);
            $query->bindParam(':cat_id', $category);
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