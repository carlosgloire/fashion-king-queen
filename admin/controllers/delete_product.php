<?php

require_once('../../database/db.php');

 if(isset($_GET['product_id']) AND !empty($_GET['product_id'])){
    $getid = $_GET['product_id'];
    $recup_id = $db->prepare('SELECT *FROM produits WHERE product_id = ? ');
    $recup_id->execute(array($getid));
    if($recup_id->rowCount() > 0){
        $delete_image = $db->prepare('DELETE FROM produits WHERE product_id = ? ');
        $delete_image->execute(array($getid));
        echo '<script>alert("Produit supprimé avec succès");</script>';
        echo '<script>window.location.href="../produit.php";</script>';
        exit;
 }
 else{
    echo "<script>alert('Pas de produit trouvé');</script>";
    echo '<script>window.location.href="../produit.php";</script>';
    exit;
 }

}