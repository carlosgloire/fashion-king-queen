<?php
$success = null;
$error = null;
require_once('../database/db.php');
if (isset($_GET['id']) && !empty($_GET['id'])) {

    $id = $_GET['id'];
    $request = $db->prepare("SELECT * FROM testimonials WHERE id = ?");
    $request->execute([$id]);
    $stmt = $request->fetch();
 

    if ($stmt) {
        $id_fetched = $stmt['id'];
        $testimonial_names =$stmt['name'];
        $testimonial_message=$stmt['message'];
        $testimonial_role=$stmt['role'];
        $testimonial_photo = $stmt['photo'];
    } else {
        echo '<script>alert("Pas de temoignage trouvé");</script>';
        echo '<script>window.location.href="/";</script>';
        exit;

    }
}

if (isset($_POST['modify'])) {
    $name = htmlspecialchars($_POST['name']);
    $role= htmlspecialchars($_POST['role']);
    $message = htmlspecialchars($_POST['message']);
    $filename =$testimonial_photo;
    if(empty($name) || empty($role) || empty($message)){
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
            $update = $db->prepare('UPDATE testimonials SET name=?, role= ?, message = ?,photo =?  WHERE id = ?');
            $update->execute([$name, $message,$role,$filename,$id]);
            echo '<script>alert("Temoignage Modifié avec succès");</script>';
            echo '<script>window.location.href="testimonials.php";</script>';
            exit;
        }

        
    }   
    
?>
