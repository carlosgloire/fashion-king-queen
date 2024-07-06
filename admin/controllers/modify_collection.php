<?php
$success = null;
$error = null;
require_once('../database/db.php');
if (isset($_GET['coll_id']) && !empty($_GET['coll_id'])) {

    $id = $_GET['coll_id'];
    $request = $db->prepare("SELECT * FROM collections WHERE coll_id = ?");
    $request->execute([$id]);
    $stmt = $request->fetch();
 

    if ($stmt) {
        $id_fetched = $stmt['cat_id'];
        $collection_image =$stmt['photo'];
        $product_type_fetched=$stmt['product_type'];
    } else {
        echo '<script>alert("Pas de collection trouvé");</script>';
        echo '<script>window.location.href="/";</script>';
        exit;

    }
}

if (isset($_POST['modify'])) {
    $product_type = htmlspecialchars($_POST['product-type']);
    $category =  htmlspecialchars($_POST['category']);
    $catID=$id_fetched;
    $filename =$collection_image;
    if(empty($product_type) ){
        $error="Veillez compléter titre du collection";
    }elseif (!empty($_FILES['uploadfile']['name'])) {
        $filename = $_FILES["uploadfile"]["name"];
        $filesize = $_FILES["uploadfile"]["size"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "./collection_images/" . $filename;
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
            $updateTeacher = $db->prepare('UPDATE collections SET photo=?, product_type= ?, cat_id = ? WHERE coll_id = ?');
            $updateTeacher->execute([$filename,$product_type, $catID,$id]);
            echo '<script>alert("Produit Modifié avec succès");</script>';
            echo '<script>window.location.href="collection.php";</script>';
            exit;
        }

        
    }   
    
?>
