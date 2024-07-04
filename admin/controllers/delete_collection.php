<?php

require_once('../../database/db.php');

 if(isset($_GET['coll_id']) AND !empty($_GET['coll_id'])){
    $getid = $_GET['coll_id'];
    $recup_id = $db->prepare('SELECT *FROM collections WHERE coll_id = ? ');
    $recup_id->execute(array($getid));
    if($recup_id->rowCount() > 0){
        $delete_image = $db->prepare('DELETE FROM collections WHERE coll_id = ? ');
        $delete_image->execute(array($getid));
        echo '<script>alert("Collection supprimé avec succès");</script>';
        echo '<script>window.location.href="../collection.php";</script>';
        exit;
 }
 else{
    echo "<script>alert('Pas de collection trouvé');</script>";
    echo '<script>window.location.href="../collection.php";</script>';
    exit;
 }

}