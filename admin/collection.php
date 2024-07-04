<?php
    session_start();
    require_once('../functions.php');
    notconnected();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collection</title>

    <!-- Style css-->
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/admin.css">

    <!-- Website logo -->
    <link rel="shortcut Icon" href="../images/logo.png">

    <!-- Icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.0/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
</head>

<body>

    <div class="prod-admin">
        <div class="add">
            <div style="margin-bottom:20px ;display: flex; flex-wrap: wrap;gap: 20px;">
                <a href="collectionAdd.php">Ajouter une nouvelle collection</a>
                <a href="categorie.php">Ajouter une catégorie</a>
            </div>
        </div>
        <div class="prod-admin-container">
            <?php
                require_once('../database/db.php');
                $query = $db->prepare('SELECT * FROM collections ');
                $query->execute();
                $produits=$query->fetchAll();
                if($produits){
                    foreach($produits as $produit){
                        ?>
                            <div class="prod-admin-item" style="text-align: center;">
                                <p><img src="../admin/collection_images/<?=$produit['photo']?>" alt="" style="width:260px;height:260px;object-fit:cover"></p>
                                <p ><?=$produit['product_type']?></p>
                                <div style="justify-content: center;">
                                    <a href="#" class="icons-link"><i class="fa-solid fa-pen"></i></a>
                                    <a href="#"  class="icons-link delete"  gallery_id="<?= $produit['coll_id'] ?>"><i class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                        <?php
                    }
                }else{
                    ?><div style="color:red"><?='Pas des produits disponible encore'?></div><?php
                }
            ?>

        </div>
    </div>
    <div class="popup hidden-popup">
        <div class="popup-container">
            <h3>Cher Admin,</h3>
            <p>Etes-vous sur de supprimer ce produit du système?</p>
            <div style="margin-top: 20px; " class="popup-btn">
                <button style="cursor:pointer;" class="cancel-popup">Annuler</button>
                <button style="cursor:pointer;" class="delete-popup">Supprimer</button>
            </div>
        </div>
    </div>
    <script src="../javascript/delete_popup_colllection.js"></script>
</body>
</html>