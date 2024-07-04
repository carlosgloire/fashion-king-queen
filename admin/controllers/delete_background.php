
<?php

require_once('../../database/db.php');

 if(isset($_GET['image_id']) AND !empty($_GET['image_id'])){
    $getid = $_GET['image_id'];
    $recup_id = $db->prepare('SELECT *FROM background_images WHERE image_id = ? ');
    $recup_id->execute(array($getid));
    if($recup_id->rowCount() > 0){
        $delete_image = $db->prepare('DELETE FROM background_images WHERE image_id = ? ');
        $delete_image->execute(array($getid));
        echo '<script>alert("Image supprimé avec succès");</script>';
        echo '<script>window.location.href="../background_images.php";</script>';
        exit;
 }
 else{
    echo "<script>alert('Pas d'image trouvé');</script>";
    echo '<script>window.location.href="../background_images.php";</script>';
    exit;
 }

}
