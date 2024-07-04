<?php
$success = null;
$error = null;

require_once('../database/db.php');
if (isset($_POST['save'])) {
    // Utilisez htmlspecialchars_decode pour décoder les entités HTML
    $categorie = htmlspecialchars_decode($_POST['categorie']);
    
    if (empty($categorie)) {
        $error = "Veuillez remplir tous les champs";
    } else {
        // Check if a category already exists
        $existing_category_query = $db->prepare("SELECT * FROM categories_product WHERE category_name=:category_name ");
        $existing_category_query->execute(array('category_name' => $categorie));
        $existing_category = $existing_category_query->fetch(PDO::FETCH_ASSOC);
        if ($existing_category) {
            $error = "Cette catégorie existe déjà";
        } else {
            $query = $db->prepare('INSERT INTO categories_product (category_name) VALUES (:category_name)');
            $query->bindParam(':category_name', $categorie);
            $query->execute();
            $success = "Catégorie ajoutée avec succès";
        }
    }
}
?>
