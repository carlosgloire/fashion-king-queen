<?php
$success = null;
$error = null;
require_once('../database/db.php');
if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {

    $id = $_GET['product_id'];
    $request = $db->prepare("SELECT * FROM produits WHERE product_id = ?");
    $request->execute([$id]);
    $stmt = $request->fetch();
 

    if ($stmt) {
        $id_fetched = $stmt['product_id'];
        $product_image =$stmt['photo'];
        $product_title=$stmt['first_product'];
        $product_price=$stmt['prix'];
        $product_description = $stmt['description'];
        $product_color=$stmt['couleur'];
        $product_size = $stmt['size'];
    } else {
        echo '<script>alert("Pas de produit trouvé");</script>';
        echo '<script>window.location.href="/";</script>';
        exit;

    }
}

if (isset($_POST['modify'])) {
    $product_type = htmlspecialchars($_POST['product_name']);
    $prix = htmlspecialchars($_POST['prix']);
    $description = htmlspecialchars($_POST['description']);
    $colors=htmlspecialchars($_POST['color']);
    $sizes=htmlspecialchars($_POST['size']);
    $filename =$product_image;
    if(empty($product_type) || empty($prix) || empty($description)){
        $error="Veillez compléter tous les champs";
    }elseif (!empty($_FILES['uploadfile']['name'])) {
        $filename = $_FILES["uploadfile"]["name"];
        $filesize = $_FILES["uploadfile"]["size"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "./product_images/" . $filename;
        $allowedExtensions = ['png', 'jpg', 'jpeg'];
        $pattern = '/\.(' . implode('|', $allowedExtensions) . ')$/i';
        if (!preg_match($pattern, $_FILES['uploadfile']['name']) && !empty($_FILES['uploadfile']['name'])) {
            $error = "Votre fichier doit être au format \"jpg, jpeg ou png\"";
        } elseif ($filesize > 1000000) {
            $error = "Votre fichier ne doit pas dépasser 1Mb";
        }
        elseif (!move_uploaded_file($tempname, $folder)) {
            $error = "Error while uploading";
        }
    }
    if(empty($error)){

            // Update form_tutors with the new data
            $updateproduct = $db->prepare('UPDATE produits SET photo=?, first_product= ?, description = ?,prix = ?,couleur=?,size=?  WHERE product_id = ?');
            $updateproduct->execute([$filename,$product_type, $description,$prix,$colors,$sizes,$id]);
            echo '<script>alert("Produit Modifié avec succès");</script>';
            echo '<script>window.location.href="produit.php";</script>';
            exit;
        }

        
    }   
    
?>
