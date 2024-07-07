<?php
     session_start();
     require_once('../functions.php');
     notconnected();
     require_once('../functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallerie</title>

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
                <a href="ajouter_images_gallerie.php">Ajouter une photo pour la gallerie</a>
            </div>
        </div>
        <div class="prod-admin-container">
            <?php
                require_once('../database/db.php');
                $query = $db->prepare('SELECT * FROM images_gallerie ');
                $query->execute();
                $produits=$query->fetchAll();
                if($produits){
                    foreach($produits as $produit){
                        ?>
                            <div class="prod-admin-item">
                                <p><img src="../admin/gallerie_images/<?=$produit['photo']?>" alt="" style="width:260px;height:260px;object-fit:cover"></p>
                                <div style="justify-content: center;">
                                    <a href="#" class="icons-link delete"  gallery_id="<?= $produit['image_id'] ?>">Supprimer</a>
                                </div>
                            </div>
                        <?php
                    }
                }else{
                    ?><div style="color:red"><?='Pas des produits disponible encore'?></div><?php
                }
            ?>

        </div>
        <div class="popup hidden-popup">
            <div class="popup-container">
                <h3>Cher Admin,</h3>
                <p>Etes-vous sur de supprimer cette photo du système?</p>
                <div style="margin-top: 20px; " class="popup-btn">
                    <button style="cursor:pointer;" class="cancel-popup">Annuler</button>
                    <button style="cursor:pointer;" class="delete-popup">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../javascript/delete_popup_gallerie.js"></script>
</body>

</html>