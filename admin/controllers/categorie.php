<?php
$success = null;
$error = null;

require_once('../database/db.php');
if (isset($_POST['save'])) {
    $categorie = htmlspecialchars($_POST['categorie']);
    $description = htmlspecialchars($_POST['description']);
    if (empty($categorie)) {
        $error = "Veuillez remplir tous les champs";
    } 
    
    else {
        // Check if a category already exist
        $existing_category_query = $db->prepare("SELECT * FROM categories_collection WHERE category_name=:category_name ");
        $existing_category_query->execute(array('category_name'=>$categorie));
        $existing_category = $existing_category_query->fetch(PDO::FETCH_ASSOC);
        if($existing_category){
            $error = "Cette catégorie existe déja";
        }else{
            $query = $db->prepare('INSERT INTO categories_collection (category_name,description) VALUES (:category_name,:description)');
            $query->bindParam(':category_name', $categorie);
            $query->bindParam('description',$description);
            $query->execute();
            $success = "Catégorie ajoutée avec succès";
        }
   
       

    }
}
?>
