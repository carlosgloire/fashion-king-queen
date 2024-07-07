<?php
    session_start();
    require_once('../functions.php');
    notconnected();
    logout();
    require_once('../database/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit</title>

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
        <div>
           <h3 style="text-align: center;margin-bottom:20px">Liste des commandes</h3>
        </div>
        <div class="prod-admin-container">
            <?php
                $query = $db->prepare('SELECT * FROM commands ');
                $query->execute();
                $commands = $query->fetchAll();
                if ($commands) {
                    foreach ($commands as $command) {
                        ?>
                        <div class="prod-admin-item">
                            <span>Noms: <?=$command['nom']?></span>
                            <h5 style="font-weight: bold;">Email: <?=$command['email']?></h5>
                            <h5 style="font-weight: bold;">Choix: <?=$command['choix']?></h5>
                            <h5 style="font-weight: bold;">Couleurs: <?=$command['couleur']?></h5>
                            <h5 style="font-weight: bold;">Tailles: <?=$command['size']?></h5>
                            <h5 style="font-weight: bold;">Quantité: <?=$command['quantite']?></h5>
                            <h5 style="font-weight: bold;">Adresse: <?=$command['addresse']?></h5>
                            <h5 style="font-weight: bold;">Téléphone: <?=$command['phone']?></h5>
                            <div style="justify-content: center;">
                                <button class="icons-link " onclick="whatsappUser('<?=$command['phone']?>')"><i class="fa-brands fa-whatsapp" style="font-size: 1.2rem;"></i></button>
                                <a href="#" class="icons-link delete" gallery_id="<?= $command['id'] ?>"><i class="fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    ?><div style="color:red"><?='Pas des produits disponibles encore'?></div><?php
                }
            ?>
        </div>
        <div class="popup hidden-popup">
            <div class="popup-container">
                <h3>Cher Admin,</h3>
                <p>Etes-vous sûr de supprimer ce produit du système?</p>
                <div style="margin-top: 20px;" class="popup-btn">
                    <button style="cursor:pointer;" class="cancel-popup">Annuler</button>
                    <button style="cursor:pointer;" class="delete-popup">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function whatsappUser(phoneNumber) {
            window.location.href = `https://wa.me/${phoneNumber}`;
        }
    </script>
    <script src="../javascript/delete_popup_product.js"></script>
</body>
</html>
