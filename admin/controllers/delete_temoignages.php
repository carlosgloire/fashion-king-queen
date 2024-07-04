
<?php

require_once('../../database/db.php');

 if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recup_id = $db->prepare('SELECT *FROM testimonials WHERE id = ? ');
    $recup_id->execute(array($getid));
    if($recup_id->rowCount() > 0){
        $delete_image = $db->prepare('DELETE FROM testimonials WHERE id = ? ');
        $delete_image->execute(array($getid));
        echo '<script>alert("Témoignage supprimé avec succès");</script>';
        echo '<script>window.location.href="../testimonials.php";</script>';
        exit;
 }
 else{
    echo "<script>alert('Pas de témoignage trouvé');</script>";
    echo '<script>window.location.href="../testimonials.php";</script>';
    exit;
 }

}
