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
    <title>Temoignages</title>

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
            <a href="add_testimonial.php">Ajouter un témoignage</a>
        </div>
        <div class="prod-admin-container" style=" flex-wrap:wrap">
            <?php
                $query = $db->prepare('SELECT * FROM testimonials ');
                $query->execute();
                $testimonials=$query->fetchAll();
                if($testimonials){
                    foreach($testimonials as $testimonial){
                        ?>
                            <div class="prod-admin-item" >
                                <p><img class="image" src="../admin/images_temoignages/<?=$testimonial['photo']?>" alt="" style="object-fit:cover"></p>
                                <span style="font-weight: bold;"><?=$testimonial['name']?></span>
                                <h5 style="font-weight: bold;"><?=$testimonial['role']?></h5>
                                <p><?=$testimonial['message']?></p>
                                <div style="justify-content: center;">
                                    <a href="#" class="icons-link"><i class="fa-solid fa-pen"></i></a>
                                    <a href="#"  class="icons-link delete"  gallery_id="<?= $testimonial['id'] ?>"><i class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                        <?php
                    }
                }else{
                    ?><div style="color:red"><?='Pas des témoignage disponible'?></div><?php
                }
            ?>
                    <div class="popup hidden-popup">
            <div class="popup-container">
                <h3>Cher Admin,</h3>
                <p>Etes-vous sur de supprimer ce témoignage du système?</p>
                <div style="margin-top: 20px; " class="popup-btn">
                    <button style="cursor:pointer;" class="cancel-popup">Annuler</button>
                    <button style="cursor:pointer;" class="delete-popup">Supprimer</button>
                </div>
            </div>
        </div>
        </div>
    </div>
    <script src="../javascript/delete_popup_temoignages.js"></script>
</body>

</html>