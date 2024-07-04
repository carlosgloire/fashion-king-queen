<?php
$success = null;
$error = null;
require_once('../database/db.php');

if (isset($_POST['add'])) {
    $name = htmlspecialchars($_POST['name']);
    $role= htmlspecialchars($_POST['role']);
    $message = htmlspecialchars($_POST['message']);
    $filename = $_FILES["uploadfile"]["name"];
    $filesize = $_FILES["uploadfile"]["size"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./images_temoignages/" . $filename;
    $allowedExtensions = ['png', 'jpg', 'jpeg'];
    $pattern = '/\.(' . implode('|', $allowedExtensions) . ')$/i';

    if (empty($name)   || empty($role) || empty($message)) {
        $error = "Veuillez remplir tous les champs";
    } elseif (empty($filename)) {
        $error = "Veuillez choisir une photo pour ce témoignage"; 
    } elseif (!preg_match($pattern, $_FILES['uploadfile']['name']) && !empty($_FILES['uploadfile']['name'])) {
        $error = "Votre fichier doit être au format \"jpg, jpeg ou png\"";
    } elseif ($filesize > 2000000) {
        $error = "Votre fichier ne doit pas dépasser 2Mb";
    }else {
        // Check if a product already exists
        $existing_testimonial_query = $db->prepare("SELECT * FROM testimonials WHERE name=:name ");
        $existing_testimonial_query->execute(array('name' => $name));
        $existing_testimonial = $existing_testimonial_query->fetch(PDO::FETCH_ASSOC);
        
        if ($existing_testimonial) {
            $error = "Ce témoignage existe déjà";
        } else {
            // Insert into collection table
            $query = $db->prepare('INSERT INTO testimonials (name, role,message,photo) VALUES (:name, :role,:message,:photo)');
            $query->bindParam(':name', $name);
            $query->bindParam(':role', $role);
            $query->bindParam(':message', $message);
            $query->bindParam(':photo', $filename);
            if ($query->execute()) {
                // Move the uploaded file to the target folder
                if (move_uploaded_file($tempname, $folder)) {
                    $success = "Témoignage ajouté avec succès";
                } else {
                    $error = "Échec du téléchargement de l'image";
                }
            } else {
                $error = "Erreur lors de l'ajout du témoignage";
            }
        }
    }
}
?>